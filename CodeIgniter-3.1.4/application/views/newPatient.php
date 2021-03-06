     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Form Components</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> NEW PATIENT</h4>
                      <form class="form-horizontal style-form" action="<?php echo base_url()?>index.php/cPasien/addPatient" method="get">
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date of Today</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo date('d/m/Y'); ?>" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type of Patient</label>
                              <div class="col-sm-10">
                                    <select class="form-control" id="patientType" name="patientType">
                                      <option></option>
                                      <option>RANDOM</option>
                                      <option>FASTING</option>
                                    </select>
                                  <span class="help-block" id="bloodGlucose" style="display:none" data-target="#bloodGlucoseInput" data-toggle="modal" style="color: blue"><a target="_blank" style="text-decoration: none; cursor:pointer">Fasting Blood Glucose Level</a></span>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Diagnosis of the Patient</label>
                              <div class="col-sm-10">
                                    <select class="form-control" id="diagnosa" name="diagnosa">
                                      <option></option>
                                      <option style="background-color: #5CB85C; color: white">HEALTHY</option>
                                      <option style="background-color: #F0AD4E; color: white">AMID</option>
                                      <option style="background-color: #D9534F; color: white">CHRONIC</option>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name of Patient</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="patientName" name ="patientName" type="text">
                              </div>
                          </div>
                          <div class="form-group" id="normalBGL">
                              <label class="col-sm-2 col-sm-2 control-label">Blood Glucose Level</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="number" id="bloodGlucose" name="bloodGlucose" min="1" max="400">
                              </div>
                          </div>
                          <div class="form-group" id="fileNapas">
                              <label class="col-sm-2 col-sm-2 control-label">Patient's Sensor Data</label>
                              <div class="col-sm-10">
                                  <p id="msg"></p>
                                  <input type="file" name="file" id="file" class="form-control" />
                                  <button class="btn btn-primary upload-image" type="submit" id="upload">Upload File</button>
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