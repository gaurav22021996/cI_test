<?php

	class My_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function fetchData()
		{

		}

		function register()
		{
			$record = array(
				'name' => $this->input->post("name"),
				'email' => $this->input->post("email"),
				'password' => md5($this->input->post("password")),
				'gender' => $this->input->post("gender"),
				'ocupation' => $this->input->post("occupation"),
				'prefered_working' => implode(",", $this->input->post("prefered_working")),
			);
			$this->db->insert("users", $record);
		}

	}

?>