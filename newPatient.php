<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS 
    <link href="assets/css/bootstrap.css" rel="stylesheet">-->
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">


    
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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script> 
        $(document).ready(function() { 

         var progressbar     = $('.progress-bar');

            $(".upload-image").click(function(){
            	$(".form-horizontal-progress").ajaxForm(
		{
		  target: '.preview',
		  beforeSend: function() {
			$(".progress").css("display","block");
			progressbar.width('0%');
			progressbar.text('0%');
                    },
		    uploadProgress: function (event, position, total, percentComplete) {
		        progressbar.width(percentComplete + '%');
		        progressbar.text(percentComplete + '%');
		     },
		})
		.submit();
            });

        }); 
    </script>
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
                                <form action="uploadpro.php" enctype="multipart/form-data" class="form-horizontal-progress" method="post">
                                    <div class="preview"></div>
                                    <div class="progress" style="display:none">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                           0%
                                        </div>
                                    </div>
                                    
                                    <input type="file" name="image" class="form-control" />
                                    <button class="btn btn-primary upload-image">Upload File</button>
                                </form>
                            </div>
                        </div>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
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
