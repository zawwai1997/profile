<?php
require_once 'core/init.php';
die("Temporarily Closed!");

if (isset($_SESSION['email'])) {
    $token = hash("sha256", time());
    $_SESSION['token'] = $token;

    $Hospitals = $user->get('Hospitals');
    $Suffers = $user->get('Suffer_Type');
    $Places = $user->get('Visited_Places');
    $Townships = $user->get('Townships');
    $From_Countries = $user->get('From_Country');

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>All Positive Patients(အတည်ပြုလူနာများအား ထည့်သွင်းခြင်း)</title>

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
        <style>
            .select2-container .select2-selection--single {
                height: 34px !important;
            }

            .select2-container--default .select2-selection--single {
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
                <?php include("includes/sidebar.php") ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="col-10">
            <h4>All Positive Patients</h4>
            <?php flash('success') ?>
            <form method="post" action="process/add_patient_process.php">
                <div class="form-row">

                    <!--                Patient Name-->
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="patient_name" class="form-control" id="name"
                               placeholder="Patient Name" required>
                    </div>

                    <!--                Hospital Name-->
                    <div class="form-group col-md-6">
                        <label for="name">Hospital</label>
                        <select class="browser-default custom-select select2" name="hospital_name" required>
                            <option disabled selected value> Select an option</option>
                            <?php foreach ($Hospitals as $hospital => $hos) { ?>
                                <option value="<?php echo $hos['id'] ?>"><?php echo $hos['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--                Suffer Type-->
                    <div class="form-group col-md-6">
                        <label for="name">Suffer Type</label>
                        <select class="browser-default custom-select" name="suffer_type" required>
                            <option disabled selected value>Select an option</option>
                            <option value="5">Die</option>
                            <option value="6">Recovered</option>
                            <option value="7">Lab Confirmed</option>

                        </select>
                    </div>

                    <!--Visited Places-->
                    <div class="form-group col-md-6" id="visited_places">


                    </div>


                    <div class="form-row col-md-12">
                        <!--For Age-->

                        <div class="form-group col-md-4">
                            <label for="age">Age</label>
                            <input type="number" name="patient_age" class="form-control" id="age"
                                   placeholder="Patient Age" required min="1" max="100">
                        </div>

                        <!--                    For Gender-->
                        <div class="form-group col-md-4" style="text-align: center">
                            <label></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>

                        <!--                    For From Country-->
                        <div class="form-group col-md-4">
                            <label for="from_country">From Country <small class="text-danger txt-sm">(*ခရီးသွား
                                    ရာဇ၀င်မရှိပါက None ကိုရွေးချယ်ပေးပါရန်)</small></label>
                            <select required class="browser-default custom-select select2" name="country_ids[]"
                                    multiple>
                                <?php foreach ($From_Countries as $countries => $country) { ?>
                                    <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>


                <input type="hidden" name="tok" value="<?php echo $token; ?>">
                <button type="submit" class="btn btn-primary" name="btnAddPatient">Add Patient</button>
            </form>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script>
        $('.select2').select2();
    </script>

    </body>

    </html>
    <?php
} else {
    session_destroy();
    header("location: error/404.php");
    exit();
}
?>