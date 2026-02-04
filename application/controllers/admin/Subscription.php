<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();
	 	
        $this->require_role(['super_admin']);
        
        $this->load->model('Admin_Model', 'admin_model');
		$this->load->model('Customer_Model', 'customer_model');
		$this->load->model('Subscription_Model', 'subscription_model');
		$this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Invoices_Model', 'invoices_model');
    } 

    public function index(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;

        	$customer_id = $this->input->post('customer_id');
        	$reseller_id = $this->input->post('reseller_id');
        	$plan_id = $this->input->post('plan_id');

        	$selected_plan = $this->plan_model->get_plan($plan_id);

        	// echo "<pre>";print_r($selected_plan);die;

        	$reseller_note = $this->input->post('reseller_note');

        	$activation_date = $this->input->post('activation_date');
        	$start_date = formatDate($activation_date);
        	$end_date = getEndDate($activation_date, $selected_plan['duration']);
        	$today_date = getTodayDate();

        	if ($start_date < $today_date) {
        		$status = 'expired';
        	}else if($start_date > $today_date){
        		$status = 'inactive';
        	}else{
        		$status = 'active';
        	}

        	 
        	$customer_subscriptions = array(
        		"customer_id" => $customer_id,
        		"plan_id" => $plan_id,
        		"reseller_id" => $reseller_id,
        		"reseller_note" => $reseller_note,
        		"start_date" => $start_date,
        		"end_date" => $end_date,
        		"status" => $status,
        		"created_at" => date('y-m-d H:m:s'),
				"updated_at" => date('y-m-d H:m:s'),
        	);

        	// echo "<pre>";print_r($customer_subscriptions);die;

        	$subscription_id = $this->subscription_model->save_customer_subscription($customer_subscriptions);

        	// echo "<pre>";print_r($status);print_r($customers_credits);die;
            if ($status == 'active') {

                $row_existed = $this->subscription_model->check_credits_row($customer_id);
                if ($row_existed) {

                    $credits = $this->subscription_model->get_customer_credits($customer_id);
                    $credits = (int)$credits + (int)$selected_plan['credits'];

                    $customers_credits = array(
                        "credits" => $credits,
                        "updated_at" => date('y-m-d H:m:s'),
                    );

                    $credits_updated = $this->subscription_model->update_customer_credits($customer_id, $customers_credits);
                }else{

                    $credits = (int)$selected_plan['credits'];

                    $customers_credits = array(
                        "customer_id" => $customer_id,
                        "credits" => $credits,
                        "updated_at" => date('y-m-d H:m:s'),
                    );

                    $credits_id = $this->subscription_model->save_customer_credits($customers_credits);
                }
                

                $customer_info = array(
                    "plan_id" => $plan_id,
                    "plan_type" => 'Subscribed',
                    "updated_at" => date('y-m-d H:m:s'),
                );

                $customer_updated = $this->customer_model->update_member($customer_id, $customer_info);
            }
        	

            $reseller_customer_id = $this->subscription_model->check_reseller_row($customer_id);
            if ($reseller_customer_id) {

                $customer_reseller = array(
                    "reseller_id" => $reseller_id,
                    "created_at" => date('y-m-d H:m:s')
                );

                $this->subscription_model->update_customer_reseller($reseller_customer_id, $customer_reseller);

            }else{

                $customer_reseller = array(
                    "customer_id" => $customer_id,
                    "reseller_id" => $reseller_id,
                    "created_at" => date('y-m-d H:m:s')
                );

                $this->subscription_model->save_customer_reseller($customer_reseller);
            }

        	

            $invoice_info = array(
                "invoice_number" => generateInvoiceNumber(),
                "customer_id" => $customer_id,
                "reseller_id" => $reseller_id,
                "plan_id" => $plan_id,
                "credits" => (int)$selected_plan['credits'],
                "subtotal" => (int)$selected_plan['price'],
                "total" => (int)$selected_plan['price'],
                "currency" => 'PKR',
                "payment_method" => 'other',
                "payment_note" => $reseller_note,
                "status" => 'paid',
                "created_at" => date('y-m-d H:m:s')
            );

            $invoice_id = $this->invoices_model->save_invoice($invoice_info);
            if ($invoice_id) {
                $sub_info = array(
                    "invoice_id" => $invoice_id
                );
                $this->subscription_model->update_customer_subscription($subscription_id,$sub_info);
            }

        	$response =  array(
	          "status" => 'success', "message" => 'Customer has been subscribed successfully.', "customer_id" => $customer_id, "plan_type" => $selected_plan['title']
	        );
	        echo json_encode($response);
        }
    }
}