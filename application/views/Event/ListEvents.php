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

        <form role="form" method="POST" action = <?php echo site_url('Events/addEvent')?> >

            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="dateEvent" placeholder="jj/mm/aaaa">
                </div>
            </div>

            <div class="form-group">
                <select class="form-control" title="Occasion">
                    <option selected>Occasion</option>
                    <option>Anniversaire</option>
                    <option>Fiançaille</option>
                    <option>Mariage</option>
                    <option>Anniversaire de mariage</option>
                    <option>Baptême</option>
                    <option>Remise de diplôme</option>
                    <option>Autre</option>
                </select>
            </div>

            <div class="form-group">
                
                <input type="text" class="form-control" name="themeEvent" placeholder="Thème">
            </div>

            <div class="form-group">
                
                <input type="text" class="form-control" name="personConcerned" placeholder="Personne concernée">
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


            <div class="box-body table-responsive">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length">
                        <label>
                        <select size="1" name="example1_length" aria-controls="example1">
                            <option value="10" selected="selected">10</option><option value="25">25</option>
                            <option value="50">50</option><option value="100">100</option>
                        </select> records per page</label>


                    </div>
                </div>

            </div>

            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                <thead><tr role="row">

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">n°</th>

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
                            $line = $line . '<td><a  href="' . site_url('EventDashboard?idEvent='. $idEvent ) . '" >' . $idEvent . '</a></td>';                  
                            $line = $line . '<td>' . $dateEvent       . '</td>';

                            //recover name occasion by id
                            foreach ($ListOccasions as $occasion){

                                $idOccasion = $occasion->idOccasion;

                                if ($idOccasionEvent==$idOccasion) {
                                    $nameOccasion = $occasion->nameOccasion;
                                    $line = $line . '<td>' . $nameOccasion . '</td>';
                                }
                            }
                            
                            $line = $line . '<td>' . $personConcerned . '</td>';
                            $line = $line . '<td>' . $themeEvent      . '</td>';
                            $line = $line . '<td>' . $venueEvent      . '</td>';
                            $line = $line . '<td>' . $budgetMaxEvent  . '</td>';
                            $line = $line . '<td>' . $budgetMaxEvent  . '</td>'; ////////// attention calculer nb invité !!!!!!!!

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
                            
                                        <form method="POST" action="' . site_url("Events/editEvent?idEventToEdit=" . $idEvent) . '">
                                            
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
                                                    <select class="form-control" title="Occasion">
                                                        <option>Anniversaire</option>
                                                        <option>Fiançaille</option>
                                                        <option>Mariage</option>
                                                        <option>Anniversaire de mariage</option>
                                                        <option>Baptême</option>
                                                        <option>Remise de diplôme</option>
                                                        <option>Autre</option>
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
                                          
                                          <form method="POST" action="' . site_url("Events/deleteEvent") . '">
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
                    <div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div>
                </div>

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