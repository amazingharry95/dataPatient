$(document).ready(function () {
    $('.delpatient').click(function(){
        $('#del').val($(this).data("id"));
        $('#myModal').modal('show');
    });
        
    $('#del').click(function(){
        $.post("<?php echo base_url()?>index.php/cPasien/deletePatient", {idpatient: $('#del').val()});
        window.location.href = "<?php echo base_url(); ?>index.php";
    });
});

function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}

function myFunction() {
              // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

              // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
            {
                tr[i].style.display = "";
            } 
            else 
            {
                tr[i].style.display = "none";
            }
        } 
    }
}

