<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProcessOrders
 *
 * @author NKIGEN
 */
class ProcessOrders extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Orders');
    }
    public function view()
    {
        $data['orders'] = $this->Orders->renderUpdatedOrders();
        $this->load->view('orders/index',$data);
    }
    
}

?>
