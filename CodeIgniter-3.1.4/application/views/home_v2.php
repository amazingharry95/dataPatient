    <section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <br/>
                          <button type="button" data-toggle="modal" data-target="#patientModal" class="btn btn-info btn-lg">NEW GROUND-TRUTH</button>
                          <br /><br />
                          <table id="user_data" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th width="10%">Image</th>
                                  <th width="30%">Full Name</th>
                                  <th width="10%">Diagnose</th>
                                  <th width="10%">View</th>
                                  <th width="10%">Edit</th>
                                  <th width="10%">Delete</th>
                                </tr>
                              </thead>
                          </table>
                      </div>
                  </div>
              </div>
          </section>
      </section>
      
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
                     <button type="button" class="btn btn-danger" id="del" val="">Delete</button>
                </div>
            </div>
        </div>
      </div>

      <div id="patientModal" class="modal fade">
          <div class="modal-dialog">
              <form method="post" id="patientForm">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add New Ground-Truth</h4>
                      </div>
                      <div class="modal-body">
                          <label>Date of Today</label>
                          <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo date('d/m/Y'); ?>" disabled>
                          <br />
                          <label>Type of Patient</label>
                          <input class="form-control" id="disabledInput patientType" name="patientType" type="text" placeholder="RANDOM" disabled>
                          <br />
                          <label>Diagnosis</label>
                          <select class="form-control" id="diagnosa" name="diagnosa">
                                <option></option>
                                <option style="background-color: #5CB85C; color: white">HEALTHY</option>
                                <option style="background-color: #F0AD4E; color: white">AMID</option>
                                <option style="background-color: #D9534F; color: white">CHRONIC</option>
                          </select>
                          <br />
                          <label>Name of Patient</label>
                          <input type="text" name="patientName" id="patientName" class="form-control" />  
                          <br />
                          <label>Blood Glucose Level</label>
                          <input class="form-control" type="number" id="bloodGlucose" name="bloodGlucose" min="1" max="500">
                          <br />
                          <label>Photo of Patient</label>
                          <input type="file" name="patientImage" id="patientImage" />
                          <br />
                          <label>Patient's Sensor Data</label>
                          <input type="file" name="patientSensor" id="patientSensor" />
                      </div>
                      <div class="modal-footer">
                          <input type="submit" name="masuk" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                      </div>
                  </div>
              </form>
          </div>
      </div>

<script>
    $(document).ready(function () {
        var dataTable = $('#user_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax":{
                url: "<?php echo base_url('index.php/cPasien/getPatient2'); ?>",
                type: "POST"
            },
            "columnDefs":[
                {  
                    "targets": [0,3,4,5],
                    "orderable": false,
                },
            ],
        });
        
        $(document).on('submit', '#patientForm', function(event){
            event.preventDefault();
            var nama = $('#patientName').val();
            var diagnosa = $('#diagnosa').val();
            var tipe = $('#patientType').val();
            var bgl = $('#bloodGlucose').val();
            var imageExtension = $('#patientImage').val().split('.').pop().toLocaleLowerCase();
            var sensorExtension = $('#patientSensor').val().split('.').pop().toLocaleLowerCase();
            
            if(jQuery.inArray(sensorExtension, ['txt','csv']) == -1)
            {
                alert('Invalid File');
                $('#patientSensor').val('');
                
                return false;
            }
            if(nama != '' && bgl != '' && diagnosa != ''){
                $.ajax({
                   url: "<?php echo base_url('index.php/cPasien/addPatient2'); ?>",
                   method: 'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                   success:function(data)
                   {
                       alert(data);
                       $('#patientForm')[0].reset();
                       $('#patientModal').modal('hide');
                       dataTable.ajax.reload();
                   }
                });
            }
            else
            {
                alert('All Input Required!');
            }
        });
        
        $(document).on('click', '.delpatient', function(){
            $('#del').val($(this).data("id"));
            $('#myModal').modal('show'); 
        });
        
        /*
        $('.delpatient').click(function(){
            alert('hallo');
            $('#del').val($(this).data("id"));
            $('#myModal').modal('show');  
        });*/
        
        $('#del').click(function(){
            $.post("<?php echo base_url()?>index.php/cPasien/deletePatient", {idpatient: $('#del').val()});
            window.location.href = "<?php echo base_url(); ?>index.php";
        });
    });
</script>
