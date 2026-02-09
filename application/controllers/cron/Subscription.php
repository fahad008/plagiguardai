<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->input->is_cli_request()) {
            show_error('Access denied');
        }

        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Customer_Model', 'customer_model');
        $this->load->helper('logs');
    }

    /**
     * Activate subscriptions that start today
     */
    public function activate()
    {
        $admin_id = 1;
        $subscriptions = $this->subscription_model->get_inactive_subscriptions();
        // echo "<pre>";print_r($subscriptions);die;
        
        if (isset($subscriptions) && is_array($subscriptions) && !empty($subscriptions)) {
            foreach ($subscriptions as $key => $subscription) {
                $selected_plan = [];
                $selected_plan = $this->plan_model->get_plan($subscription['plan_id']);
                if (isset($selected_plan) && !empty($selected_plan)) {

                    $end_date = date('Y-m-d', strtotime("+{$selected_plan['duration']} days"));
                    $end_date = formatDate($end_date);

                    $customers_credits = [
                        "admin_id" => $admin_id,
                        "customer_id" => $subscription['customer_id'],
                        "subscription_id" => $subscription['id'],
                        "remaining_credits" => (int)$selected_plan['credits'],
                        "expire_at" => $end_date
                    ];


                    $credits_id = $this->subscription_model->save_customer_credits($customers_credits);

                    $transaction = [
                        "customer_id" => $subscription['customer_id'],
                        "credits_id" => $credits_id,
                        "type" => 'add',
                        "amount" => (int)$selected_plan['credits'],
                        "created_at" => date('y-m-d H:m:s')
                    ];

                    $this->subscription_model->save_credit_transactions($transaction);

                    $subscription_info = array(
                        "status" => 'active',
                        "updated_at" => date('y-m-d H:m:s')
                    );

                    $this->subscription_model->update_customer_subscription($subscription['id'], $subscription_info);

                    $customer_info = array(
                        "plan_id" => $selected_plan['id'],
                        "plan_type" => 'Subscribed',
                        "updated_at" => date('y-m-d H:m:s')
                    );

                    $this->customer_model->update_member($subscription['customer_id'], $customer_info);
                    
                    log_cron('info', "Activated SubscriptionID:".$subscription['id']." for CustomerID: ".$subscription['customer_id']);
                }else{
                    log_cron('info', "Subscription Failed:".$subscription['id']." No plan found against subscription");
                }

                
            }
        }else{
            log_cron('info', "No Subscriptions found to activate today!");
        }
    }

    public function expire()
    {
        $subscriptions = $this->subscription_model->get_active_subscriptions();

        if (!empty($subscriptions)) {
            // echo "<pre>";print_r($subscriptions);die;
            foreach ($subscriptions as $subscription) {

                // 1️⃣ Only update subscription status
                $this->subscription_model->update_customer_subscription(
                    $subscription['id'],
                    [
                        "status" => 'expired',
                        "updated_at" => date('Y-m-d H:i:s')
                    ]
                );

                // 2️⃣ Downgrade customer plan
                $this->customer_model->update_member(
                    $subscription['customer_id'],
                    [
                        "plan_id" => NULL,
                        "plan_type" => 'Guest',
                        "updated_at" => date('Y-m-d H:i:s')
                    ]
                );

                // ❌ DO NOT touch customer_credits anymore

                log_cron(
                    'info',
                    "Expired SubscriptionID:{$subscription['id']} of CustomerID: {$subscription['customer_id']}"
                );
            }

        } else {
            log_cron('info', "No Subscriptions found to expire today!");
        }
    }


    public function expire_old()
    {
        die;
        $subscriptions = $this->subscription_model->get_active_subscriptions();
        // echo "<pre>";print_r($subscriptions);die;
        if (isset($subscriptions) && is_array($subscriptions) && !empty($subscriptions)) {
            foreach ($subscriptions as $key => $subscription) {

                $row_existed = '';
                $row_existed = $this->subscription_model->check_credits_row($subscription['customer_id']);
                if ($row_existed) {

                    $customers_credits = array(
                        "credits" => 0,
                        "updated_at" => date('y-m-d H:m:s'),
                    );

                    $credits_updated = $this->subscription_model->update_customer_credits($subscription['customer_id'], $customers_credits);
                }else{

                    $customers_credits = array(
                        "customer_id" => $subscription['customer_id'],
                        "credits" => 0,
                        "updated_at" => date('y-m-d H:m:s'),
                    );

                    $credits_id = $this->subscription_model->save_customer_credits($customers_credits);
                }

                $subscription_info = array(
                    "status" => 'expired',
                    "updated_at" => date('y-m-d H:m:s')
                );

                $this->subscription_model->update_customer_subscription($subscription['id'], $subscription_info);

                $customer_info = array(
                    "plan_type" => 'Guest',
                    "updated_at" => date('y-m-d H:m:s')
                );

                $this->customer_model->update_member($subscription['customer_id'], $customer_info);
                log_cron('info', "Expired SubscriptionID:".$subscription['id']." of CustomerID: ".$subscription['customer_id']);
            }
        }else{
            log_cron('info', "No Subscriptions found to expire today!");
        }
    }
}
