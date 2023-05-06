<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {
	
    function Select() {
		$this->db->select(" 
						id_calendar AS `id`,
						title AS `title`,
                        start_date AS `start`, 
                        end_date AS `end`,	
                        ruangan_meeting AS `location`,		
                        link_url AS `link_url`,		

						        
			, CASE 
			WHEN calendar.ruangan_meeting = 'Big Meeting Room' 
				THEN '#ff5656' 
			WHEN calendar.ruangan_meeting = 'Medium Meeting Room' 
				THEN '#2e9d50' 
			WHEN calendar.ruangan_meeting = 'Refinery Meeting Room' 
				THEN '#ff9041' 
            ELSE '#00c0ef' END AS color
			");
		$this->db->from('calendar');
		$this->db->where('year(start_date)',date('Y'));
		return $this->db->get();
	}
	function delete_event($id)
	{
	$this->db->where('id_calendar', $id);
	$this->db->delete('calendar');
	}

}
