     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Form Components</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> NEW PATIENT</h4>
                      <form class="form-horizontal style-form" method="get">
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date of Today</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo date('d/m/Y'); ?>" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type of Patient</label>
                              <div class="col-sm-10">
                                    <select class="form-control" id="patientType">
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
                                    <select class="form-control">
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
                                  <input class="form-control" id="patientName" type="text">
                              </div>
                          </div>
                          <div class="form-group" id="normalBGL">
                              <label class="col-sm-2 col-sm-2 control-label">Blood Glucose Level</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="number" id="bloodGlucose" min="1" max="200">
                              </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
          	<!-- INPUT MESSAGES -->
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Patient's Sensors Data</h4>
                        <div class="form-group">  
                            <div style="border: 1px solid #a1a1a1; text-align: center; width: 500px;padding: 30px; margin: 0px auto">
                                <form action="" id="upload_file" enctype="multipart/form-data" class="form-horizontal-progress" method="post">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" value="" />
                                    
                                    <input type="file" name="userfile" id="userfile" class="form-control" />
                                    <button class="btn btn-primary upload-image" type="submit" id="submit">Upload File</button>
                                </form>
                                <div id="files"></div>
                            </div>
                        </div>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->