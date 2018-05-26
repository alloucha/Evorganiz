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
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <tbody><tr>
                        <th>n°</th>
                        <th>Date</th>
                        <th>Occasion</th>
                        <th>Personne concernée</th>
                        <th>Thème</th>
                        <th>Lieu</th>
                        <th>Nb d'invités</th>
                        <th>Budget Max</th>
                    </tr>
                    
                    <!--
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                    </tr>
                    -->

            <?php
            
                // Data recovery
                $line = '';
                foreach ($ListEvents as $event) {
                    $idEvent = $event->idEvent;
                    $dateEvent = $event->dateEvent;
                    $occasionEvent = $event->occasionEvent;
                    $personConcerned = $event->personConcerned;
                    $themeEvent = $event->themeEvent;
                    $venueEvent = $event->venueEvent;
                    $budgetMaxEvent = $event->budgetMaxEvent;           
                    
                    // for each loop iteration, a line contains all informations about one event
                    $ligne = '<tr>';
                    //$ligne = $ligne . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '" >' . $nomEditeur . '</a></td>';
                    
                    //$ligne = $ligne . '<td><a  href="contact">' . $nomContact . '</a></td>';
                    $ligne = $ligne . '<td>' . $idEvent . '</td>';
                    $ligne = $ligne . '<td>' . $dateEvent . '</td>';
                    $ligne = $ligne . '<td>' . $occasionEvent . '</td>';
                    $ligne = $ligne . '<td>' . $personConcerned . '</td>';
                    $ligne = $ligne . '<td>' . $themeEvent . '</td>';
                    $ligne = $ligne . '<td>' . $venueEvent . '</td>';
                    $ligne = $ligne . '<td>' . $budgetMaxEvent . '</td>';
                    $ligne = $ligne . '<td>' . $budgetMaxEvent . '</td>';

                    // Add a button to delete or edit an event
    //                    $ligne = $ligne . '<td class="row">';

                    ////////to do buttton 

                    $ligne = $ligne . '</tr>';
                    
                    echo  $ligne;
                    
                }
                    


                ?>

                

                </tbody></table>

                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>