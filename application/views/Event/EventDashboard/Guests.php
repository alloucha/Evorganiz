<div class="col-md-auto">
  <div class="box box-warning">
    <div class="box-header with-border">
      <i class="fa fa-group"></i> <h3 class="box-title">Invités</h3>

      <div class="box-tools pull-right">
      <a class="btn" data-toggle="modal" data-target="#editContactModal_' . $idContact .'" role="button"><i class="fa fa-plus"></i> Ajouter</a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>

      
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      
        <div class="tab-content">
            
            <div class="box-body no-padding">
               
                <table class="table table-striped">
                    <tbody><tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Accepte invitation</th>
                    </tr>
                  
                    <?php
                    // Data recovery
                    $line = '';
                    $numberGuest = 1;
                    
                    foreach ($guests as $guest) {

                        $idContact = $guest->idContact;
                        $firstname = $guest->firstnameContact;
                        $lastname = $guest->lastnameContact;
                        $acceptInvitation = $guest->acceptInvitation;

                        // for each loop iteration, a line contains all informations about one meal
                        $line = '<tr>';

                        $line = $line  . '<td>' . $numberGuest . '. </td>';
                        $line = $line . '<td>' . $firstname . '</td>';
                        $line = $line . '<td>' . $lastname . '</td>';

                        if ($acceptInvitation=='oui') {

                            $line = $line . '<td>' . '<small class="label label-success"><i class="fa fa-check"></i></small>' . '</td>';

                        } else {
                            $line = $line . '<td>';
                        }
                     
                         $line = $line . '<span class="pull-right">
                    
                                                <a class="btn" data-toggle="modal" data-target="#editContactModal_' . $idContact .'" role="button"><i class="fa fa-edit"></i> </a>

                                                <a class="btn" data-toggle="modal" data-target="#editContactModal_' . $idContact .'" role="button"><i class="fa fa-trash-o"></i></a>

                                            
                                            </span> </td>';


                        $line = $line . '</tr>';

                        $numberGuest++;
                        echo  $line;


                        $modalEditContact ='
                    <div class="modal fade" id="editContactModal_' . $idContact .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter éditeur</h5>
                                </div>
                    
                                <form method="POST" action="' . site_url("Editeur/modifierEditeur?idEditeur=" . $idContact) . '">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nomEditeur">Nom de l éditeur</label>
                                            <input type="text" value="' . $firstname . '" class="form-control" id="nomEditeur" name="nomEditeur" placeholder="Entrer le nom">
                                        </div>
                                    </div>
                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-secondary">Sauvegarder</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
                    echo $modalEditContact;

                    }
                    ?>
                </tbody></table>
            </div>     
        </div>
    </div>
</div>