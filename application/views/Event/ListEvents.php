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

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 212px;">n°</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Date</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Occasion</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Personne concernée</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Thème</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Lieu</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nb d'invités</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Budget Max</th>

                </tr></thead>
    
                
                <tbody role="alert" aria-live="polite" aria-relevant="all">

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
                            // $ligne = $ligne . '<td class="row">';

                            ////////to do buttton 

                            $ligne = $ligne . '</tr>';
                            
                            echo  $ligne;
                            
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