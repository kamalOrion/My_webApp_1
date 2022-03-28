<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(

    'Login/connexion' => array(  /// (controleur/methode)
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email',
            'errors' =>  array('required'=>'Ce champs est obligatoire', 'valid_email'=>'Email invalide')
        ), 
        array(
            'field' => 'pass',
            'label' => 'Mot de passe',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        
    ), 

    'Courrier/ajout' => array(  /// (controleur/methode)
        // array(
        //     'field' => 'titre',
        //     'label' => 'Titre',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 
        array(
            'field' => 'objet',
            'label' => 'Objet',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        array(
            'field' => 'date_reception',
            'label' => 'Date de réception',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        array(
            'field' => 'date_emission',
            'label' => 'Date émission',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        // array(
        //     'field' => 'se_refere',
        //     'label' => 'Se référer à',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ),
        array(
            'field' => 'reference',
            'label' => 'Référence',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        // array(
        //     'field' => 'emetteur',
        //     'label' => 'Emetteur',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 
        // array(
        //     'field' => 'destinataire',
        //     'label' => 'Destinataire',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 
        // array(
        //     'field' => 'commentaire',
        //     'label' => 'Commentaire',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 
        // array(
        //     'field' => 'cote',
        //     'label' => 'Côte',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 
        // array(
        //     'field' => 'echeance_reponse',
        //     'label' => 'Echéance de réponse',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 

    ),   
    
    'Users/ajout' => array(  /// (controleur/methode)
        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        array(
            'field' => 'prenoms',
            'label' => 'Prénoms',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email',
            'errors' =>  array('required'=>'Ce champs est obligatoire', 'valid_email'=>'Email invalide')
        ), 
        array(
            'field' => 'pass',
            'label' => 'Mot de passe',
            'rules' => 'matches[confirme]',
            'errors' =>  array('matches'=>'Mot de passe non identique')
        ), 
        array(
            'field' => 'confirme',
            'label' => 'Confirmer mot de passe',
            'rules' => 'matches[pass]',
            'errors' =>  array('matches'=>'Mot de passe non identique')
        )
        
    ),
    
    'Contact/ajout' => array(  /// (controleur/methode)
        array(
            'field' => 'libelle',
            'label' => 'Nom',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        // array(
        //     'field' => 'prenoms',
        //     'label' => 'Prénoms',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // ), 
        // array(
        //     'field' => 'libelle',
        //     'label' => 'Libellé',
        //     'rules' => 'required',
        //     'errors' =>  array('required'=>'Ce champs est obligatoire')
        // )
        
    ),
    
    'Profil/change_pass' => array(  /// (controleur/methode)
        array(
            'field' => 'actuel_pass',
            'label' => 'Mot de passe actuel',
            'rules' => 'required',
            'errors' =>  array('required'=>'Ce champs est obligatoire')
        ), 
        array(
            'field' => 'nouveau_pass',
            'label' => 'Nouveau mot de passe',
            'rules' => 'required|matches[confirm_pass]',
            'errors' =>  array('required'=>'Ce champs est obligatoire', 'matches'=>'Mot de passe non identique')
        ), 
        array(
            'field' => 'confirm_pass',
            'label' => 'Confirmez le mot de passe',
            'rules' => 'required|matches[nouveau_pass]',
            'errors' =>  array('required'=>'Ce champs est obligatoire', 'matches'=>'Mot de passe non identique')
        )        
    ),
);

    

/* End of file ivt_config.php */
/* Location: ./application/config/ivt_config.php */