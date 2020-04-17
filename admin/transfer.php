<?php
require_once 'core/init.php';
if(isset($_GET['token']) ==  $_SESSION['token'] and isset($_GET['id'])){
    $transCase = $user->getTransferPatients($_GET['id']);
    $query = "SELECT id,name FROM Hospitals";
    $allHospitals = $user->getData($query);
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

        <title>Transfer Patients</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <style>
            .select2-container .select2-selection--single{
                height:34px !important;
            }
            .select2-container--default .select2-selection--single{
                border: 1px solid #ccc !important;
                border-radius: 0px !important;
            }
        </style>

    </head>

    <body>

    <div class="d-flex container pt-4" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right col-2" id="sidebar-wrapper">

            <div class="list-group list-group-flush">

                <!--                <a href="add-patient.php" class="list-group-item list-group-item-action bg-light">Add Positive Patient(လူနာ)</a>-->
                <a href="#" class="list-group-item list-group-item-action bg-light">Add Hospital(ဆေးရုံ)</a>
                <a href="all-hospitals.php" class="list-group-item list-group-item-action bg-light">Show All Hospitals</a>
                <a href="all-positive-patient.php" class="list-group-item list-group-item-action bg-light">Show Positive Patients</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="col-10">
            <h4>Transfer Paitents(လူနာများ ဆေးရုံ တစ်ခုမှ အခြားဆေးရုံတစ်ခုသို့ ကူးပြောင်းခြင်း)</h4>
            <br>
            <h2 class="text-danger"><?php echo $transCase[0]['name'] ?></h2>

            <br>
            <form method="post" action="process/transfer_update.php">
                <div class="form-row">



                    <!--                //From Hospital Name-->
                    <div class="form-group col-md-6">
                        <label for="state_id">From</label>
                        <select class="browser-default custom-select" name="first_hospital_id">

                                <option selected value="<?php echo $transCase[0]['first_hospital_id']?>"><?php echo $transCase[0]['first_hospital']?></option>
                                <?php foreach ($allHospitals as $hospital => $hos){
?>
                                    <option value="<?php echo $hos['id']?>"><?php echo $hos['name']?></option>
<?php
                                } ?>
                        </select>
                    </div>

                    <!--                //To Hospital Name-->
                    <div class="form-group col-md-6">
                        <label for="state_id">To</label>
                        <select class="browser-default custom-select" name="current_hospital_id">

                            <option selected value="<?php echo $transCase[0]['current_hospital_id']?>"><?php echo $transCase[0]['current_hospital']?></option>
                            <?php foreach ($allHospitals as $hospital => $hos){
                                ?>
                                <option value="<?php echo $hos['id']?>"><?php echo $hos['name']?></option>
                                <?php
                            } ?>
                        </select>
                    </div>



                    <input type="hidden" name="tok" value="<?php echo $token; ?>">
                    <input type="hidden" name="patient_id" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-primary" name="btnTransfer">Update</button>
            </form>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <script>
        $('.select2').select2();
    </script>

    </body>

    </html>
<?php
}
else {
    session_destroy();
    header("location: ../error/404.php");
    exit();
}