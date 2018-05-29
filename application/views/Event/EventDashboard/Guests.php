<div class="col-md-auto">
  <div class="box box-warning">
    <div class="box-header with-border">
      <i class="fa fa-group"></i> <h3 class="box-title">Invités</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
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
                            $line = $line . '</tr>';
                            $numberGuest++;
                            echo  $line;
                        }
                        ?>
                    </tbody></table>
                </div>     
        </div>
    </div>
</div>

