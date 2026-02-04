<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->input->is_cli_request()) {
            show_error('Access denied');
        }

        $this->load->model('Subscription_model');
    }

    /**
     * Activate subscriptions that start today
     */
    public function activate()
    {
        // $count = $this->Subscription_model->activate_subscriptions();
        log_message('info', "Subscriptions activated: {$count}");
        echo "Subscriptions activated: {$count}\n";
    }

    /**
     * Expire subscriptions that ended before today
     */
    public function expire()
    {
        $count = $this->Subscription_model->expire_subscriptions();
        log_message('info', "Subscriptions expired: {$count}");
        echo "Subscriptions expired: {$count}\n";
    }
}
