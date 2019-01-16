<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("My_model");
		$this->load->helper(array("form", "url"));
		$this->load->library(array("form_validation"));
		$this->load->database();
	}

	public function index()
	{
		$this->load->view("signup_form");
	}

	public function register()
	{
		$this->form_validation->set_rules("email", "Email-ID", "trim|required|valid_email");
        $this->form_validation->set_rules("name", "Name", "trim|required|alpha_numeric|min_length[4]");
        $this->form_validation->set_rules("gender", "Gender", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required|alpha_numeric|min_length[8]");
        $this->form_validation->set_rules("re_password", "Re-typed Passord", "trim|matches[password]");
        $this->form_validation->set_rules("occupation", "Occupation", "trim|required");
        $this->form_validation->set_rules("prefered_working[]", "Prefered Working", "trim|required");

        if($this->form_validation->run() == FALSE)
        {
        		// $this->output->set_status_header('400'); //Triggers the jQuery error callback
                $this->data['message'] = validation_errors();
                echo json_encode($this->data);
        }
        else
        {
        	$this->My_model->register();
        	echo json_encode(array('message'=>"success"));
        }
	}

}
