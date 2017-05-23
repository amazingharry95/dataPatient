     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> EDIT PROFILE</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> <?php echo $profil->NAMAPATIENT; ?></h4>
                      <form class="form-horizontal style-form" method="post" id="editForm" action="<?php echo base_url().'index.php/cPasien/editPatient/'.$profil->IDPATIENT; ?> " enctype="multipart/form-data">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type of Patient</label>
                              <div class="col-sm-10">
                                    <select class="form-control" id="patientType" name="patientType">
                                      <option></option>
                                      <option <?php if($profil->JENISPATIENT == 1){echo("selected");}?> >RANDOM</option>
                                      <option <?php if($profil->JENISPATIENT == 2){echo("selected");}?> >FASTING</option>
                                    </select>
                                  <span class="help-block" id="bloodGlucose" style="display:none" data-target="#bloodGlucoseInput" data-toggle="modal" style="color: blue"><a target="_blank" style="text-decoration: none; cursor:pointer">Fasting Blood Glucose Level</a></span>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Diagnosis of the Patient</label>
                              <div class="col-sm-10">
                                    <select class="form-control" id="diagnosa" name="diagnosa">
                                      <option></option>
                                      <option style="background-color: #5CB85C; color: white" <?php if($profil->DIAGNOSAPATIENT == 1){echo("selected");}?> >HEALTHY</option>
                                      <option style="background-color: #F0AD4E; color: white" <?php if ($profil->DIAGNOSAPATIENT == 2){echo("selected");}?> >AMID</option>
                                      <option style="background-color: #D9534F; color: white" <?php if($profil->DIAGNOSAPATIENT == 3){echo("selected");}?> >CHRONIC</option>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name of Patient</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="patientName" name ="patientName" type="text" value="<?php echo $profil->NAMAPATIENT; ?>">
                              </div>
                          </div>
                          <div class="form-group" id="normalBGL">
                              <label class="col-sm-2 col-sm-2 control-label">Blood Glucose Level</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="number" id="bloodGlucose" name="bloodGlucose" min="1" max="400" value="<?php echo $profil->KADARGULA?>">
                              </div>
                          </div>
                          <div class="form-group" id="fileNapas">
                              <label class="col-sm-2 col-sm-2 control-label">Patient's Sensor Data</label>
                              <div class="col-sm-10">
                                  <p id="msg"><?php echo $profil->SENSORDATA; ?></p>
                                  <input type="file" name="patientSensor" id="patientSensor" class="form-control"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-6 col-sm-offset-3">
				                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="SAVE" style="background-color: green; color: white">
				              </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->