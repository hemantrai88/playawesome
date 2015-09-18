<?php
class mdlapi extends CI_Model {
	
   function __construct(){
        parent::__construct();

        $this->load->database();
    }
	
	public function tagList(){
		
		$tagsArr = array();

		$this->db->select('plTagId, plTagLabel');
		$this->db->from('plTagsDB');

		$r = $this->db->get()->result_array();

		foreach ($r as $tag) {
			$tagsArr[$tag['plTagId']]=$tag['plTagLabel'];
		}

		return $tagsArr;
	}

	public function rollIt($plName, $plDescription, $plCover, $plTags){

		$rollArr = array();

		$plStatus = 1;
		$plOwner = 1;
		$plOrigin = 1;

		$tag1 = '';
		$tag2 = '';
		$tag3 = '';
		$tag4 = '';
		$tag5 = '';

		$count = 1;

		foreach ($plTags as $tag) {
			switch ($count) {
				case 1:
					$tag1 = $tag;
					break;

				case 2:
					$tag2 = $tag;
					break;
				
				case 3:
					$tag3 = $tag;
					break;

				case 4:
					$tag4 = $tag;
					break;

				case 5:
					$tag5 = $tag;
					break;

				default:
					break;
			}
			$count++;
		}

		$rollArr['plName'] = $plName;
		$rollArr['plDescription'] = $plDescription;
		$rollArr['plCover'] = $plCover;
		$rollArr['plTag1'] = $tag1;
		$rollArr['plTag2'] = $tag2;
		$rollArr['plTag3'] = $tag3;
		$rollArr['plTag4'] = $tag4;
		$rollArr['plTag5'] = $tag5;
		$rollArr['plStatus'] = $plStatus;
		$rollArr['plOwner'] = $plOwner;
		$rollArr['plOrigin'] = $plOrigin;
		$rollArr['plCreatedAt'] = date('Y-m-d h:i:s a');
		$rollArr['plLastEdited'] = date('Y-m-d h:i:s a');

		$this->db->insert('playlistsDB', $rollArr);

		return $this->db->insert_id();
	}

	public function draftPlaylists(){

		$this->db->select('p.*, u.userFirstName as fName, u.userLastName as lName');
		$this->db->from('playlistsDB p');
		$this->db->join('usersDB u', 'p.plOwner=u.userID');
		$this->db->where('plStatus',1);

		$r = $this->db->get()->result_array();

		return $r;
	}

	public function getPlaylist($plID){

		$this->db->select('p.*, t1.plTagLabel as tag1, t2.plTagLabel as tag2, t3.plTagLabel as tag3, t4.plTagLabel as tag4, t5.plTagLabel as tag5');
		$this->db->from('playlistsDB p');
		$this->db->join('plTagsDB t1', 'p.plTag1=t1.plTagId', 'left');
		$this->db->join('plTagsDB t2', 'p.plTag2=t2.plTagId', 'left');
		$this->db->join('plTagsDB t3', 'p.plTag3=t3.plTagId', 'left');
		$this->db->join('plTagsDB t4', 'p.plTag4=t4.plTagId', 'left');
		$this->db->join('plTagsDB t5', 'p.plTag5=t5.plTagId', 'left');
		$this->db->where('plID', $plID);

		$r = $this->db->get()->result_array();

		return json_encode($r[0]);
	}
	
}
?>