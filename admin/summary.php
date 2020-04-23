<?php
require_once 'core/init.php';


if (isset($_SESSION['email'])) {
    $token = hash("sha256", time());
    $_SESSION['token'] = $token;


    $Summary = $user->get('Summary');



    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Show Summary(အကျဥ်းချုပ် အချက်အလက်များ)</title>
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


    </head>
    <body>
    <div class="d-flex container pt-4" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right col-2" id="sidebar-wrapper">

            <div class="list-group list-group-flush">
                <?php include("includes/sidebar.php") ?>
            </div>
        </div>
        <div class="col-10">
            <h4>Show Summary(အကျဥ်းချုပ် အချက်အလက်များ)</h4><br><br>
            <?php flash('success') ?>
            <form method="post" action="process/update_summary.php">
                <div class="form-row">


                    <div class="form-row col-md-12">
                        <!--For Confirmed-->
                        <div class="form-group col-md-4">
                            <label for="confirm">Confirmed(စစ်တေးတွေ့ရှိ)</label>
                            <input type="number" name="confirm" class="form-control" id="confirm" required value="<?php echo $Summary[0]['confirm'] ?>">
                        </div>

                        <!--For PUI-->
                        <div class="form-group col-md-4">
                            <label for="pui">PUI စောင့်ကြည့် (သံသယ)</label>
                            <input type="number" name="pui" class="form-control" id="pui" required value="<?php echo $Summary[0]['pui'] ?>">
                        </div>

                        <!--For Die-->
                        <div class="form-group col-md-4">
                            <label for="die">Die(သေဆုံး)</label>
                            <input type="number" name="die" class="form-control" id="die"  required value="<?php echo $Summary[0]['die'] ?>">
                        </div>
                        <div class="form-group col-md-12"></div>

                        <!--For Test-->
                        <div class="form-group col-md-4">
                            <label for="test">Test(စစ်ဆေးပြီး လူနာ)</label>
                            <input type="number" name="test" class="form-control" id="test" required value="<?php echo $Summary[0]['test'] ?>">
                        </div>

                        <!--For Cure-->
                        <div class="form-group col-md-4">
                            <label for="cure">Cure (လက်ရှိကုသမှု ခံယူဆဲ)</label>
                            <input type="number" name="cure" class="form-control" id="cure" required value="<?php echo $Summary[0]['cure'] ?>">
                        </div>

                        <!--For Recovered-->
                        <div class="form-group col-md-4">
                            <label for="recovered">Recovered (ပြန်လည် ကောင်းမွန်)</label>
                            <input type="number" name="recovered" class="form-control" id="recovered" required value="<?php echo $Summary[0]['recovered'] ?>">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="recovered">Status (ဖော်ပြမည့် စာသား)</label>
                            <textarea name="status" id="" class="form-control" cols="30" rows="2"><?php echo $Summary[0]['status'] ?></textarea>
                        </div>

                    </div>
                </div>


                <input type="hidden" name="tok" value="<?php echo $token; ?>">
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
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