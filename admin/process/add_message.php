<?php
require_once '../core/init.php';
if (    isset($_POST['btnSubmit']) && $_POST['token'] == $_SESSION['token']) {
$message = $_POST['msg_txt'];
$message = $user->checkInput($message);
$result =$user->create('Messages',array('text'=>$message));
if($result)
{
    $_SESSION['status'] = "အကြံပေးမှုအတွက် ကျေးဇူးတင်ပါသည်";
    header("location:../../about-corona-mm.php");
    exit();
}
else{
    $_SESSION['status'] = "အကြံပေးမှုအတွက် ကျေးဇူးတင်ပါသည်";
    header("location:../../about-corona-mm.php");
    exit();
}
}
else {
    session_destroy();
    header("location:../../about-corona-mm.php");
    exit();
}