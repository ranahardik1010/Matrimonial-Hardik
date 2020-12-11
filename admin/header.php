<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Wedding Admin</title>
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
<link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/custom.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#submitstate").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addstateprocess.php',
                data: $("#addstateform").serialize(),
                dataType: 'html',
                success: function(response){
                    
                    if(response=="success")
                    {
                        swal("Success","State inserted Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

        $("#submitcity").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addcityprocess.php',
                data: $("#addcity").serialize(),
                dataType: 'html',
                success: function(response){
                    
                    if(response=="success")
                    {
                        swal("Success","City inserted Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

        $("#submitrel").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addrelprocess.php',
                data: $("#addreligion").serialize(),
                dataType: 'html',
                success: function(response){
                    
                    if(response=="success")
                    {
                        swal("Success","Religion inserted Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });
   
        $("#submitocc").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addoccprocess.php',
                data: $("#addoccupation").serialize(),
                dataType: 'html',
                success: function(response){
                            
                    if(response=="success")
                    {
                        swal("Success","Occupation inserted Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

         $("#submitedu").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addeduprocess.php',
                data: $("#addeducation").serialize(),
                dataType: 'html',
                success: function(response){
                            
                    if(response=="success")
                    {
                        swal("Success","Education inserted Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

         $("#submitsecque").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addsecquepro.php',
                data: $("#addsecqueform").serialize(),
                dataType: 'html',
                success: function(response){
                            
                    if(response=="success")
                    {
                        swal("Success","Security Question inserted Successfully.","success");
                    }
                    else
                    {
                        swal("Oops",response,"error");
                    }
                }
            });
        });

    });
</script>
