<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suscription extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Suscription_model');
	}

	public function save_suscription()
	{
		// echo "helllo save susctiption";
		$email = trim($this->input->post('email'));
		$name  = trim($this->input->post('name'));
		$campaign  = trim($this->input->post('campaign'));

		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
			$email = $sanitized_email;
			$jsondata["success"] = true;
		}
		else
		{
			$jsondata["success"] = false;
			$jsondata["data"] = array('message' => "El correo electronico que ingreso es invalido.");
		}

		if ($jsondata["success"] == true)
		{
			$this->Suscription_model->set_name($name);
			$this->Suscription_model->set_email($email);
			$this->Suscription_model->set_campaign($campaign);
			$this->Suscription_model->save();

			$jsondata["data"] = array('message' => "Gracias ahora voy a poder enviarte Tips.");
			if ($this->Suscription_model->save() == "duplicado")
			{
				$jsondata["data"] = array('message' => "Ya te encuentras Registrado GRACIAS.");
			}
		}
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata, JSON_FORCE_OBJECT);
	}
}