<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
			'title'=> "Courrier | Profil", //titre de la page
			'content'=>'profil', //vue à afficher
		);
		$this->load->view('template/content', $data);
	}

	public function change_pass(){
        if($this->check()){
			echo json_encode(['ajax' => 'ajax']);
			exit;
		}
        $this->form_validation->set_error_delimiters("<span class='error_smg' style='color: red; font-weight: bold'>", "</span>");

        if($this->form_validation->run()){

            $user = $this->ivtmodel->getItem('users', 'id', $this->session->userdata('id'));

            if($user[0]->pass == sha1(md5($this->input->post('actuel_pass')))){

                $data = array(
                    'pass'=> sha1(md5($this->input->post('nouveau_pass'))),
                );

                if($this->ivtmodel->update('users', $data, 'id', $this->session->userdata('id'))) {
                    echo json_encode(1);
                } else echo json_encode(2);

            }else echo json_encode(['actuel_pass'=> "<span class='error_smg' style='color: red; font-weight: bold'>Mot de passe incorrect</span>"]);

        }else{
            echo json_encode([
				'actuel_pass'=>form_error('actuel_pass') !=  '' ? form_error('actuel_pass'): '',
                'nouveau_pass'=>form_error('nouveau_pass') !=  '' ? form_error('nouveau_pass'): '',
                'confirm_pass'=>form_error('confirm_pass') !=  '' ? form_error('confirm_pass'): ''
			]);
        }
	}
}
