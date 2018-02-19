<?php 
class Dama_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//creamos la funcion nuevo comentario que será la que haga la inserción a la base
	//de datos pasándole los datos a introducir en forma de array, siempre al estilo ci
	function save_dama( $data )
	{

		//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
		//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
		//envíar un email, en fin, lo que deseemos hacer
		// var_dump($data);
		$this->db->insert('dma_dama',$data);
		return $this->db->insert_id();
	}
}

/*fin del archivo comentarios model*/