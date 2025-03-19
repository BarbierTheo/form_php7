<?php
session_start();
include_once '../../config.php';
include_once '../Model/model-likes.php';

var_dump($_GET);


Likes::alreadyLiked($_GET['']);