<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
			'title'=> "Courrier| Utilisateurs", //titre de la page
			'content'=>'users', //vue à afficher
		);
		$this->load->view('template/content', $data);
	}

	public function tableUsersAjax(){
		$search = $this->ivtmodel->get_search_data('users', $_POST['start'], $_POST['length'], $_POST['search']['value'], NULL, NULL, $_POST['order'][0]['column'], $_POST['order'][0]['dir']);
		$output = array(  
                "draw"  => intval($_POST["draw"]),  
                "recordsTotal" => $this->ivtmodel->count_search_data('users', NULL, NULL, NULL, $_POST['order'][0]['column'], $_POST['order'][0]['dir']),
                "recordsFiltered" => $this->ivtmodel->count_search_data('users', $_POST['search']['value'], NULL, NULL, $_POST['order'][0]['column'], $_POST['order'][0]['dir']),
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

        if($this->ivtmodel->getItem('users', 'email', $this->input->post('email')) && !isset($_POST['id'])){
			echo json_encode([
				'email'=>"<span class='error_smg' style='color: red; font-weight: bold'>Cet email est déja utilisée</span>",
			]);
			return;
		}
        
        if($this->form_validation->run()){
            $privileges = (isset($_POST['privileges'])) ? $_POST['privileges'] : '';
            if($privileges != '') rsort($privileges);
            $data = array(
                'nom'=>$this->input->post('nom'),
                'prenoms'=>$this->input->post('prenoms'),
                'email'=>$this->input->post('email'),
                'privileges'=> ($privileges != '') ? implode($privileges) : '',
                'statut'=> 'Actif',
            );     
            
            
            if($_POST['pass'] !== '') $data['pass'] = sha1(md5($this->input->post('pass')));
            if(isset($_POST['id'])) $user = $this->ivtmodel->getItem('users', 'id', $this->input->post('id'));
            
            if((isset($_POST['id'])) ? $this->ivtmodel->update('users', $data, 'id', $this->input->post('id')) : $this->ivtmodel->add('users', $data)) {
                    
                    echo json_encode(1);
                } else echo json_encode(2);
        }else{
            echo json_encode([
				'nom'=>form_error('nom') !=  '' ? form_error('nom'): '',
                'prenoms'=>form_error('prenoms') !=  '' ? form_error('prenoms'): '',
                'email'=>form_error('email') !=  '' ? form_error('email'): '',
                'pass'=>form_error('pass') !=  '' ? form_error('pass'): '',
                'confirme'=>form_error('confirme') !=  '' ? form_error('confirme'): '',
			]);
        }
	}

    public function user_statut($id, $statut){
        if($statut == 'Actif'){
            echo json_encode(($this->ivtmodel->update('users', ['statut' => 'Desactive'], 'id', $id)) ? 1 : 2);
        } else echo json_encode(($this->ivtmodel->update('users', ['statut' => 'Actif'], 'id', $id)) ? 1 : 2);
    }

    public function get_privileges_ajax($id){
        echo($this->ivtmodel->getItem('users', 'id', $id)[0]->privileges);
    }
}
