<div class="col-md-4">
  <div class="box box-warning collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Ajouter 

      <?php if($typeMeal=='All') { echo 'un repas' ;} else {echo $typeMeal;} ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <form role="form" method="POST" action = <?php echo site_url('Meal/addMeal')?> >
            
            <?php 

                if ($typeMeal=='All') {

                    echo 
                    '<div class="form-group">
                        <select required class="form-control" name="typeMeal">
                            <option value="">Type de repas</option>
                            <option value="Apéritif">Apéritif</option>
                            <option value="Entrée">Entrée</option>
                            <option value="Plat">Plat</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Boisson">Boisson</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>';
                } else {

                    echo
                    '<div class="form-group">
                        <input type="text" class="form-control" name="typeMeal" value="'. $typeMeal .'" readonly>

                    </div>';

                }

            ?>
            

            <div class="form-group">
                <label>Nom : </label>
                <input type="text" class="form-control" name="nameMeal" placeholder="Entrer ...">
            </div>

            <div class="form-group">
                <label>Description : </label>
                
                <textarea class="form-control" rows="3" name="descriptionMeal" placeholder="Enter ..."></textarea>
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

            <?php 
                if ($typeMeal=='All') {
                    $typeMeal = 'repa';
                }

            ?>

                <h3 class="box-title">Liste des <?php echo $typeMeal . 's'?></h3>
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
                    </div>
                </div>

            </div>

            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                <thead><tr role="row">

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 212px;">Nom</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Type</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Description</th>

                    <th></th>

                </tr></thead>
    
                
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <?php
                        // Data recovery
                        $line = '';
                        foreach ($ListMeals as $meal) {
                            $idMeal = $meal->idMeal;
                            $nameMeal = $meal->nameMeal;
                            $typeMeal = $meal->typeMeal;
                            $descriptionMeal = $meal->descriptionMeal;
                            
                            
                            // for each loop iteration, a line contains all informations about one event
                            $line = '<tr>';
                            //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '" >' . $nomEditeur . '</a></td>';
                            
                            //$line = $line . '<td><a  href="contact">' . $nomContact . '</a></td>';
                            $line = $line . '<td>' . $nameMeal . '</td>';
                            //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                    
                            $line = $line . '<td>' . $typeMeal . '</td>';
                            $line = $line . '<td>' . $descriptionMeal . '</td>';

                            // Add a button to delete or edit a meal
                            $line = $line . '<td class="row">';

                            $line = $line . '<span class="pull-right">

                                                <a class="btn" data-toggle="modal" data-target="#editMealModal_' . $idMeal .'" role="button"><i class="fa fa-edit"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#deleteMealModal_' . $idMeal .'" role="button"><i class="fa fa-trash-o"></i></a>
                                                
                                            </span>';

                            $line = $line . '</tr>';
                            
                            echo  $line;

                            $modalEditMeal ='
                            <div class="modal fade" id="editMealModal_' . $idMeal .'"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier repas</h5>
                                        </div>
                            
                                        <form method="POST" action="' . site_url("Meal/editMeal?idMealToEdit=" . $idMeal . '&typeMealToEdit=' . $typeMeal) . '">
                                            
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label>Nom : </label>
                                                    <input type="text" value="' . $nameMeal . '" class="form-control" name="nameMealToEdit" placeholder="Entrer ...">
                                                
                                                    <label>Description : </label>
                                                    <textarea class="form-control" name="descriptionMealToEdit" placeholder="Entrer ...">' . $descriptionMeal . '</textarea>
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
                            echo $modalEditMeal;


                             $modalDeleteMeal =
                            '<div class="modal fade" id="deleteMealModal_' . $idMeal .'" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title"><b>Attention !</b></h5>
                                       
                                          </div>
                                          
                                          <form method="POST" action="' . site_url("Meal/deleteMeal") . '">
                                              <div class="modal-body">
                                                    <p>Etes-vous sûr de vouloir supprimer ce repas ?</p>
                                                    <input type="hidden" name="idMealToDelete" value="'. $idMeal .'">
                                              </div>
                                              <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-warning">Valider</button>               
                                              </div>
                                         </form>
                                        </div>
                                      </div>
                                    </div>';
           
                            echo ($modalDeleteMeal);   
                        }
                    ?>
                </tbody>
            </table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>