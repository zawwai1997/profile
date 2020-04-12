<?php
require_once 'core/init.php';


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

        <title>Add Patients</title>

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
                <a href="add-district.php" class="list-group-item list-group-item-action bg-light">Add
                    District(ခရိုင်)</a>
                <a href="add-township.php" class="list-group-item list-group-item-action bg-light">Add
                    Township(မြို့နယ်)</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Add Patient(လူနာ)</a>
                <a href="add-hospital.php" class="list-group-item list-group-item-action bg-light">Add Hospital(ဆေးရုံ)</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="col-10">
            <h4>Add Patient</h4>
            <?php flash('success') ?>
            <form method="post" action="process/add_patient_process.php">
                <div class="form-row">

                    <!--                Patient Name-->
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="patient_name" class="form-control" id="name"
                               placeholder="Patient Name">
                    </div>

                    <!--                Hospital Name-->
                    <div class="form-group col-md-6">
                        <label for="name">Hospital</label>
                        <select class="browser-default custom-select select2" name="hospital_name">
                            <?php foreach ($Hospitals as $hospital => $hos) { ?>
                                <option selected value="<?php echo $hos['id'] ?>"><?php echo $hos['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--                Suffer Type-->
                    <div class="form-group col-md-6">
                        <label for="name">Suffer Type</label>
                        <select class="browser-default custom-select" name="suffer_type">
                            <?php foreach ($Suffers as $suffer => $sus) {
                                if ($sus['id'] != 9) {
                                    ?>
                                    <option selected onclick="removePlace()"
                                            value="<?php echo $sus['id'] ?>"><?php echo $sus['name'] ?></option>
                                <?php } else { ?>
                                    <!--                        <option onclick="addPlace()">Lab Confirmed</option>-->
                                    <option value="<?php echo $sus['id'] ?>">Lab Confirmed</option>
                                <?php }
                            }?>
                        </select>
                    </div>

                    <!--Visited Places-->
                    <div class="form-group col-md-6" id="visited_places">


                    </div>

                    <!--For Add One More Place-->
                    <div class="form-group col-md-6" id="addMorePlaceBtn">

                    </div>

                    <div class="form-row" id="one_row">
                        <div id="myhidden" value="1" type="hidden"></div>
                    </div>

                    <div class="form-row col-md-12">
                        <!--For Age-->

                        <div class="form-group col-md-4">
                            <label for="age">Age</label>
                            <input type="number" name="patient_age" class="form-control" id="age" placeholder="Patient Age">
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
                                <input class="form-check-input" type="radio" name="gender" id="female" value="0">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>

                        <!--                    For From Country-->
                        <div class="form-group col-md-4">
                            <label for="from_country">From Country</label>
                            <select class="browser-default custom-select select2" name="country_ids[]" multiple>
                                <?php foreach ($From_Countries as $countries => $country) { ?>
                                    <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>


                <input type="hidden" name="tok" value="<?php echo $token; ?>">
                <button type="submit" class="btn btn-primary" name="btnAddPatient">Add Repository</button>
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
        function addPlace() {
            var addPlace = "<label>Visited Places</label>\n" +
                "<select class=\"browser-default form-control select2\" name = \"visited_places\"multiple>\n" +
                "    <?php foreach ($Places as $place=>$plac) { ?>\n" +
                "    <option><?php echo $plac['name']?></option>\n" +
                "    <?php } ?>\n" +
                "\n" +
                "</select>";

            var addMorePlaceBtn = '<div class="btn btn-success" onclick="addOneMorePlace()">Add One More Places for Patient</div>';
            document.getElementById('visited_places').innerHTML = addPlace;
            $('.select2').select2();
            document.getElementById('addMorePlaceBtn').innerHTML = addMorePlaceBtn;

        }

        count = 0;

        function addOneMorePlace() {
            count += 1;
            hidden_val = count + 1;



            var one_row = "<div class=\"form-row\" id=\"my_row_" + count + "\">\n" +
                "   \n" +
                "    <div class=\"form-group col-md-3\">\n" +
                "        <input type=\"text\" placeholder=\"Place Name\" name=\"place_name_\">\n" +
                "    </div>\n" +
                "    <div class=\"form-group col-md-3\">\n" +
                "        <select class=\"browser-default form-control select2\" name=\"township_name_\">\n" +
                "            <?php foreach ($Townships as $township=>$town) { ?>\n" +
                "            <option><?php echo $town['name']?></option>\n" +
                "            <?php } ?>\n" +
                "    \n" +
                "        </select>\n" +
                "    </div>\n" +
                "    <div class=\"form-group col-md-3\">\n" +
                "        <input type=\"text\" placeholder=\"Latitude\" name=\"latitude_\">\n" +
                "    </div>\n" +
                "    <div class=\"form-group col-md-2\">\n" +
                "        <input type=\"text\" placeholder=\"Longitude\" name=\"longitude_\">\n" +
                "    </div>\n" +
                "    <div class=\"form-group col-md-1\">\n" +
                "      <div class=\"btn btn-danger\" onclick=\"deleteRow(" + count + ")\">Delete</div>\n" +
                "    </div>\n" +
                "   \n" +
                "</div>\n" +
                "<div id=\"myhidden\" value=\"" + hidden_val + "\" type=\"hidden\"></div>";

            var row = document.getElementById('one_row');

            row.innerHTML = row.innerHTML.replace('<div id="myhidden" value="' + count + '" type="hidden"></div>', one_row);

        }

        function deleteRow(c) {
            document.getElementById('my_row_' + c).innerHTML = '';
            var temp_row = document.getElementById('one_row');

            temp_row.innerHTML = temp_row.innerHTML.replace('<div class="form-row" id="my_row_' + c + '"></div>', '')

        }

        function removePlace() {
            document.getElementById('visited_places').innerHTML = '';
            document.getElementById('addMorePlaceBtn').innerHTML = '';
            document.getElementById('one_row').innerHTML = '';
        }
    </script>
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