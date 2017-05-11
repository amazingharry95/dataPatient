     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> PATIENT PROFILE</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i><?php echo $profil->IDPATIENT; ?></h4>
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
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->