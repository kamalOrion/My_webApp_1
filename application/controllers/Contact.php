<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function check(){
		if(!$this->ivtmodel->is_logged()){
			if($this->input->is_ajax_request()){
				return true;
			}else{
				redirect('login/');//redirection vers le controlleur login
				exit;//sortie de code
			}
		}
	}


	public function index()
	{
		$this->check();
		$data = array(
			'title'=> "Contacts", //titre de la page
			'content'=>'contact', //vue à afficher
		);
		$this->load->view('template/content', $data);
	}

	public function tableContactAjax(){
		$search = $this->ivtmodel->get_search_data('contact', $_POST['start'], $_POST['length'], $_POST['search']['value'], 1, NULL, $_POST['order'][0]['column'], $_POST['order'][0]['dir']);
		$output = array(  
                "draw"  => intval($_POST["draw"]),  
                "recordsTotal" => $this->ivtmodel->count_search_data('contact', NULL, 1, NULL, $_POST['order'][0]['column'], $_POST['order'][0]['dir']),
                "recordsFiltered" => $this->ivtmodel->count_search_data('contact', $_POST['search']['value'], 1, NULL, $_POST['order'][0]['column'], $_POST['order'][0]['dir']),
                "data" => $search
            );  
		echo json_encode($output);
	}

	public function ajout(){
		if($this->check()){
			echo json_encode(['ajax' => 'ajax']);
			exit;
		}
        $this->form_validation->set_error_delimiters("<span class='error_smg' style='color: red; font-weight: bold'>", "</span>");

		if($this->ivtmodel->getItem('contact', 'libelle', $this->input->post('libelle')) && !isset($_POST['id'])){
			echo json_encode([
				'email'=>"<span class='error_smg' style='color: red; font-weight: bold'>Cet libellé est déja enrégistrée</span>",
			]);
			return;
		}
        
        if($this->form_validation->run()){
            $data = array(
                'libelle'=>$this->input->post('libelle'),
                // 'prenoms'=>$this->input->post('prenoms'),
                // 'libelle'=>$this->input->post('libelle'),
                'statut'=>1,
            );
			
			if(isset($_POST['id'])) $contact = $this->ivtmodel->getItem('contact', 'id', $this->input->post('id'));
            
            if((isset($_POST['id'])) ? $this->ivtmodel->update('contact', $data, 'id', $this->input->post('id')) : $this->ivtmodel->add('contact', $data)) {
                    echo json_encode(1);
                } else echo json_encode(2);
        }else {
            echo json_encode([
				'libelle'=>form_error('libelle') !=  '' ? form_error('libelle'): '',
				// 'prenoms'=>form_error('prenoms') !=  '' ? form_error('prenoms'): '',
				// 'email'=>form_error('email') !=  '' ? form_error('email'): '',
			]);
        }
	}

	public function contact_corbeille($id){
		echo json_encode(($this->ivtmodel->update('contact', ['statut' => 2], 'id', $id)) ? 1 : 2);
	}
}
