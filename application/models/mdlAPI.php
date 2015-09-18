<?php
class mdlapi extends CI_Model {
	
   function __construct(){
        parent::__construct();

        $this->load->database();
    }
	
	public function dbTest(){

		$r = $this-db->query('select * from information_schema.tables');
		print_r($r);

	}
	
}
?>