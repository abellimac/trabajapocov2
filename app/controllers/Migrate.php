<?php
class Migrate extends CI_Controller
{

        public function index()
        {
        	// for use database of suscription
			$this->load->database('suscription');
			$this->load->library('migration');
			if(!$this->migration->latest()) 
			{
				show_error($this->migration->error_string());
			}
			// if ($this->migration->current() === FALSE)
			// {
			// 	show_error($this->migration->error_string());
			// }
			// else
			// {
			// 	echo $this->migration->current();
			// }
        }

}