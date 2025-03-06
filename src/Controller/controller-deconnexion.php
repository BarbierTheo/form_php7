<?php include_once '../View/view-deconnexion.php' ?>

<?php
session_start();
unset($_SESSION);
session_destroy();
