<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

//Inclusing main configuration file.
require_once PROJECT_ROOT_PATH . "/inc/config.php";

//Including the base controller file.
require_once PROJECT_ROOT_PATH . "/Controller/API/BaseController.php";

//Inlcuding the user model file.
require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";
?>