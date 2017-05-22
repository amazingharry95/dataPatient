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
      
<div id="bloodGlucoseInput" class="modal fade" role="dialog">
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
                                            <td>BGL Before Fasting:</td>
                                            <td><input class="form-control" type="number" id="bloodGlucoseBefore" min="1" max="200"></td>
                                        </tr>
                                        <tr>
                                            <td>BGL After Eating:</td>
                                            <td><input class="form-control" type="number" id="bloodGlucoseBefore" min="1" max="200"></td>
                                        </tr>
                                    </tbody>
                                </table>
                     </div>
                    </div>
                   <div class="panel-footer">
                       <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></a>
                   </div>
               </div>
            </div>
        </div>
      </div>

    <!-- js placed at the end of the document so the pages load faster ASLI PUNYA ENTRY
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="assets/js/bootstrap-switch.js"></script>-->

    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.sparkline.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/common-scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/gritter/js/jquery.gritter.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/gritter-conf.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.tagsinput.js'); ?>"></script>
	<script rc="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>   
  <script>
    $(document).ready( function() {
        //var value = document.getElementById('patientType').value;
        $('#patientType').bind('change', function (e){
            if($('#patientType').val() == 'FASTING'){
                $('#bloodGlucose').show;
                $("#bloodGlucose").css({ display: "inline-block" });
                $('#normalBGL').hide;
                $("#normalBGL").css({ display: "none" });
                //alert($('#patientType').val());
            }
            else if($('#patientType').val() == 'RANDOM'){
                $('#bloodGlucose').hide;
                $("#bloodGlucose").css({ display: "none" });
                $('#normalBGL').show;
                $("#normalBGL").css({ display: "block" });
            }
        }).trigger('change');
    });    
  </script>

  </body>
</html>