<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once(dirname(__DIR__)."/app/core/sessionManager.php");
startSession();
require_once(dirname(__DIR__)."/app/core/router.php");

// var_dump($_SESSION["utilisateurConnecte"]);
