<head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url() ?>AdminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- font Awesome -->
        <link href="<?php echo base_url() ?>AdminLTE/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Ionicons -->
        <link href="<?php echo base_url() ?>AdminLTE/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <!-- Theme style -->
        <link href="<?php echo base_url() ?>AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>



<div class="col-md-6">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Créer un événement</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form role="form">
                <!-- text input -->
                <div class="form-group">
                    <label>Thème</label>
                    <input type="text" class="form-control" placeholder="Entrer ...">
                </div>

                <label>Date : <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservation">
                </div></label>


                <!-- textarea -->
                <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
           
                <!-- select -->
                <div class="form-group">
                    <label>Occasion</label>
                    <select class="form-control">
                        <option>Anniversaire</option>
                        <option>Fiançaille</option>
                        <option>Mariage</option>
                        <option>Baptême</option>
                        <option>Remise de diplôme</option>
                        <option>Autre</option>
                    </select>
                </div>
            
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>


            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
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
                            $line = '<tr>';
                            $line = $line . '<td><a  href="' . site_url('EventDashboard?idEvent='. $idEvent ) . '" >' . $idEvent . '</a></td>';                  
                            $line = $line . '<td>' . $dateEvent . '</td>';
                            $line = $line . '<td>' . $occasionEvent . '</td>';
                            $line = $line . '<td>' . $personConcerned . '</td>';
                            $line = $line . '<td>' . $themeEvent . '</td>';
                            $line = $line . '<td>' . $venueEvent . '</td>';
                            $line = $line . '<td>' . $budgetMaxEvent . '</td>';
                            $line = $line . '<td>' . $budgetMaxEvent . '</td>';

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

