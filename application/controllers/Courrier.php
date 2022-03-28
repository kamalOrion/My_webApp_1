<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courrier extends CI_Controller {

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
			'title'=> "Courrier", //titre de la page
			'content'=>'courrier', //vue à afficher
		);
		$this->load->view('template/content', $data);
	}

	public function tableCourrierAjax(){
		$search = $this->ivtmodel->get_search_data('courrier', $_POST['start'], $_POST['length'], $_POST['search']['value'], 1, $this->session->userdata('id'), $_POST['order'][0]['column'], $_POST['order'][0]['dir']);
		$output = array(  
                "draw"  => intval($_POST["draw"]),  
                "recordsTotal" => $this->ivtmodel->count_search_data('courrier', NULL, 1, $this->session->userdata('id'), $_POST['order'][0]['column'], $_POST['order'][0]['dir']),
                "recordsFiltered" => $this->ivtmodel->count_search_data('courrier', $_POST['search']['value'], 1, $this->session->userdata('id'), $_POST['order'][0]['column'], $_POST['order'][0]['dir']),
                "data" => $search
            );  
		echo json_encode($output);
	}

	public function save_new_contact($contact, $update_action){
		$email_array = [];
		foreach($contact as $val){
			if(!$update_action && !$this->ivtmodel->getItem('contact', 'libelle', $val)){
				$this->ivtmodel->add('contact', ['statut'=> 1, 'libelle'=>$val]);
				$email_array[] = $val;
			}else $email_array[] = $val;
		}
		return implode('/', $email_array);
	}

	public function ajout(){
		
		if($this->check()){
			echo json_encode(['ajax' => 'ajax']);
			exit;
		}
		// var_dump($_POST);
		// exit;
        $this->form_validation->set_error_delimiters("<span class='error_smg' style='color: red; font-weight: bold'>", "</span>");
        
        if($this->form_validation->run() && isset($_POST['emetteur']) && isset($_POST['destinataire'])){

			$update_action = isset($_POST['id']);
			$data = array(
				'titre'=>$this->input->post('titre'),
				'objet'=>$this->input->post('objet'),
				'date_reception'=>date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('date_reception')))),
				'date_emission'=>date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('date_emission')))),
				'reference'=>$this->input->post('reference'),
				'se_refere'=>$this->input->post('se_refere'),
				'emetteur'=>$this->save_new_contact($this->input->post('emetteur'), $update_action),
				'destinataires'=>$this->save_new_contact($this->input->post('destinataire'), $update_action),
				'commentaires'=>$this->input->post('commentaire'),
				'cote'=>$this->input->post('cote'),
				'user_id'=>$this->session->userdata('id'),
				'echeance_reponse '=> $this->input->post('echeance_reponse')!= '' ? date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('echeance_reponse')))) : null,
				'statut'=>1,
			);
			
			if(($update_action) ? $this->ivtmodel->update('courrier', $data, 'id', $this->input->post('id')) : $this->ivtmodel->add('courrier', $data)) {
				echo json_encode(1);
			} else echo json_encode(2);
			
        }else {
			$errors = [
				'titre'=>form_error('titre') !=  '' ? form_error('titre'): '',
				'objet'=>form_error('objet') !=  '' ? form_error('objet'): '',
				'date_reception'=>form_error('date_reception') !=  '' ? form_error('date_reception'): '',
				'date_emission'=>form_error('date_emission') !=  '' ? form_error('date_emission'): '',
				'reference'=>form_error('reference') !=  '' ? form_error('reference'): '',
				'se_refere'=>form_error('se_refere') !=  '' ? form_error('se_refere'): '',
				'emetteur'=> (!isset($_POST['emetteur'])) ? "<span class='error_smg' style='color: red; font-weight: bold'>Ce champs est obligatoire</span>" : '',
				'destinataire'=>(!isset($_POST['destinataire'])) ? "<span class='error_smg' style='color: red; font-weight: bold'>Ce champs est obligatoire</span>" : '',
				'commentaire'=>form_error('commentaire') !=  '' ? form_error('commentaire'): '',
				'cote'=>form_error('cote') !=  '' ? form_error('cote'): '',
				'echeance_reponse'=>form_error('echeance_reponse') !=  '' ? form_error('echeance_reponse'): ''
			];
            echo json_encode($errors);
        }
	}	

	public function courrier_corbeille($id){
		echo json_encode(($this->ivtmodel->update('courrier', ['statut' => 2], 'id', $id)) ? 1 : 2);
	}

	public function selectAjax(){
		$data = $this->ivtmodel->getItemLikeBoth('contact', 'libelle', $_GET['term']);
		if($data != null){
			echo json_encode($data); 
		}else{
			$obj = new stdClass();
			$obj->id = $_GET['term'];
			$obj->libelle = $_GET['term'];
			echo json_encode([$obj]);
		}
	}
}
