
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/arrow.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- Sweet Altert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var id1=null,id2=null;
        var eid=0,aid=0;
        var status="";
        
        $("select#statename").change(function(){
            var select_id=$("#statename option:selected").val();
            var qstr='id='+select_id;

            $.ajax({
                type: "POST",
                url: "city.php",
                data: qstr,
                dataType: "html",
                
                success:function(response){
                    $("#cityname").html(response);
                }
            });
        });

        /*$("#submiteprofile").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'editprofilepro.php',
                data: $("#editprofileform").serialize(),
                dataType: 'html',
                success: function(response){
                    
                    if(response=="success")
                    {
                        swal("Success","Profile Updated Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });*/

        $("#submitfb").click(function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'addfeedback.php',
                data: $("#feedbackform").serialize(),
                dataType: 'html',
                success: function(response){
                    if(response=="success")
                    {
                        swal("Success","Feedback Received Successfully.","success");
                        $("#feedbackform").modal('hide');
                    }
                    else
                    {
                        swal("Oops","Please Enter Message.","error");
                    }
                }
            });
        });

        $("#contactinq").click(function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'contact_inq.php',
                data: $("#contactinqform").serialize(),
                dataType: 'html',
                success: function(response){
                    if(response=="success")
                    {
                        swal("Success","Your request Received Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

        $("#submitnews").click(function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'addmaillist.php',
                data: $("#newsletter").serialize(),
                dataType: 'html',
                success: function(response){
                    if(response=="success")
                    {
                        swal("Success","Email Registered Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

        $("#submitcmp").click(function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'addcomplain.php',
                data: $("#complainform").serialize(),
                dataType: 'html',
                success: function(response){
                   
                    if(response=="success")
                    {
                        swal("Success","Complaint Registered Successfully.","success");
                        $("#complain").modal('hide');
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

        $("#submitpw").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'changepassword.php',
                data: $("#changepwform").serialize(),
                dataType: 'html',
                success: function(response){
                    if(response=="success")
                    {
                        swal("Success","Password Changed Successfully.","success");
                        $("#changepw").modal('hide');
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

       /* $("#submitmsg").click(function(e){
            //var id=$().val();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'sendmessage.php',
                data: $("#msgform").serialize(),
                dataType: 'html',
                success: function(response){
                    if(response=="success")
                    {
                        //swal("Success","Password Changed Successfully.","success");
                        $("#message").modal('hide');
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });
*/
        $("select#Religion").change(function(){
            var select_id=$("#Religion option:selected").val();
            eid=$("#Education option:selected").val();
            aid=$("#Age option:selected").val();
            id1=select_id;
          
            if(eid==0 && aid== 0)
            {        
                status="R";
            }
            else if (eid==0)
            {
                status="RA";
            }
            else if (aid==0)
            {
                status="RE";  
            }    
            else
            {
                status="RES";
            }            
                
            $.ajax({
                type: "POST",
                url: "searchprofilepro.php",
                data: 'id1=' + id1 + '&id2=' + eid + '&id3=' + aid + '&s=' + status ,
                dataType: "html",
                success:function(response){
                    $("#user1").html(response);
                }
            });
        });

        $("select#Education").change(function(){
            var select_id=$("#Education option:selected").val();
            rid=$("#Religion option:selected").val();
            aid=$("#Age option:selected").val();
            eid=select_id;

            if(rid==0 && aid==0)
            {
                status="E";
            }
            else if (rid==0)
            {
                status="EA";
            }
            else if (aid==0)
            {
                status="RE";
            }
            else
            {
                status="RES";
            }
           
            id2=select_id;

            var qstr='id2='+select_id;

            $.ajax({
                type: "POST",
                url: "searchprofilepro.php",
                data: 'id1=' + id1 + '&id2='+id2+ '&id3='+aid+'&s='+status ,
                dataType: "html",
                success:function(response){
                    $("#user1").html(response);
                }
            });
        });

         $("select#Age").change(function(){
            var select_id=$("#Age option:selected").val();
            rid=$("#Religion option:selected").val();
            eid=$("#Education option:selected").val();
            
            if(rid==0 && eid==0)
            {
                status="A";
            }
            else if (rid==0)
            {
                status="EA";
            }
            else if (eid==0)
            {
                status="RA";
            }
            else
            {
                status="RES";
            }
           
            id3=select_id;

            var qstr='id3='+select_id;

            $.ajax({
                type: "POST",
                url: "searchprofilepro.php",
                data: 'id1=' + id1 + '&id2='+id2+ '&id3='+id3+'&s='+status ,
                dataType: "html",
                success:function(response){
                    $("#user1").html(response);
                }
            });
        });
    });
</script>
