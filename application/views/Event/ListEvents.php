<!DOCTYPE html-->
<html>

<head>

        <!-- DATA TABLES -->
        <link href="<?php echo base_url()?>AdminLTE/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
        

    <style></style></head>
<body>
<div class="col-md-4">
  <div class="box box-warning collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Créer un événement</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <form role="form" method="POST" action = <?php echo base_url('Events/addEvent')?> >

            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="dateEvent" placeholder="aaaa-mm-jj">
                </div>
            </div>

            <div class="form-group">
                <select required class="form-control" name="idOccasionEvent" title="Occasion">
                    <option value="">Occasion</option>
                    <option value="1">Anniversaire</option>
                    <option value="2">Fiançaille</option>
                    <option value="3">Mariage</option>
                    <option value="4">Anniversaire de mariage</option>
                    <option value="5">Baptême</option>
                    <option value="6">Remise de diplôme</option>
                    <option value="7">Autre</option>
                </select>
            </div>

            <div class="form-group">
                
                <input type="text" class="form-control" name="personConcerned" placeholder="Personne concernée">
            </div>

            <div class="form-group">
                
                <input type="text" class="form-control" name="themeEvent" placeholder="Thème">
            </div>

            <div class="form-group">
                
                <input type="text" class="form-control" name="venueEvent" placeholder="Lieu">
            </div>

            

        
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                <input type="text" class="form-control" name="budgetMaxEvent" placeholder="Budget Maximum">
            </div>
       
            
        
        <div class="box-footer">
            <button type="reset" class="btn btn-secondary">Annuler</button>
            <button type="submit" class="btn btn-warning">Valider</button>
        </div>


        </form>
    </div><!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des événements</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->

            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                <thead><tr role="row">

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Date</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Occasion</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Personne concernée</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Thème</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Lieu</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nb d'invités</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Budget Max</th>
    
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <?php
                        // Data recovery
                        $line = '';
                        foreach ($ListEvents as $event) {
                            $idEvent = $event->idEvent;
                            $dateEvent = $event->dateEvent;
                            $idOccasionEvent = $event->idOccasion;
                            $personConcerned = $event->personConcerned;
                            $themeEvent = $event->themeEvent;
                            $venueEvent = $event->venueEvent;
                            $budgetMaxEvent = $event->budgetMaxEvent; 
                            
                            // for each loop iteration, a line contains all informations about one event
                            $line = '<tr>';
                            $line = $line . '<td>' . $dateEvent       . '</td>';

                            if ($idOccasionEvent==0){
                                $line = $line . '<td></td>';
                            } else {
                                foreach ($ListOccasions as $occasion){

                                    $idOccasion = $occasion->idOccasion;

                                    if ($idOccasionEvent==$idOccasion) {
                                        $nameOccasion = $occasion->nameOccasion;
                                        $line = $line . '<td><a  href="' . base_url('EventDashboard?idEvent='. $idEvent ) . '" >' . $nameOccasion . '</td>';
                                    }
                                }
                            }

                            $line = $line . '<td>' . $personConcerned . '</td>';
                            $line = $line . '<td>' . $themeEvent      . '</td>';
                            $line = $line . '<td>' . $venueEvent      . '</td>';

                            $number = 0;

                            foreach ($ListGuests as $guest){

                                if (($guest->idEvent)==$idEvent) {

                                    $number++;
                                }

                            }

                            if ($number==0){
                                $line = $line . '<td></td>';
                            } else {
                                $line = $line . '<td>' . $number . '</td>'; 
                            }

                            if ($budgetMaxEvent==0){
                                $line = $line . '<td></td>';
                            } else {
                                $line = $line . '<td>' . $budgetMaxEvent  . '</td>';
                            }
                            // Add a button to delete or edit an event
                            $line = $line . '<td class="row">';


                            $line = $line . '<span class="pull-right">

                                                <a class="btn" data-toggle="modal" data-target="#editEventModal_' . $idEvent .'" role="button"><i class="fa fa-edit"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#deleteEventModal_' . $idEvent .'" role="button"><i class="fa fa-trash-o"></i></a>

                                            </span>';


                            $line = $line . '</tr>';
                            
                            echo  $line;


                            $modalEditEvent ='
                            <div class="modal fade" id="editEventModal_' . $idEvent .'"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier événement</h5>
                                        </div>
                            
                                        <form method="POST" action="' . base_url("Events/editEvent?idEventToEdit=" . $idEvent) . '">
                                            
                                            <div class="modal-body">
                                              


                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="dateEventToEdit">Date : </label>
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <input type="text" value="' . $dateEvent . '" class="form-control" name="dateEventToEdit" placeholder="aaaa-mm-jj">
                                                    </div>

                                                    <label for="dateEventToEdit">Occasion : </label>
                                                    <select class="form-control" name="idOccasionToEdit">
                                                        <option></option>
                                                        <option value="1">Anniversaire</option>
                                                        <option value="2">Fiançaille</option>
                                                        <option value="3">Mariage</option>
                                                        <option value="4">Anniversaire de mariage</option>
                                                        <option value="5">Baptême</option>
                                                        <option value="6">Remise de diplôme</option>
                                                        <option value="7">Autre</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="themeEventToEdit">Thème : </label>
                                                    <input type="text" value="' . $themeEvent . '" class="form-control" name="themeEventToEdit" placeholder="Entrer le thème">

                                                     <label for="personConcernedToEdit">Personne concernée : </label>
                                                    <input type="text" value="' . $personConcerned . '" class="form-control" name="personConcernedToEdit" placeholder="Personne concernée">

                                                    <label for="budgetMaxEventToEdit">Budget max : </label>
                                                     <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                                                    <input type="text" value="' . $budgetMaxEvent . '" class="form-control" name="budgetMaxEventToEdit" placeholder="Budget Maximum">
                                                </div>

                                                </div>

                                            </div>
                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-warning">Sauvegarder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                            echo $modalEditEvent;

                             $modalDeleteEvent =
                            '<div class="modal fade" id="deleteEventModal_' . $idEvent .'" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title"><b>Attention !</b></h5>
                                       
                                          </div>
                                          
                                          <form method="POST" action="' . base_url("Events/deleteEvent") . '">
                                              <div class="modal-body">
                                                    <p>Etes-vous sûr de vouloir supprimer cet événement ?</p>
                                                    <input type="hidden" name="idEventToDelete" id="idEventToDelete" value="'. $idEvent .'">
                                              </div>
                                              <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-warning">Valider</button>               
                                              </div>
                                         </form>
                                        </div>
                                      </div>
                                    </div>';
           
                            echo ($modalDeleteEvent);    

                        }
                    ?>
                </tbody>
            </table>

            <div class="row">

                <div class="col-xs-6">
                    <ul class="pagination pagination-sm margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</tr></thead></table></div></div></div></div></div>

</body></html>