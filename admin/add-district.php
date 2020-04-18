<?php
require_once 'core/init.php';


if(isset($_SESSION['email'])){
$token = hash("sha256", time());
$_SESSION['token'] = $token;

$States = $user->get('States');


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
            <?php include("includes/sidebar.php") ?>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <div class="col-10">
        <h4>Add District(ခရိုင်များ ပေါင်းထည့်ခြင်း)</h4>
        <?php flash('success') ?>
        <br>
        <br>
        <form method="post" action="process/add_process.php">
            <div class="form-row">

<!--                District Name-->
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="district_name" class="form-control" id="name" placeholder="District Name">
                </div>

<!--                //Hospital Name-->
                <div class="form-group col-md-6">
                    <label for="state_id">State(ပြည်နယ် / တိုင်းဒေသကြီး) </label>
                    <select class="browser-default custom-select" name="state_id">
                        <?php foreach ($States as $state=>$sta) { ?>
                        <option selected value="<?php echo $sta['id']?>"><?php echo $sta['name']?></option>
                        <?php } ?>
                    </select>
                </div>









            <input type="hidden" name="tok" value="<?php echo $token; ?>">
            <button type="submit" class="btn btn-primary" name="btnAddDistrict">Add District</button>
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
else{
    session_destroy();
    header("location: error/404.php");
    exit();
}
?>