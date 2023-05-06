<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller 
{   
    // public function __construct()
	// {
	// 	parent::__construct();
	// 	is_logged_in();
	// }

public function index()
	{
		$data['title'] = 'Calendar';
		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['calendar'] = $this->db->get('calendar')->result_array();
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('calendar/index', $data);
			$this->load->view('templates/footer');
	
}
function load_data() {

		$this->load->model('calendar_model');
		
		echo json_encode($this->calendar_model->Select()->result());
}
public function detail_event($id=0)
    {
        $data['title'] = 'Detail Event Calendar';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$calendar = $this->db->get_where('calendar', ['id_calendar' => $id])->result_array();
		
		// die($id);

		//echo $this->db->last_query();
		$content  = "<table class='table table-bordered'>
					<tr style='color: black; font-size: 12px;' class='text-center'>
					<th>Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					</tr>"; 
		foreach($calendar as $dmce){
			$content .= "<tr style='color: black; font-size: 12px;' class='text-center'>
					<td>".$dmce['title']."</td>".
					"<td>".$dmce['start_date']."</td>".
					"<td>".$dmce['end_date']."</td>
					</tr>";
		}
		$content .= "</table>";
		echo $content;
}
public function add_event()
	{
        $session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();


		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('start_date','Start Date','required');
		$this->form_validation->set_rules('end_date','End Date','required');
		$this->form_validation->set_rules('ruangan_meeting','ruangan_meeting','required');
		$this->form_validation->set_rules('link_url','link_url');

		$start_date = date('Y-m-d H:i:s', strtotime($_POST['start_date']));
		$end_date = date('Y-m-d H:i:s', strtotime($_POST['end_date']));
		$ruangan = $_POST['ruangan_meeting'];

		$cek_query = $this->db->query("SELECT * FROM calendar 
									   WHERE start_date = '$start_date' 
									   AND end_date = '$end_date'
									   AND ruangan_meeting = '$ruangan'")->result_array();

		// print_r($cek_query); die();

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('calendar/index', $data);
			$this->load->view('templates/footer');	

		} elseif(count($cek_query) > 0) {	

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Meeting Room is Full...!!! Please Choose Another Date & Room. Thank You!! </div>');
			redirect('calendar');

		} else {
			$data = [
						'title' => $this->input->post('title'),
						'start_date' =>	date('Y-m-d H:i:s', strtotime($this->input->post('start_date'))),
						'end_date' =>	date('Y-m-d H:i:s', strtotime($this->input->post('end_date'))),
						'ruangan_meeting' => $this->input->post('ruangan_meeting'),
						'link_url' => $this->input->post('link_url'),
		   			];
			$this->db->insert('calendar', $data);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You Success Create New Event!</div>');
			redirect('calendar');
		}
}
public function delete($id)
		{
		
		$this->db->where('id_calendar',$id);
		$this->db->delete('calendar');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Success Remove Event !</div>');
			redirect('calendar');
}

public function edit_event($id = null)
	{
		

			$title = $_POST['title_event'];
			$start_date = $_POST['start_date_event'];
			$end_date = $_POST['end_date_event'];
			$ruangan_meeting = $_POST['location_event'];
			$link_url = $_POST['linkurl_event'];

			// $id_calendar = $this->input->post('id_calendar');
			// $title = $this->input->post('title_event');
			// $start_date = date('Y-m-d H:i:s', strtotime($this->input->post('start_date_event')));
			// $end_date = date('Y-m-d H:i:s', strtotime($this->input->post('end_date_event')));
			// $ruangan_meeting = $this->input->post('location_event');
			// $link_url = $this->input->post('linkurl_event');
			// $update = $this->db->query("UPDATE calendar 
			// 							SET ")

			$this->db->set('title', $title);
			$this->db->set('start_date', $start_date);
			$this->db->set('end_date', $end_date);
			$this->db->set('ruangan_meeting', $ruangan_meeting);
			$this->db->set('link_url', $link_url);
			$this->db->where('id_calendar', $id);
			$this->db->update('calendar');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit Event Success !</div>');
			redirect('calendar');
		}
	
}