<?php
require_once 'core/init.php';


if (isset($_SESSION['email'])) {
    $token = hash("sha256", time());
    $_SESSION['token'] = $token;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>All Positive Patients(လူနာများအား ပြန်လည်စစ်ဆေးခြင်း)</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




        <!--        For Hospitals showing-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" href="css/pagination.css">
        <!--        For Hospitals showing-->




    </head>

    <body>

    <div class="d-flex container pt-4" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right col-2" id="sidebar-wrapper">

            <div class="list-group list-group-flush">

                <a href="add-patient.php" class="list-group-item list-group-item-action bg-light">Add Patient(လူနာ)</a>
                <a href="add-hospital.php" class="list-group-item list-group-item-action bg-light">Add Hospital(ဆေးရုံ)</a>
                <a href="all-hospitals.php" class="list-group-item list-group-item-action bg-light">Show All Hospitals</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Show Positive Patients</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="col-10">
            <h4>All Positive Patients(လူနာများအား ပြန်လည်စစ်ဆေးခြင်း)</h4>
            <div class="table-responsive">
                <br />

                <br />
                <div id="alert_message"></div>
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Suffer Type</th>
                        <th>Hospital</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>




    </body>

    </html>

    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){

            fetch_data();

            function fetch_data()
            {
                var dataTable = $('#user_data').DataTable({
                    "processing" : true,
                    "serverSide" : true,
                    "order" : [],
                    "ajax" : {
                        url:"process/get_patient_data.php",
                        type:"POST"
                    }
                });
            }


            function update_data(patient_id, key, value)
            {
                $.ajax({
                    url:"process/update_patient_data.php",
                    method:"POST",
                    data:{patient_id:patient_id, key:key, value:value},
                    success:function(data)
                    {
                        $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function(){
                    $('#alert_message').html('');
                }, 6000);
            }


            $(document).on('blur', '.update', function(){
                var patient_id = $(this).data("id");
                var key = $(this).data("column");

                var value = $(this).text();

                update_data(patient_id, key, value);
            });
            $(document).on('click', '.delete', function(){
                var patient_id = $(this).attr("id");

                if(confirm("Are you sure you want to remove this?"))
                {
                    $.ajax({
                        url:"process/delete_patient_data.php",
                        method:"POST",
                        data:{patient_id:patient_id},
                        success:function(data){
                            $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                            $('#user_data').DataTable().destroy();
                            fetch_data();
                        }
                    });
                    setInterval(function(){
                        $('#alert_message').html('');
                    }, 5000);
                }
            });


        });
    </script>
    <?php
} else {
    session_destroy();
    header("location: error/404.php");
    exit();
}
?>