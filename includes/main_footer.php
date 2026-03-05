<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>


  <!-- owl carousel script -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });

    $(document).ready(function(){
    $("#personal_form").addClass("d-none");
    $("#group_form").addClass("d-none");
    $("#parents_form").addClass("d-none");
    $("#school_college_form").addClass("d-none");
    $(".trip_usertype").change(function() {
    var type=$(this).val();
      if(type=='personal')
      {
        $(".type_record").val(type);
        $("#personal_form").addClass("d-block");
        $("#group_form").removeClass("d-block");
        $("#parents_form").removeClass("d-block");
        $("#school_college_form").removeClass("d-block");
      }
      if(type=='group')
      {
        $(".type_record").val(type);
        $("#group_form").addClass("d-block");
        $("#personal_form").removeClass("d-block");
        $("#parents_form").removeClass("d-block");
        $("#school_college_form").removeClass("d-block");
      }
      if(type=='parents')
      {
        $(".type_record").val(type);
        $("#parents_form").addClass("d-block");
        $("#personal_form").removeClass("d-block");
        $("#group_form").removeClass("d-block");
        $("#school_college_form").removeClass("d-block");
      }
      if(type=='school_college')
      {
        $(".type_record").val(type);
        $("#school_college_form").addClass("d-block");
        $("#personal_form").removeClass("d-block");
        $("#group_form").removeClass("d-block");
        $("#parents_form").removeClass("d-block");
      }
    });



    
$(".status").click(function(){
var ride_id=$(this).attr("data_id");
alert(ride_id);
if(this.cancel){

$.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {"status":1,ride_id:ride_id,"action":"status"},
    success: function(data) {
        alert('ride not Cancelled...!');
    }
});

}
else
{
    $.ajax({
    type: "POST",
    url: "common_ajax.php",
    data: {"status":0,ride_id:ride_id,"action":"status_not"},
    success: function(data) {
        alert('ride Cancelled...!');
    }
});
}
    });
});


  </script>
  <!-- end owl carousel script -->

</body>
