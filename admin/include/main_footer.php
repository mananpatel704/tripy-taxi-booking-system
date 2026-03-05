<!-- CORE PLUGINS-->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            // setTimeout(function () {
            //          $('.result_msg').hide();
            //      }, 5000);
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });

         
            $('.driver_approved').on('change',function() {
var driver_id=$(this).attr("data_id");
if(this.checked){

$.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {"approve":1,driver_id:driver_id ,"action":"driver_approve"},
    success: function(data) {
        alert('Driver Approved Successfully...!');
    }
});

}
else
{
    $.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {"approve":0,driver_id:driver_id ,"action":"driver_not_approve"},
    success: function(data) {
        alert('Driver Approvement Cancelled...!');
    }
});
}
});

//ride

$('.ride_approve').on('change',function() {
var ride_id=$(this).attr("data_id");
if(this.checked){

$.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {"ride_approve":1,ride_id:ride_id,"action":"ride_approve"},
    success: function(data) {
        alert('ride Approved Successfully...!');
    }
});

}
else
{
    $.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {"ride_approve":0,ride_id:ride_id,"action":"ride_not_approve"},
    success: function(data) {
        alert('ride Approvement Cancelled...!');
    }
});
}
});
$(".allocate_driver").change(function(){
  alert("The text has been changed.");
  alert($(this).find(":selected").val());
    alert("ride");
  alert($(this).find(":selected").attr("ride_id"));
  var ride_id=$(this).find(":selected").attr("ride_id");
  var driver_id=$(this).find(":selected").val();
  $.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {driver_id:driver_id,ride_id:ride_id,"action":"allocate_driver_ride"},
    success: function(data) {
        alert('ride Allocated Successfully...!');
    }
});
});

    });

    //status change

    $('.accepted').on('change',function() {
var driver_ride_id=$(this).attr("driver_ride_id");
var accepted_status=$(this).find(":selected").val();

$.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {accepted_status:accepted_status,driver_ride_id:driver_ride_id ,"action":"accepted_status"},
    success: function(data) {
        alert(''+accepted_status+' Successfully...!');
    }
});
});


$('.closed').on('change',function() {
var driver_ride_id=$(this).attr("driver_ride_id");
var closed_status=$(this).find(":selected").val();

$.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {closed_status:closed_status,driver_ride_id:driver_ride_id ,"action":"closed_status"},
    success: function(data) {
        alert(''+closed_status+' Successfully...!');
    }
});
});


// $('.status').on('click',function() {

//});
    </script>
</body>

</html>