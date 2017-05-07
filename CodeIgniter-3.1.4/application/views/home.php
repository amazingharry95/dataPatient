      <section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover" id="myTable">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Patients Recorded Data</h4>
	                  	  	  <hr>
                              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class="fa fa-edit"></i> Diagnose</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                            <?php
                              foreach($records as $patient){
                              echo "<tr>";
                              echo "<td>";
                              echo "<a href='basic_table.html'>".$patient->IDPATIENT."</a>";
                              echo "</td>";
                              echo "<td>".$patient->NAMAPATIENT."</td>";
                              if ($patient->DIAGNOSAPATIENT == 1){
                                echo "<td><span class='label label-success label-mini'>HEALTHY</span></td>";
                              }
                              else if ($patient->DIAGNOSAPATIENT == 2){
                                echo "<td><span class='label label-warning label-mini'>AMID</span></td>";
                              }
                              else if ($patient->DIAGNOSAPATIENT == 3){
                                echo "<td><span class='label label-danger label-mini'>CHRONIC</span></td>";
                              }
                              echo "<td>";
                              echo "<button class='btn btn-success btn-xs' data-target='#myProfile' data-toggle='modal'><i class='glyphicon glyphicon-eye-open'></i></button>";
                              echo "<button class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></button>";
                              echo "<button class='btn btn-danger btn-xs' data-target='#myModal' data-toggle='modal'><i class='fa fa-trash-o '></i></button>";
                              echo "</td>";
                              echo "</tr>";
                              }
                            ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div>
          </section>
      </section>
      
      <div id="myProfile" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">RH003</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>Hariyanto</td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>Random</td>
                                        </tr>
                                        <tr>
                                            <td>Diagnosis:</td>
                                            <td>HEALTHY</td>
                                        </tr>
                                        <tr>
                                            <td>Blood Glucose Level:</td>
                                            <td>180</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="btn btn-primary">Full Profile</a>
                            
                        </div>
                    </div>
                   <div class="panel-footer">
                       <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                       <span class="pull-right">
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                       </span>
                   </div>
               </div>
            </div>
        </div>
      </div>
      
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: red; text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Delete</h4>
                </div>
                <div class="modal-body">
                    <p>You are about to delete.</p>
                    <p>Do you want to procedd?</p>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-danger" id="confirm">Delete</button>
                </div>
            </div>
        </div>
      </div>