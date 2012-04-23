<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PinSearch
 *
 * @author NKIGEN
 */
class PinSearch extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Pin_Search');
        $this->load->helper('form');
    }
    public function show_file()
    {
        $this->createForm();
    }
    public function render_pin()
    {
        $pin = $this->input->post("kra_pin");
        if (strlen($pin)<=0)
        {
            $data['message'] = "Please Provide a Pin Number";
            $this->load->view('pinsearch/pinsearch.php',$data);
        }
        else
        {
            $data['message'] = "";
            $data['webpage'] = 
            $this->Pin_Search->get_pin($pin);
        }
    }
    public function createForm()
    {
        $this->load->view('pinsearch/pinsearch.php');
                
    }
}

?>
