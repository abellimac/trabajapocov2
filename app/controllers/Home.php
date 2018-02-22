<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view( 'header' );
		$this->load->view( 'includes/menu' );
		$this->load->view( 'home/index' );
		$this->load->view( 'footer' );
	}

	public function email()
	{
		$this->load->library('email');

		$name = $this->input->post( 'name' );
		$email = $this->input->post( 'email' );
		$phone = $this->input->post( 'phone' );
		$message = $this->input->post( 'message' );

		$to = 'abellimac@gmail.com';

		$this->email->from( $email , $name );
		$this->email->to( $to );

		$this->email->subject( 'Email Test' );
		$this->email->message( 'Testing the email class.' );

		// return $this->email->send();	
		if ($this->email->send())
		{
			return json_encode( array('message' => true) );
		}
		else
		{
			return json_encode( array('message' => false) );
		}
	}
}