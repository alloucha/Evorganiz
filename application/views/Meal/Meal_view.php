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

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 212px;">Nom</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Type</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Description</th>

                </tr></thead>
    
                
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <?php
                        // Data recovery
                        $line = '';
                        foreach ($ListMeals as $meal) {
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

                            // Add a button to delete or edit an event
                            // $line = $line . '<td class="row">';

                            ////////to do buttton 

                            $line = $line . '</tr>';
                            
                            echo  $line;
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