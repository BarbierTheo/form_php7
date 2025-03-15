<?php
include_once "../../config.php";
session_start();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['theme'])){
        $_SESSION['theme'][0] = $_POST['theme'];
    }
}


include_once "../View/view-editprofile.php";