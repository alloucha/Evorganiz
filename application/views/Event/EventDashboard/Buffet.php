<div class="col-md-auto">
  <div class="box box-primary">
    <div class="box-header with-border">
      <i class="fa fa-cutlery"></i> <h3 class="box-title">Buffet</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class=""><a href="#tab_1-1" data-toggle="tab">Autre</a></li>
            <li class=""><a href="#tab_2-2" data-toggle="tab">Boisson</a></li>
            <li class=""><a href="#tab_3-3" data-toggle="tab">Dessert</a></li>
            <li class=""><a href="#tab_4-4" data-toggle="tab">Plat</a></li>
            <li class=""><a href="#tab_5-5" data-toggle="tab">Entrée</a></li>
            <li class="active"><a href="#tab_6-6" data-toggle="tab">Apéritif</a></li>  
        </ul>
        
        <div class="tab-content">
        
            <div class="tab-pane" id="tab_1-1">
                <div class="box-body no-padding">
                   
                    <table class="table table-striped">
                        <tbody><tr>
                            <th style="width: 10px"></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 40px">Prix</th>
                        </tr>
                      
                         <?php
                        // Data recovery
                        $line = '';
                        $numberMeal = 1;
                        foreach ($buffet as $meal) {
                            
                            $typeMeal = $meal->typeMeal;

                            if ($typeMeal == 'Autre') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->pricePerPersonn;
                                

                                // for each loop iteration, a line contains all informations about one meal
                                $line = '<tr>';
                                
                                //$line = $line . '<td><a  href="EventDashboard">' . $idEvent . '</td>';
                                //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                        
                                $line = $line  . '<td>' . $numberMeal . '. </td>';
                                $line = $line . '<td>' . $nameMeal . '</td>';
                                $line = $line . '<td>' . $descriptionMeal . '</td>';
                                $line = $line . '<td>' . $priceMeal . '</td>';

                                // Add a button to delete or edit an event
                                // $line = $line . '<td class="row">';

                                ////////to do buttton 

                                $line = $line . '</tr>';
                                $numberMeal++;
                                echo  $line;
                            }    
                        }
                        ?>
                    </tbody></table>
                </div>     
            </div><!-- /.tab-pane -->


            <div class="tab-pane" id="tab_2-2">
                <div class="box-body no-padding">
                   
                    <table class="table table-striped">
                        <tbody><tr>
                            <th style="width: 10px"></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 40px">Prix</th>
                        </tr>
                      
                         <?php
                        // Data recovery
                        $line = '';
                        $numberMeal = 1;
                        foreach ($buffet as $meal) {
                            
                            $typeMeal = $meal->typeMeal;

                            if ($typeMeal == 'Boisson') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->pricePerPersonn;
                                

                                // for each loop iteration, a line contains all informations about one meal
                                $line = '<tr>';
                                
                                //$line = $line . '<td><a  href="EventDashboard">' . $idEvent . '</td>';
                                //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                        
                                $line = $line  . '<td>' . $numberMeal . '. </td>';
                                $line = $line . '<td>' . $nameMeal . '</td>';
                                $line = $line . '<td>' . $descriptionMeal . '</td>';
                                $line = $line . '<td>' . $priceMeal . '</td>';

                                // Add a button to delete or edit an event
                                // $line = $line . '<td class="row">';

                                ////////to do buttton 

                                $line = $line . '</tr>';
                                $numberMeal++;
                                echo  $line;
                            }    
                        }
                        ?>
                    </tbody></table>
                </div>     
            </div><!-- /.tab-pane -->
                

            <div class="tab-pane" id="tab_3-3">
                <div class="box-body no-padding">
                   
                    <table class="table table-striped">
                        <tbody><tr>
                            <th style="width: 10px"></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 40px">Prix</th>
                        </tr>
                      
                         <?php
                        // Data recovery
                        $line = '';
                        $numberMeal = 1;
                        foreach ($buffet as $meal) {
                            
                            $typeMeal = $meal->typeMeal;

                            if ($typeMeal == 'Dessert') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->pricePerPersonn;
                                

                                // for each loop iteration, a line contains all informations about one meal
                                $line = '<tr>';
                                
                                //$line = $line . '<td><a  href="EventDashboard">' . $idEvent . '</td>';
                                //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                        
                                $line = $line  . '<td>' . $numberMeal . '. </td>';
                                $line = $line . '<td>' . $nameMeal . '</td>';
                                $line = $line . '<td>' . $descriptionMeal . '</td>';
                                $line = $line . '<td>' . $priceMeal . '</td>';

                                // Add a button to delete or edit an event
                                // $line = $line . '<td class="row">';

                                ////////to do buttton 

                                $line = $line . '</tr>';
                                $numberMeal++;
                                echo  $line;
                            }    
                        }
                        ?>
                    </tbody></table>
                </div>     
            </div><!-- /.tab-pane -->
                

            <div class="tab-pane" id="tab_4-4">
                <div class="box-body no-padding">
                   
                    <table class="table table-striped">
                        <tbody><tr>
                            <th style="width: 10px"></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 40px">Prix</th>
                        </tr>
                      
                         <?php
                        // Data recovery
                        $line = '';
                        $numberMeal = 1;
                        foreach ($buffet as $meal) {
                            
                            $typeMeal = $meal->typeMeal;

                            if ($typeMeal == 'Plat') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->pricePerPersonn;
                                

                                // for each loop iteration, a line contains all informations about one meal
                                $line = '<tr>';
                                
                                //$line = $line . '<td><a  href="EventDashboard">' . $idEvent . '</td>';
                                //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                        
                                $line = $line  . '<td>' . $numberMeal . '. </td>';
                                $line = $line . '<td>' . $nameMeal . '</td>';
                                $line = $line . '<td>' . $descriptionMeal . '</td>';
                                $line = $line . '<td>' . $priceMeal . '</td>';

                                // Add a button to delete or edit an event
                                // $line = $line . '<td class="row">';

                                ////////to do buttton 

                                $line = $line . '</tr>';
                                $numberMeal++;
                                echo  $line;
                            }    
                        }
                        ?>
                    </tbody></table>
                </div>     
            </div><!-- /.tab-pane -->


            <div class="tab-pane" id="tab_5-5">
                <div class="box-body no-padding">
                   
                    <table class="table table-striped">
                        <tbody><tr>
                            <th style="width: 10px"></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 40px">Prix</th>
                        </tr>
                      
                         <?php
                        // Data recovery
                        $line = '';
                        $numberMeal = 1;
                        foreach ($buffet as $meal) {
                            
                            $typeMeal = $meal->typeMeal;

                            if ($typeMeal == 'Entrée') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->pricePerPersonn;
                                

                                // for each loop iteration, a line contains all informations about one meal
                                $line = '<tr>';
                                
                                //$line = $line . '<td><a  href="EventDashboard">' . $idEvent . '</td>';
                                //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                        
                                $line = $line  . '<td>' . $numberMeal . '. </td>';
                                $line = $line . '<td>' . $nameMeal . '</td>';
                                $line = $line . '<td>' . $descriptionMeal . '</td>';
                                $line = $line . '<td>' . $priceMeal . '</td>';

                                // Add a button to delete or edit an event
                                // $line = $line . '<td class="row">';

                                ////////to do buttton 

                                $line = $line . '</tr>';
                                $numberMeal++;
                                echo  $line;
                            }    
                        }
                        ?>
                    </tbody></table>
                </div>     
            </div><!-- /.tab-pane -->

            <div class="tab-pane active" id="tab_6-6">
                <div class="box-body no-padding">
                   
                    <table class="table table-striped">
                        <tbody><tr>
                            <th style="width: 10px"></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 40px">Prix</th>
                        </tr>
                      
                         <?php
                        // Data recovery
                        $line = '';
                        $numberMeal = 1;
                        foreach ($buffet as $meal) {
                            
                            $typeMeal = $meal->typeMeal;

                            if ($typeMeal == 'Apéritif') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->pricePerPersonn;
                                

                                // for each loop iteration, a line contains all informations about one meal
                                $line = '<tr>';
                                
                                //$line = $line . '<td><a  href="EventDashboard">' . $idEvent . '</td>';
                                //$line = $line . '<td><a  href="' . site_url('ficheEditeur?idFicheEditeur='. $idEditeur ) . '">' . $idEvent . '</td>';
                        
                                $line = $line  . '<td>' . $numberMeal . '. </td>';
                                $line = $line . '<td>' . $nameMeal . '</td>';
                                $line = $line . '<td>' . $descriptionMeal . '</td>';
                                $line = $line . '<td>' . $priceMeal . '</td>';

                                // Add a button to delete or edit an event
                                // $line = $line . '<td class="row">';

                                ////////to do buttton 

                                $line = $line . '</tr>';
                                $numberMeal++;
                                echo  $line;
                            }    
                        }
                        ?>
                    </tbody></table>
                </div>     
            </div><!-- /.tab-pane -->

        </div>
    </div><!-- nav-tabs-custom -->
</div>
    
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

