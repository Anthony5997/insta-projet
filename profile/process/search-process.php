<?php

require("../../partials/sql_connect.php");
require("../../Class/Autoload.php");
Autoloader::register();

$manager = new UserManager($bdd);
echo (json_encode($manager->getAllUser()));
