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

        <title>All Hospitals(ဆေးရုံများအား ပြန်လည်စစ်ဆေးခြင်း)</title>

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

<!--                <a href="add-patient.php" class="list-group-item list-group-item-action bg-light">Add Positive Patient(လူနာ)</a>-->
                <a href="add-hospital.php" class="list-group-item list-group-item-action bg-light">Add Hospital(ဆေးရုံ)</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Show All Hospitals</a>
                <a href="all-positive-patient.php" class="list-group-item list-group-item-action bg-light">Show Positive Patients</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="col-10">
            <h4>All Hospitals(ဆေးရုံများအား ပြန်လည်စစ်ဆေးခြင်း)</h4>
            <div class="table-responsive">
                <br />

                <br />
                <div id="alert_message"></div>
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Hospital</th>
                        <th>PUI</th>
                        <th>Suspected</th>
                        <th>Negative</th>
                        <th>Pending</th>
                        <th>Die</th>
                        <th>Recovered</th>
                        <th>Confirmed</th>
                        <th>State</th>
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
                        url:"process/get_hospital_data.php",
                        type:"POST"
                    }
                });
            }


            function update_data(hospital_id, suffer_type_id, value)
            {
                $.ajax({
                    url:"process/update_hospital_data.php",
                    method:"POST",
                    data:{hospital_id:hospital_id, suffer_type_id:suffer_type_id, value:value},
                    success:function(data)
                    {
                        $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function(){
                    $('#alert_message').html('');
                }, 5000);
            }


            $(document).on('blur', '.update', function(){
                var hospital_id = $(this).data("id");
                var suffer_type_id = $(this).data("column");

                var value = $(this).text();

                update_data(hospital_id, suffer_type_id, value);
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