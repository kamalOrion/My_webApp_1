<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><i class='fa fa-envelope'></i> Courrier</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Dashboard
            </li>
            <li class="breadcrumb-item active">
                <strong>Courrier</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" style='padding-bottom: 5px;'>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox" style='margin-bottom: 0px'>
                <div class="ibox-content" style='padding: 15px'>
                    <div class='row'>
                        <div class='col-3'>
                            <h4><i class='fa fa-list'></i> Liste des Courrier</h4>
                        </div>
                        <div class='col-9 text-right'>
                            <?php if(in_array(1, $this->session->userdata('privileges'))): ?>
                            <button class='custom-btn btn btn-primary' data-toggle="modal" data-target="#ajouter_courrier">
                                <i class='fa fa-plus'></i>
                                Ajouter
                            </button>
                            <?php endif ?>
                            <?php if(in_array(2, $this->session->userdata('privileges'))): ?>
                            <button id='modifier_courrier' class='custom-btn btn btn-default default-k'>
                                <i class='fa fa-edit'></i>
                                Modifier
                            </button>
                            <?php endif ?>
                            <?php if(in_array(3, $this->session->userdata('privileges'))): ?>
                            <button id='supprimer_courrier' class='custom-btn btn btn-default default-k'>
                                <i class='fa fa-trash'></i> 
                                Corbeille
                            </button>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" style='padding-top: 5px'>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id='tableCourrier' class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>Ref</th>
                                    <th>Titre</th>
                                    <th>Objet</th>
                                    <th>Date de reception</th>
                                    <th>Date émission</th>
                                    <th>Référence</th>
                                    <th>Emetteur</th>
                                    <th>Destinataire</th>
                                    <th>Commentaire</th>
                                    <th>Se référer à</th>
                                    <th>Côte</th>
                                    <th>Echéance réponce</th>
                                    <th>Date d'enrégirement</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Ref</th>
                                    <th>Titre</th>
                                    <th>Objet</th>
                                    <th>Date de reception</th>
                                    <th>Date émission</th>
                                    <th>Référence</th>
                                    <th>Emetteur</th>
                                    <th>Destinataire</th>
                                    <th>Commentaire</th>
                                    <th>Se référer à</th>
                                    <th>Côte</th>
                                    <th>Echéance réponce</th>
                                    <th>Date d'enrégirement</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal inmodal fade" id="ajouter_courrier" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><span id='courrier_modal_title'><h2>Ajouter un courrier</h2></span></h4>
                <small class="font-bold">Veuillez remplir le formulaire et cliquez sur terminer pour enregistrer.</small>
                <div class='center'><small class="font-bold">Tous les champs sont obligatoire.</small></div>
            </div>
            
            <div class="modal-body">
                <?php echo form_open(base_url()."index.php/Courrier/ajout",array('id'=>'form_ajout_courrier','class'=>'m-t','role'=>'form'));?>
                    <div class="tab-content">
                        <div id="step1" class="p-m tab-pane active">

                            <div class="row">

                            <div class="col-lg-12">
                                    <div class="row">

                                    <div class="col-lg-6">
                                            <div class="form-group position-relative" id="date_js">
                                                <label class="font-normal">Date de réception</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id='date_reception' name='date_reception' class="form-control <?= ((form_error('date_reception') != "")?" is-invalid":"") ?>" autocomplete='off' readonly>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group position-relative" id="date_js">
                                                <label class="font-normal">Date d'émission</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id='date_emission' name='date_emission' class="form-control <?= ((form_error('date_emission') != "")?" is-invalid":"") ?>" autocomplete='off' readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                            <label>Référence</label>                                    
                                            <?php 
                                            $data = array(
                                                    "id"            => "reference",   
                                                    'name'          => 'reference',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control'.((form_error('reference') != "")?" is-invalid":""),
                                                    'value'         => set_value('reference'),
                                                    'autocomplete'      =>'off',
                                            );
                                            echo form_input($data); ?>
                                            </div>	
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                            <label>Objet</label>                                    
                                            <?php 
                                            $data = array(
                                                    "id"            => "objet",   
                                                    'name'          => 'objet',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control'.((form_error('objet') != "")?" is-invalid":""),
                                                    'value'         => set_value('objet'),
                                                    'autocomplete'      =>'off',
                                            );
                                            echo form_input($data); ?>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                            <label>Emetteur</label>
                                            <select id='emetteur' name='emetteur[]' class="select_custom form-control">
                                            </select>
                                            </div>	
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                            <label>Destinataire</label>
                                            <select id='destinataire' name='destinataire[]' class="select_custom form-control">
                                            </select>
                                            </div>	
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group position-relative">
                                            <label>Se référer à</label>                                    
                                            <?php 
                                            $data = array(
                                                    "id"            => "se_refere",   
                                                    'name'          => 'se_refere',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control'.((form_error('se_refere') != "")?" is-invalid":""),
                                                    'value'         => set_value('se_refere'),
                                                    'autocomplete'      =>'off',
                                            );
                                            echo form_input($data); ?>
                                            </div>	
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group position-relative" id="date_js">
                                                <label class="font-normal">Echéance réponse</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id='echeance_reponse' name='echeance_reponse' class="form-control <?= ((form_error('echeance_reponse') != "")?" is-invalid":"") ?>" autocomplete='off' readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group position-relative">
                                            <label>Côte</label>                                    
                                            <?php 
                                            $data = array(
                                                    "id"            => "cote",   
                                                    'name'          => 'cote',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control'.((form_error('cote') != "")?" is-invalid":""),
                                                    'value'         => set_value('cote'),
                                                    'autocomplete'      =>'off',
                                            );
                                            echo form_input($data); ?>
                                            </div>	
                                        </div>

                                    <div class="col-lg-6">
                                        <div class="form-group position-relative">
                                            <label>Titre</label>                                    
                                            <?php 
                                            $data = array(
                                                    "id"            => "titre",   
                                                    'name'          => 'titre',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control'.((form_error('titre') != "")?" is-invalid":""),
                                                    'value'         => set_value('titre'),
                                                    'autocomplete'      =>'off',
                                            );
                                            echo form_input($data); ?>
                                            </div>	
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                            <label>Commentaires</label>                                    
                                            <?php 
                                            $data = array(
                                                    "id"            => "commentaire",   
                                                    'name'          => 'commentaire',
                                                    'type'          => 'textarea',
                                                    'rows'          => '5',
                                                    'class'         => 'form-control'.((form_error('commentaire') != "")?" is-invalid":""),
                                                    'value'         => set_value('commentaire'),
                                                    'autocomplete'      =>'off',
                                            );
                                            echo form_textarea($data); ?>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button>
                <button id='terminer_ajout_courrier' form='form_ajout_courrier' type="submit" class="btn btn-primary">Terminer</button>
            </div>
        </div>
    </div>
</div>