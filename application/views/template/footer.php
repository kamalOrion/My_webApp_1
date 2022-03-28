    <div class="footer">
        <div>
        </div>
    </div>
</div>
        

<!-- Mainly scripts -->
    <script src="<?= base_url('assets/');?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/');?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/');?>js/bootstrap.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?= base_url('assets/');?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?= base_url('assets/');?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url('assets/');?>js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url('assets/');?>js/inspinia.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url('assets/');?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?= base_url('assets/');?>js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?= base_url('assets/');?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?= base_url('assets/');?>js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?= base_url('assets/');?>js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?= base_url('assets/');?>js/plugins/toastr/toastr.min.js"></script>

    <!-- Data picker -->
   <script src="<?= base_url('assets/');?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <!-- Datatable -->
    <script src="<?= base_url('assets/');?>js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url('assets/');?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function(){
            var ajax_data = {
                data: null,
                designation: {}
            }

            $("#emetteur").select2(multi_select_ajax('<?php echo site_url() . '/Courrier/selectAjax'; ?>'));
            $("#destinataire").select2(multi_select_ajax('<?php echo site_url() . '/Courrier/selectAjax'; ?>'));

            function multi_select_ajax(url){
                return {
                    dropdownParent: $('#form_ajout_courrier'),
                    multiple: true,
                    delay:250,
                    ajax: {
                        url: url,
                        dataType: 'json',
                        processResults: function (data) {
                            let select = {results:[]};
                            for(element in data){
                                let single = {
                                    id: data[element].libelle,
                                    text: data[element].libelle
                                }
                                select.results.push(single);
                            }
                            return select;
                        }
                    }
                }
            }

            $(".default-k").on("click", function(e){
                e.preventDefault();
                if($(this).hasClass("btn-default")){
                    alert("Aucune ligne selectionné !!!");
                }
            });

            //get_designation();  --IMPORTANT--

            var tableCourrier = $('#tableCourrier').DataTable({
                pageLength: 25,
                order: [[ 0, "desc" ]],
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'}                    
                ],
                language: {
                    "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Recherche",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments &nbsp;&nbsp;&nbsp;",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur  _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {						
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                        },
                        "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                },
                //"columnDefs": [{ "targets": [ 0 ],"visible": false,"searchable": false }],
                "processing": true,
                "serverSide": true,
                ajax:{  
                    url:"<?php echo site_url() . '/Courrier/tableCourrierAjax'; ?>",  
                    type:"POST"  ,
                    dataSrc:function(j){
                        console.log(j);
                        let data_array = [];
                        for(const element of j.data){
                            data_array.push([
                                element.id,
                                element.titre,
                                element.objet,
                                format_date(element.date_reception),
                                format_date(element.date_emission),
                                element.reference,
                                format_email_string(element.emetteur),
                                format_email_string(element.destinataires),
                                element.commentaires,
                                element.se_refere,
                                element.cote,
                                element.echeance_reponse ? format_date(element.echeance_reponse) : '',
                                format_date(element.date_enreg)
                                //ajax_data.designation[element.designation],
                            ]);
                        }
                        return data_array;
                    } 
                }
            });

            function format_email_string(email_string){
                let email_array = email_string.split('/');
                return email_array.join('<br>');
            }

            function get_corbeil_nature_libelle(data){
                if(data.hasOwnProperty('libelle')){
                    return {nature: 'Contact', libelle: data.libelle}
                }

                if(data.hasOwnProperty('objet')){
                    return {nature: 'Courrier', libelle: data.titre+" | "+data.objet}
                }
            }

            function set_select2(data, field_id){
                let data_array = data.split('<br>');
                for(element of data_array){
                    if(element != ''){
                        let option = new Option(element, element, false, true);
                        $('#'+field_id).append(option).trigger('change');
                    }
                }
            }

            var tableCorbeille = $('#tableCorbeille').DataTable({
                pageLength: 25,
                responsive: true,
                ordering: false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'}                    
                ],
                language: {
                    "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Recherche",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments &nbsp;&nbsp;&nbsp;",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur  _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {						
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                        },
                        "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                },
                "columnDefs": [{ "targets": [ 0 ],"visible": false,"searchable": false }],
                "processing": true,
                "serverSide": true,
                ajax:{  
                    url:"<?php echo site_url() . '/Corbeille/tableCorbeilleAjax'; ?>",  
                    type:"POST"  ,
                    dataSrc:function(j){
                        let data_array = [];
                        for(const element of j.data){
                            let data = get_corbeil_nature_libelle(element);
                            data_array.push([
                                element.id,
                                data.nature,
                                data.libelle,
                                element.date_enreg
                            ]);
                        }
                        return data_array;
                    } 
                }
            });

            

            var tableUsers = $('#tableUsers').DataTable({
                pageLength: 25,
                order: [[ 0, "desc" ]],
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'}                    
                ],
                language: {
                    "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Recherche",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments &nbsp;&nbsp;&nbsp;",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur  _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {						
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                        },
                        "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                },
                "columnDefs": [{ "targets": [ 0 ],"visible": false,"searchable": false }],
                "processing": true,
                "serverSide": true,
                ajax:{  
                    url:"<?php echo site_url() . '/Users/tableUsersAjax'; ?>",  
                    type:"POST",
                    dataSrc:function(j){
                        let data_array = [];
                        for(const element of j.data){
                            data_array.push([
                                element.id,
                                element.nom,
                                element.prenoms,
                                element.email,
                                element.statut,
                                element.date_enreg
                            ]);
                        }
                        return data_array;
                    } 
                }
            });

            var tableContact = $('#tableContact').DataTable({
                pageLength: 25,
                responsive: true,
                order: [[ 0, "desc" ]],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'}                    
                ],
                language: {
                    "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Recherche",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments &nbsp;&nbsp;&nbsp;",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur  _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {						
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                        },
                        "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                },
                "columnDefs": [{ "targets": [ 0 ],"visible": false,"searchable": false }],
                "processing": true,
                "serverSide": true,
                ajax:{  
                    url:"<?php echo site_url() . '/Contact/tableContactAjax'; ?>",  
                    type:"POST",
                    dataSrc:function(j){
                        let data_array = [];
                        for(const element of j.data){
                            data_array.push([
                                element.id,
                                element.libelle,
                                element.date_enreg
                            ]);
                        }
                        return data_array;
                    } 
                }
            });

            $('#tableCourrier tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {

                    $(this).removeClass('selected');

                    if($("#modifier_courrier").hasClass('btn-primary') ) {
                    $("#modifier_courrier").removeClass("btn-primary");	
                    $("#modifier_courrier").addClass("btn btn-default");}

                    if($("#supprimer_courrier").hasClass('btn-primary') ) {
                    $("#supprimer_courrier").removeClass("btn-primary");	
                    $("#supprimer_courrier").addClass("btn btn-default");}
                }
                else {

                    $('tr.selected').removeClass('selected');

                    $(this).addClass('selected');

                    if ($("#modifier_courrier").hasClass('btn-default') ) {
                    $("#modifier_courrier").removeClass("btn-default");
                    $("#modifier_courrier").addClass("btn-primary");}

                    if ($("#supprimer_courrier").hasClass('btn-default') ) {
                    $("#supprimer_courrier").removeClass("btn-default");
                    $("#supprimer_courrier").addClass("btn-primary");}

                }
            });

            $('#tableCorbeille tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {

                    $(this).removeClass('selected');

                    if($("#restaurer").hasClass('btn-primary') ) {
                    $("#restaurer").removeClass("btn-primary");	
                    $("#restaurer").addClass("btn btn-default");}
                }
                else {

                    $('tr.selected').removeClass('selected');

                    $(this).addClass('selected');

                    if ($("#restaurer").hasClass('btn-default') ) {
                    $("#restaurer").removeClass("btn-default");
                    $("#restaurer").addClass("btn-primary");}

                }
            });

            $('#tableUsers tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {

                    $(this).removeClass('selected');

                    if($("#modifier_user").hasClass('btn-primary') ) {
                    $("#modifier_user").removeClass("btn-primary");	
                    $("#modifier_user").addClass("btn btn-default");}

                    if($("#statut_user").hasClass('btn-primary') ) {
                    $("#statut_user").removeClass("btn-primary");	
                    $("#statut_user").addClass("btn btn-default");}
                }
                else {

                    $('tr.selected').removeClass('selected');

                    $(this).addClass('selected');

                    if ($("#modifier_user").hasClass('btn-default') ) {
                    $("#modifier_user").removeClass("btn-default");
                    $("#modifier_user").addClass("btn-primary");}

                    if ($("#statut_user").hasClass('btn-default') ) {
                    $("#statut_user").removeClass("btn-default");
                    $("#statut_user").addClass("btn-primary");}

                }
            });

            $('#tableContact tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {

                    $(this).removeClass('selected');

                    if($("#modifier_contact").hasClass('btn-primary') ) {
                    $("#modifier_contact").removeClass("btn-primary");	
                    $("#modifier_contact").addClass("btn btn-default");}

                    if($("#corbeille_contact").hasClass('btn-primary') ) {
                    $("#corbeille_contact").removeClass("btn-primary");	
                    $("#corbeille_contact").addClass("btn btn-default");}
                }
                else {

                    $('tr.selected').removeClass('selected');

                    $(this).addClass('selected');

                    if ($("#modifier_contact").hasClass('btn-default') ) {
                    $("#modifier_contact").removeClass("btn-default");
                    $("#modifier_contact").addClass("btn-primary");}

                    if ($("#corbeille_contact").hasClass('btn-default') ) {
                    $("#corbeille_contact").removeClass("btn-default");
                    $("#corbeille_contact").addClass("btn-primary");}

                }
            });

