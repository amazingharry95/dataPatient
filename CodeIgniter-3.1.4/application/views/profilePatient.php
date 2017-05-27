     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> PATIENT PROFILE</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
              
            <?php
               if($profil->FOTOPATIENT == ''){
                    $potoPatient = 'noPhoto.jpg';
                }
                else if(explode('.',$profil->FOTOPATIENT)[1] == ''){
                    $potoPatient = 'noPhoto.jpg';
                }
                else{
                    $potoPatient = $profil->FOTOPATIENT;
                }
            ?>
          	<div class="row mt">
          		<div class="col-md-8">
                    <div class="well well-sm">
                        <div class="media">
                            <a class="thumbnail pull-left">
                                <img class="media-object" src="<?php echo base_url().'uploads/images/'.$potoPatient; ?>" width="200" height="40">
                            </a>
                            <div class="media-body">
                        <p><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $profil->TANGGALRECORD; ?>" disabled></p>
                        <h4 class="media-heading"><?php echo $profil->NAMAPATIENT; ?></h4>
                        <h3 class="media-heading">
                            <?php
                                $data = explode(',', $evaluation);
                                
                                if ($predictClass == 1){
                                    echo "<span class='label label-success'>HEALTHY / $data[1]</span>";
                                }
                                else if ($predictClass == 3){
                                    echo "<span class='label label-danger'>DIABET / $data[2]</span>";
                                }
                                /*echo "<br>";
                                echo "<p>Accuracy: $data[0]</p>";
                                echo "<p>Kappa: $data[5]</p>";*/
                            ?>
                        </h3>
                        
                        
                		<!--<p><span class="label label-info">PREDICTED</span> <span class="label label-warning">PRECISSION</span></p>-->
                        <p>
                                <?php
                                    if ($profil->JENISPATIENT == 1){
                                        echo "<span class='label label-info label-mini'>RANDOM</span>";
                                    }
                                    else if ($profil->JENISPATIENT == 2){
                                        echo "<span class='label label-warning label-mini'>FASTING</span>";
                                    }
                            
                                    if ($profil->DIAGNOSAPATIENT == 1){
                                        echo "<span class='label label-success label-mini'>HEALTHY</span>";
                                    }
                                    else if ($profil->DIAGNOSAPATIENT == 2){
                                        echo "<span class='label label-warning label-mini'>AMID</span>";
                                    }
                                    else if ($profil->DIAGNOSAPATIENT == 3){
                                        echo "<span class='label label-danger label-mini'>CHRONIC</span>";
                                    }
                                ?>
                            <a class="btn btn-xs btn-default"><span class="glyphicon glyphicon-heart"></span><?php echo $profil->KADARGULA; ?></a>
                        </p>
                    </div>
                        </div>
                    </div>
                    <!-- asli
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i><?php echo $profil->NAMAPATIENT; ?></h4>
                      <form class="form-horizontal style-form" action="<?php echo base_url()?>index.php/cPasien/addPatient" method="get">
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date of Data Recorded</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $profil->TANGGALRECORD; ?>" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type of Patient</label>
                              <div class="col-sm-10">
                                    <?php 
                                        $type = $profil->JENISPATIENT;
                                        if($type == 1){
                                            echo 'RANDOM';
                                        }
                                        else{
                                            echo 'FASTING';
                                        }
                                    ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Diagnosis of the Patient</label>
                              <div class="col-sm-10">
                                    <?php 
                                        $type = $profil->DIAGNOSAPATIENT;
                                        if($type == 1){
                                            echo 'HEALTHY';
                                        }
                                        else if($type == 2){
                                            echo 'AMID';
                                        }
                                        else{
                                            echo 'CHRONIC';
                                        }
                                    ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name of Patient</label>
                              <div class="col-sm-10">
                                  <?php echo $profil->NAMAPATIENT; ?>
                              </div>
                          </div>
                          <div class="form-group" id="normalBGL">
                              <label class="col-sm-2 col-sm-2 control-label">Blood Glucose Level</label>
                              <div class="col-sm-10">
                                  <?php echo $profil->KADARGULA?>
                              </div>
                          </div>
                      </form>
                  </div>-->
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
            
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div id="chart_div"></div>
                    </div>
                </div>
            </div>
              
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div id="chart_co2"></div>
                    </div>
                </div>
            </div>
              
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div id="chart_ketone"></div>
                    </div>
                </div>
            </div>
              
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div id="chart_humid"></div>
                    </div>
                </div>
            </div>
              
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div id="chart_voc"></div>
                    </div>
                </div>
            </div>
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->