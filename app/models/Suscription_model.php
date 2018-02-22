<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suscription_model extends CI_Model 
{
	private $_name;
	private $_email;
	private $_date;
	private $_campaign;
	private $db_suscripcion;

	function __construct() 
	{
		parent::__construct();
		// $db_suscripcion = $this->load->database('suscription', TRUE);
		// $this->load->database();
	}

	// function suscription_prueba()
	// {
 //        //con esta línea cargamos la base de datos suscripcion
 //        //y la asignamos a $db_suscripcion
	// 	$db_suscripcion = $this->load->database('suscripcion', TRUE);
 //        //y de esta forma accedemos, no con $this->db->get,
 //        //sino con $db_suscripcion->get que contiene la conexión
 //        //a la base de datos prueba
	// 	$usuarios = $db_suscripcion->get('email');
	// 	foreach($usuarios->result() as $fila)
	// 	{
	// 		$data[] = $fila;
	// 	}
	// 	return $data;
	// }

	function set_name($name)
	{
		$this->_name = $name;
	}

	function set_email($email)
	{
		$this->_email = $email;
	}

	function set_campaign($campaign)
	{
		$this->_campaign = $campaign;
	}

	function set_date($date)
	{
		$this->_date = $date;
	}

	function save()
	{
		$db_suscripcion = $this->load->database('suscription', TRUE);
		$data['name'] = $this->_name;
		$data['email'] = $this->_email;
		$data['id_campaign'] = $this->_campaign;
		// $data['id_campaign'] = 0;
		// $data['date'] = $this->_date;
		$data['date'] = (new \DateTime())->format('Y-m-d H:i:s');

		$query  = "SELECT email from suscription ";
		$query .= "WHERE BINARY email = '".$data['email']."' ";
		$query .= "AND id_campaign = ".$data['id_campaign'];

		$query = $db_suscripcion->query($query);

		if (count($query->result()) == 0)
		{
			$db_suscripcion->insert('suscription', $data);
			return $db_suscripcion->insert_id();
		}
		else
		{
			return "duplicado";
		}
	}
}