//------------------------------------------------------------------------------------------------------------------------------------------------

            var mem = $('#date_js .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd/mm/yyyy'
            });

            // function get_designation(){
            //     $.ajax({
            //         url: "<?= site_url(); ?>/Depenses/get_designation",
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         error: function(request, error) { // Info de debuggage en cas erreur         
            //                     alert("Erreur : responseText: "+request.responseText);
            //                 },
            //         success: function(data) {
            //                     for(designation of data){                                    
            //                         ajax_data.designation[designation.id] = designation.libelle;
            //                     }                             
            //                 }       
            //     });
            // } 

            function get_key_by_value(object, value){
                return Object.keys(object).find(key => object[key] === value);
            }

            //Fonction non mutable===========================================================================

            //Fonction callback de soumssion de formulaire
            function succes_callback(table_id, form_id, btn_terminer_id, modal_id, sucess_add_smg, sucess_update_smg, flag){

                let code = ajax_data.data;
                $('#'+form_id).find(".error_smg").remove();

                if(typeof code === "object"){
                    for(name of Object.keys(code)){
                        if(code[name] !== ''){
                            if(name != 'date_reception' && name != 'date_emission' && name != 'echeance_reponse'){
                                $('#'+form_id).find("[name="+name+"]").after(code[name]);
                                if(name == 'emetteur' || name == 'destinataire'){
                                    $('#'+form_id).find("[name='"+name+"[]']").parent().after(code[name]);
                                }
                            } else if(name == 'emetteur' || name == 'destinataire'){
                                $('#'+form_id).find("[name='"+name+"[]']").parent().after(code[name]);
                            } else $('#'+form_id).find("[name="+name+"]").parent().after(code[name]);
                        }
                    }
                    $('#'+btn_terminer_id).prop('disabled', false);
                }else if(code == 1){
                    rezero(flag);	
                    alert(check_action(flag) ? sucess_update_smg : sucess_add_smg);
                    $('#'+modal_id).modal('toggle');
                    $('#'+btn_terminer_id).prop('disabled', false);
                    $("#"+table_id).DataTable().ajax.reload();
                }else if(code == 2 ){
                    alert("Echec de l'opération !!!")
                    $('#'+btn_terminer_id).prop('disabled', false);
                }
            }

            //Fonction de mise en corbeille
            function put_to_corbeille(table_id, btn_corbeille_id, flag, sucess_smg){
                $("#"+btn_corbeille_id).on('click', function(){
                    if($("#"+btn_corbeille_id).hasClass('btn-primary')){
                        if(confirm((btn_corbeille_id == 'statut_user') ? 'Êtes-vous sur de vouloir changer le statut de cet utilisateur' : 'Êtes-vous sur de vouloir supprimer cet élément')){
                            let url = get_corbeille_url(flag);
                            $.ajax({
                                url: url,
                                type: "GET",
                                dataType: "json",
                                error: function(request, error) { // Info de debuggage en cas erreur         
                                            alert("Erreur : responseText: "+request.responseText);
                                        },
                                success: function(data) {
                                            if(data == 1){
                                                alert(sucess_smg);
                                            }else{
                                                alert('Echèc de la suppression');
                                            } 
                                            
                                            $("#"+table_id).DataTable().ajax.reload();
                                            rezero(flag);
                                        }       
                            });
                        }
                    }
                });
            }

            //Restauration des éléments de la corbeille
           
                $("#restaurer").on('click', function(e){
                    if($(e.target).hasClass('btn-primary')){
                        if(confirm('Êtes-vous sur de vouloir restaurer cet élément')){
                            $.ajax({
                                url:"<?= site_url(); ?>/Corbeille/restaurer",
                                type: "POST",
                                dataType: "json",
                                data: {id: tableCorbeille.cell(".selected", 0).data(), table: tableCorbeille.cell(".selected", 1).data()},
                                error: function(request, error) { // Info de debuggage en cas erreur         
                                            alert("Erreur : responseText: "+request.responseText);
                                        },
                                success: function(data) {
                                            alert((data == 1) ? 'Elément restauré avec succès' : "Echèc de l'opération");
                                            $("#tableCorbeille").DataTable().ajax.reload();
                                            rezero('corbeille');
                                        }       
                            });
                        }
                    }
                });
            

            //Fonction de formatage de la date
            function format_date(string_date){
                if(string_date.split(' ').length == 2){
                    let date_parts1 = string_date.split(' '), date_parts2 = date_parts1[0].split('-');
                    return date_parts2[2]+"/"+date_parts2[1]+"/"+date_parts2[0]+" "+date_parts1[1];
                }else{
                    let date_parts = string_date.split('-');
                return date_parts[2]+"/"+date_parts[1]+"/"+date_parts[0];
                }
                
            }

            // Fonction de soumission des formulaires
            function submit_form(form_id, btn_terminer_id, table, flag){
                $('#'+form_id).on('submit', function(e){
                    e.preventDefault();
                    submit_form_ajax(e, btn_terminer_id, table, 'POST', flag);
                });
            }

            //Fin fonction non mutable===================================================================

            function log_out(){
                window.location.replace('<?= base_url() ?>index.php/Login');
            }


            //Fonction mutable===========================================================================

            //Fonction de soumssion de formulaire
            function submit_form_ajax(e, btn_terminer_id, table, method, flag){
                $('#'+btn_terminer_id).prop('disabled', true);
                let url = e.target.action;
                data = $(e.target).serializeArray();
                if(check_action(flag)) data.push({name: 'id', value: parseInt(table.cell(".selected", 0).data())})
                $.ajax({
                url: url,
                type: method,
                dataType: "json",
                data: data,
                error: function(request, error) { // Info de debuggage en cas erreur         
                            alert("Erreur : responseText: "+request.responseText);
                        },
                success: function(data) {
                    typeof data.ajax !== 'undefined' ? log_out() : '';
                            ajax_data.data = data;
                            if(table == tableCourrier) succes_callback('tableCourrier', 'form_ajout_courrier', btn_terminer_id, 'ajouter_courrier', "Courrier ajouté avec succès", "Courrier modifier avec succès", 'courrier');

                            if(table == tableUsers) succes_callback('tableUsers', 'form_ajout_user', btn_terminer_id, 'ajouter_user', "Utilsateur ajouté avec succès", "Utilsateur modifier avec succès", 'user');

                            if(table == tableContact) succes_callback('tableContact', 'form_ajout_contact', btn_terminer_id, 'ajouter_contact', "Contact ajouté avec succès", "Contact modifier avec succès", 'contact');
                        }       
                });
            }

            //Fonction executant les actions nécéssaires après fermeture de modal
            function actions_on_modal_hide_init(modal_id, form_id, title_block_id){
                $('#'+modal_id).on('hide.bs.modal', function (e) {
                    if(e.target.id == modal_id){
                        $('#'+form_id).find(".error_smg").remove();
                        $('#'+form_id).get(0).reset();
                        $("#emetteur").val(null).trigger('change');
                        $("#destinataire").val(null).trigger('change');
                        if(title_block_id == 'courrier_modal_title') $('#'+title_block_id).html("<h2 id="+title_block_id+">Ajouter un courrier</h2>");
                        if(title_block_id == 'users_modal_title') $('#'+title_block_id).html("<h2 id="+title_block_id+">Ajouter un utilisateur</h2>");
                        if(title_block_id == 'contact_modal_title') $('#'+title_block_id).html("<h2 id="+title_block_id+">Ajouter un contact</h2>");
                    }
                });
            }

            //Fonction executant les actions nécéssaires avant ourverture de modal
            function set_edition_form(btn_edition, title_block_id, modal_id, table){
                $("#"+btn_edition).on('click', function(){
                    if($("#"+btn_edition).hasClass('btn-primary')){
                        if(title_block_id == 'courrier_modal_title') $("#"+title_block_id).html("<h2 id="+title_block_id+">Modifier un courrier</h2>");
                        $('#'+modal_id).modal('show');

                        if(title_block_id == 'users_modal_title') $("#"+title_block_id).html("<h2 id="+title_block_id+">Modifier un utilisateur</h2>");
                        $('#'+modal_id).modal('show');
                        
                        if(title_block_id == 'contact_modal_title') $("#"+title_block_id).html("<h2 id="+title_block_id+">Modifier un contact</h2>");
                        $('#'+modal_id).modal('show');
                    

                        if(table == tableCourrier){
                            $("#titre").val(table.cell(".selected", 1).data())
                            $("#objet").val(table.cell(".selected", 2).data())
                            $("#date_reception").val(table.cell(".selected", 3).data())
                            $("#date_emission").val(table.cell(".selected", 4).data())
                            $("#se_refere").val(table.cell(".selected", 9).data())
                            $("#reference").val(table.cell(".selected", 5).data())
                            //$("#emetteur").
                            set_select2(table.cell(".selected", 6).data(), 'emetteur') 
                            //$("#destinataire").
                            set_select2(table.cell(".selected", 7).data(), 'destinataire') 
                            $("#commentaire").val(table.cell(".selected", 8).data())
                            $("#cote").val(table.cell(".selected", 10).data())
                            $("#echeance_reponse").val(table.cell(".selected", 11).data())
                        }

                        if(table == tableContact){
                            $("#libelle").val(table.cell(".selected", 1).data())
                        }
                        
                        if(table == tableUsers){
                            $("#nom").val(table.cell(".selected", 1).data())
                            $("#prenoms").val(table.cell(".selected", 2).data())
                            $("#email").val(table.cell(".selected", 3).data())
                            
                            $.ajax({
                                url: "<?php echo site_url() . '/Users/get_privileges_ajax/'; ?>"+tableUsers.cell(".selected", 0).data(),
                                type: "GET",
                                dataType: "json",
                                error: function(request, error) { // Info de debuggage en cas erreur         
                                            alert("Erreur : responseText: "+request.responseText);
                                        },
                                success: function(data) {
                                    let privileges_array = data.toString().split('');
                                            for(privilege of privileges_array){
                                                $("#"+privilege).prop('checked', true);
                                            }
                                        }       
                            });
                        }
                    }
                })
            }

            //Fonction de vérification de l'action (ajout ou mise à jours)
            function check_action(flag){
                if(flag == 'courrier') return $('#courrier_modal_title h2').html() == "Modifier un courrier";
                if(flag == 'user') return $('#users_modal_title h2').html() == "Modifier un utilisateur";
                if(flag == 'contact') return $('#contact_modal_title h2').html() == "Modifier un contact";
            }

            //Fonction de retour à l'état d'arriver sur le page
            function rezero(flag){
                if(flag == 'courrier'){
                    $("#modifier_courrier").removeClass("btn-primary");	
                    $("#supprimer_courrier").removeClass("btn-primary");
                    $("#modifier_courrier").addClass("btn-default");
                    $("#supprimer_courrier").addClass("btn-default");
                }

                if(flag == 'user'){
                    $("#modifier_user").removeClass("btn-primary");	
                    $("#statut_user").removeClass("btn-primary");
                    $("#modifier_user").addClass("btn-default");
                    $("#statut_user").addClass("btn-default");
                }

                if(flag == 'contact'){
                    $("#modifier_contact").removeClass("btn-primary");	
                    $("#corbeille_contact").removeClass("btn-primary");
                    $("#modifier_contact").addClass("btn-default");
                    $("#corbeille_contact").addClass("btn-default");
                }

                if(flag == 'corbeille'){
                    $("#restaurer").removeClass("btn-primary");
                    $("#restaurer").addClass("btn-default");
                }
            }

            //Fonction de recuperation de l'URL de mise en corbeille
            function get_corbeille_url(flag){
                let base_url = "<?= site_url(); ?>";
                if(flag == "courrier"){
                    return base_url+"/Courrier/courrier_corbeille/"+tableCourrier.cell(".selected", 0).data();
                }

                if(flag == "user"){
                    return base_url+"/Users/user_statut/"+tableUsers.cell(".selected", 0).data()+"/"+tableUsers.cell(".selected", 4).data();
                }

                if(flag == "contact"){
                    return base_url+"/Contact/contact_corbeille/"+tableContact.cell(".selected", 0).data();
                }
            } 
            

            //Fin fonction mutable===========================================================================


            //Soumission du formulaire de la page profil
            $('#profil_mdp_form').on('submit', function(e){
                e.preventDefault();
                $('#profil_mdp_form_terminer').prop('disabled', true);
                $('#profil_mdp_form').find(".error_smg").remove();
                $.ajax({
                    url: e.target.action,
                    type: "POST",
                    dataType: "json",
                    data: $(e.target).serializeArray(),
                    error: function(request, error) { // Info de debuggage en cas erreur         
                                alert("Erreur : responseText: "+request.responseText);
                            },
                    success: function(data) {
                    typeof data.ajax !== 'undefined' ? log_out() : '';
                                if(data == 1){
                                    alert('Mot de passe mise à jours avec succès');
                                    $('#profil_mdp_form').get(0).reset();
                                } 
                                if(data == 2) alert("Echès de l'opération !!!")
                                if(typeof data === "object"){
                                    for(name of Object.keys(data)){
                                        if(data[name] !== ''){
                                            if(data[name] !== ''){
                                                $('#profil_mdp_form').find("[name="+name+"]").parent().after(data[name]);
                                            }
                                        }
                                    }
                                } $('#profil_mdp_form_terminer').prop('disabled', false);
                            }       
                });
            });


            // Soumission des formulaires
            submit_form('form_ajout_courrier', 'terminer_ajout_courrier', tableCourrier, 'courrier'),
            submit_form('form_ajout_user', 'terminer_ajout_user', tableUsers, 'user')
            submit_form('form_ajout_contact', 'terminer_ajout_contact', tableContact, 'contact')

            actions_on_modal_hide_init('ajouter_courrier', 'form_ajout_courrier', 'courrier_modal_title')
            actions_on_modal_hide_init('ajouter_user', 'form_ajout_user', 'users_modal_title')
            actions_on_modal_hide_init('ajouter_contact', 'form_ajout_contact', 'contact_modal_title')

            set_edition_form('modifier_courrier', 'courrier_modal_title', 'ajouter_courrier', tableCourrier)
            set_edition_form('modifier_user', 'users_modal_title', 'ajouter_user', tableUsers)
            set_edition_form('modifier_contact', 'contact_modal_title', 'ajouter_contact', tableContact)

            put_to_corbeille('tableCourrier', 'supprimer_courrier', "courrier", 'Courrier supprimer avec succès')
            put_to_corbeille('tableUsers', 'statut_user', "user", "Statut de l'tilisateur changer avec succès")
            put_to_corbeille('tableContact', 'corbeille_contact', "contact", "Contact supprimer avec succès")

        });
    </script>
    </body>
</html>