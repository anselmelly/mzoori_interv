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
         $this->Pin_Search->get_pin($this->input->post("kra_pin"));
    }
    public function createForm()
    {
        echo form_open('pinsearch/render_pin');
        echo form_label('Enter KRA PIN ::');
        echo form_input('kra_pin');
        echo form_submit('submit', 'Submit');
    }
}

?>
