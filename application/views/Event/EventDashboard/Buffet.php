<div class="col-md-auto">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class=""><a href="#tab_1" data-toggle="tab"> Autre</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab"> Dessert</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab"> Plat</a></li>
            <li class=""><a href="#tab_4" data-toggle="tab"> Entrée</a></li>
            <li class="active"><a href="#tab_5" data-toggle="tab"> Apéritif</a></li>
            
            <li class="pull-left header"><i class="fa fa-th"></i> Buffet</li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="tab_2">
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

                            if ($typeMeal == 'dessert') {


                                $nameMeal = $meal->nameMeal;
                                $descriptionMeal = $meal->descriptionMeal;
                                $priceMeal = $meal->price;
                                

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
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
            </div><!-- /.tab-pane -->   
        </div><!-- /.tab-content -->
    </div><!-- nav-tabs-custom -->
</div>