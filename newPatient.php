<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        #bar_blank{
            border: solid 1px #000;
            height: 20px;
            width: 300px;
        }
        
        #bar_color{
            background-color: #006666;
            height: 20px;
            width: 0px;
        }
        
        #bar_blank, #hidden_iframe{
            display: none;
        }
    </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>DATA PATIENT</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
            <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/admin.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">HARIYANTO</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="main.php">
                          <i class="fa fa-th"></i>
                          <span>Data Patient</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="newPatient.php" >
                          <i class="fa fa-plus"></i>
                          <span>New Data</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
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
                                    <select class="form-control">
                                      <option>RANDOM</option>
                                      <option>FASTING</option>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Diagnosis of the Patient</label>
                              <div class="col-sm-10">
                                    <select class="form-control">
                                      <option>HEALTHY</option>
                                      <option>AMID</option>
                                        <option>CHRONIC</option>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name of Patient</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="patientName" type="text">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Blood Glucose Level</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="number" id="bloodGlucose" min="1" max="200">
                              </div>
                          </div>
                          <!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="placeholder">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input type="password"  class="form-control" placeholder="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Static control</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">email@example.com</p>
                              </div>
                          </div>-->
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	<!-- INLINE FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>
                      <form class="form-inline" role="form">
                          <div class="form-group">
                              <label class="sr-only" for="exampleInputEmail2">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                              <label class="sr-only" for="exampleInputPassword2">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-theme">Sign in</button>
                      </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
          	<!-- INPUT MESSAGES -->
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Patient's Sensors Data</h4>
                        <div class="form-group">  
                          <form class="form-horizontal tasi-form" method="get">
                                  <div id="bar_blank">
                                        <div id="bar_color"></div>
                                  </div>
                              <div id="status"></div>
                                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm" enctype="multipart/form-data" target="hidden_iframe">
                                        <input type="hidden" value="myForm" name="<?php echo ini_get("session.upload_progress.name");?>">
                                        <input type="file" name="userfile"><br>
                                        <input type="submit" value="Start Upload">
                                  </form>
                                  <iframe id="hidden_iframe" name="hidden_iframe" src="about:blank"></iframe>
                          </form>
                        </div>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
          	<!-- INPUT MESSAGES -->
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Checkboxes, Radios & Selects</h4>
						<div class="checkbox">
						  <label>
						    <input type="checkbox" value="">
						    Option one is this and that&mdash;be sure to include why it's great
						  </label>
						</div>
						
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
						    Option one is this and that&mdash;be sure to include why it's great
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						    Option two can be something else and selecting it will deselect option one
						  </label>
						</div>
						
						<hr>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
						</label>
						
						<hr>
						<select class="form-control">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
						<br>
						<select multiple class="form-control">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>        		
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          		
          	<!-- CUSTOM TOGGLES -->
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Custom Toggles</h4>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" checked="" data-toggle="switch" />
                              </div>
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" data-toggle="switch" />
                              </div>
                          </div>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <div class="switch switch-square"
                                       data-on-label="<i class=' fa fa-check'></i>"
                                       data-off-label="<i class='fa fa-times'></i>">
                                      <input type="checkbox" />
                                  </div>
                              </div>
                              <div class="col-sm-6 text-center">
                                  <div class="switch switch-square"
                                       data-on-label="<i class=' fa fa-check'></i>"
                                       data-off-label="<i class='fa fa-times'></i>">
                                      <input type="checkbox" checked="" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" disabled data-toggle="switch" />
                              </div>
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" checked disabled data-toggle="switch" />
                              </div>
                          </div>
          			</div>
          		</div>
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="form_component.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
      
  <script type="text/javascript" src="javascript/script.js"></script>

  </body>
</html>
