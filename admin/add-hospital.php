<?php
require_once 'core/init.php';


if (isset($_SESSION['email'])) {
    $token = hash("sha256", time());
    $_SESSION['token'] = $token;

    $townshipData = array();
    $Hospitals = $user->get('Hospitals');

    $Townships = $user->get('Townships');
    $hospitalData = array();
    foreach ($Hospitals as $hospital => $hos) {
        array_push($hospitalData, $hos['name']);
    };

    foreach ($Townships as $township => $towns) {
        array_push($townshipData, $towns['name']);
    }


    $Suffers = $user->get('Suffer_Type');
    $Places = $user->get('Visited_Places');
    $Townships = $user->get('Townships');
    $From_Countries = $user->get('From_Country');

    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Add Hospitals(ဆေးရုံများ ထည့်သွင်းခြင်း)</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/rabbit.js"></script>
        <script src="js/autocomplete.js"></script>
        <link rel="stylesheet" href="css/autocomplete.css">
        <link rel="stylesheet" href='http://mmwebfonts.comquas.com/fonts/?font=notosan'/>
        <link rel="stylesheet" href='http://mmwebfonts.comquas.com/fonts/?font=zawgyi'/>
        <script type="text/javascript">
            function clearText() {
                document.getElementById("unicode").value = "";
                document.getElementById("zawgyi").value = ""
            }

        </script>

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
        <div class="col-10">
            <h4>Add Hospital</h4>
            <?php flash('success') ?>
            <form method="post" action="process/add_hospital_process.php">
                <div class="form-row">


                    <!--                Hospital Name-->
                    <div class="form-group col-md-6">
                        <label for="hospital_name">Name</label>
                        <input type="text" name="hospital_name" class="form-control mdb-autocomplete" id="hospital_name"
                               placeholder="Hospital Name" required>
                    </div>
                    <!--                Township Type-->
                    <div class="form-group col-md-6">
                        <label for="name">Township</label>
                        <select class="browser-default custom-select select2" name="hospital_township" required>
                            <?php foreach ($Townships as $township => $town) {

                                ?>
                                <option
                                        value="<?php echo $town['id'] ?>"><?php echo $town['real_name'] ?></option>
                            <?php } ?>


                        </select>
                    </div>

                    <!--                Hospital Name with Unicode-->
                    <div class="form-group col-md-6">
                        <label for="unicode">unicode</label>
                        <input type="text" name="hospital_unicode" class="form-control" id="unicode"
                               placeholder="မြန်မာလို" onfocus="handleOnFocus(this)" onblur="handleOnBlur()" required>
                    </div>
                    <!--                Hospital Name with Zawgyi-->
                    <div class="form-group col-md-6">
                        <label for="zawgyi">zawgyi</label>
                        <input type="text" name="hospital_zawgyi" class="form-control" id="zawgyi"
                               placeholder="ျမန္မာလို" onfocus="handleOnFocus(this)" onblur="handleOnBlur()" required>
                    </div>
                    <div class="form-row col-md-12">
                        <!--For Latitude-->

                        <div class="form-group col-md-6">
                            <label for="latitude">Latitude</label>
                            <input type="number" name="latitude" class="form-control" id="latitude"
                                   placeholder="19.xxxxx" step="0.0000000000001" required>
                        </div>
                        <!--For Longitude-->
                        <div class="form-group col-md-6">
                            <label for="longitude">Longitude</label>
                            <input type="number" name="longitude" class="form-control" id="longitude"
                                   placeholder="93.xxxxx" step="0.0000000000001" required>
                        </div>

                    </div>
                    <div class="form-row col-md-12">
                        <!--For PUI-->
                        <div class="form-group col-md-3">
                            <label for="pui">PUI(စောင့်ကြည့်)</label>
                            <input type="number" name="pui" class="form-control" id="pui" value="0" required>
                        </div>

                        <!--For suspected-->
                        <div class="form-group col-md-3">
                            <label for="suspected">Suspected(သံသယ)</label>
                            <input type="number" name="suspected" class="form-control" id="suspected" value="0"
                                   required>
                        </div>

                        <!--For confirmed-->
<!--                        <div class="form-group col-md-2">-->
<!--                            <label for="lab_confirmed">Confirmed(အတည်ပြု)</label>-->
<!--                            <input type="number" name="lab_confirmed" class="form-control" id="lab_confirmed"-->
<!--                                   value="0" required>-->
<!--                        </div>-->

                        <!--For negative-->
                        <div class="form-group col-md-3">
                            <label for="lab_negative">Negative(မတွေ့)</label>
                            <input type="number" name="lab_negative" class="form-control" id="lab_negative"
                                   value="0" required>
                        </div>

                        <!--For pending-->
                        <div class="form-group col-md-3">
                            <label for="lab_pending">Pending(စောင့်ဆိုင်းဆဲ)</label>
                            <input type="number" name="lab_pending" class="form-control" id="lab_pending"
                                   value="0" required>
                        </div>

                    </div>
                </div>


                <input type="hidden" name="tok" value="<?php echo $token; ?>">
                <button type="submit" class="btn btn-primary" name="btnAddHospital">Add Hospital</button>
            </form>
        </div>
    </div>


    <script>


        var textFieldInFocus;

        function handleOnFocus(form_element) {
            textFieldInFocus = form_element;
        }

        function handleOnBlur() {
            textFieldInFocus = null;
        }

        var unicode = document.getElementById("unicode");
        var zawgyi = document.getElementById("zawgyi");

        onchangeHandler(unicode, zawgyi, "uni2zg");
        onchangeHandler(zawgyi, unicode, "zg2uni");

        function converter(textField, tochangeField, toconv) {
            if (tochangeField != textFieldInFocus) {
                if (toconv == "uni2zg") {
                    tochangeField.value = Rabbit.uni2zg(textField.value);
                } else {
                    tochangeField.value = Rabbit.zg2uni(textField.value);
                }
            }
        }

        function onchangeHandler(textField, tochangeField, toconv) {

            if (textField.addEventListener) {
                textField.addEventListener('input', function () {
                    converter(textField, tochangeField, toconv);
                }, false);
            } else if (textField.attachEvent) {
                textField.attachEvent('onpropertychange', function () {
                    // IE
                    converter(textField, tochangeField, toconv);
                });
            }

        }

        function copyZawgyi() {
            /* Get the text field */
            var copyText = document.getElementById("zawgyi");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");
        }

        function copyUnicode() {
            /* Get the text field */
            var copyText = document.getElementById("unicode");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");
        }


    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script>
        $('.select2').select2();
    </script>
    <script>

        $(function () {
            $("#township_input").autocomplete({
                source: <?php echo json_encode($townshipData);  ?>
            });
        });
    </script>
    <script>

    </script>
    <script>
        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("hospital_name"), <?php  echo json_encode($hospitalData) ?>);
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