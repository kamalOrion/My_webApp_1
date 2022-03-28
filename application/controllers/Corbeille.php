<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Corbeille extends CI_Controller {

	public function check(){
		if(!$this->ivtmodel->is_logged()){
			redirect('login/');//redirection vers le controlleur login
			exit;//sortie de code
		}
	}

	public function index()
	{
		$this->check();
		$data = array(
			'title'=> "Courrier | Corbeille", //titre de la page
			'content'=>'corbeille', //vue à afficher
		);
		$this->load->view('template/content', $data);
	}

	public function tableCorbeilleAjax(){
		$search = array_merge($this->ivtmodel->get_search_data('courrier', $_POST['start'], $_POST['length'], $_POST['search']['value'], 2), $this->ivtmodel->get_search_data('contact', $_POST['start'], $_POST['length'], $_POST['search']['value'], 2));
		$output = array(  
                "draw"  => intval($_POST["draw"]),  
                "recordsTotal" => $this->ivtmodel->count_search_data('courrier', NULL, 2) + $this->ivtmodel->count_search_data('contact', NULL, 2),
                "recordsFiltered" => $this->ivtmodel->count_search_data('courrier', $_POST['search']['value'], 2) + $this->ivtmodel->count_search_data('contact', $_POST['search']['value'], 2),
                "data" => $search
            );  
		echo json_encode($output);
	}

	public function restaurer(){
        $check = 2;
        switch ($this->input->post('table')){
            case 'Courrier':
                $check = ($this->ivtmodel->update('courrier', array('statut' => 1), 'id', $this->input->post('id'))) ? 1 : 2;
                break;
			case 'Contact':
				$check = ($this->ivtmodel->update('contact', array('statut' => 1), 'id', $this->input->post('id'))) ? 1 : 2;
				break;
        }
		echo json_encode($check);
	}
}
