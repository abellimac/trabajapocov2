<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suscription_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	function suscription_prueba()
	{
        //con esta línea cargamos la base de datos suscripcion
        //y la asignamos a $db_suscripcion
		$db_suscripcion = $this->load->database('suscripcion', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_suscripcion->get que contiene la conexión
        //a la base de datos prueba
		$usuarios = $db_suscripcion->get('email');
		foreach($usuarios->result() as $fila)
		{
			$data[] = $fila;
		}
		return $data;
	}
}