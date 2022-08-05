
<?php


require "../vendor/autoload.php";
require "../app/controllers/usuarioController.php";

use App\http\request;
use App\controllers\usuarioController;
use App\models\usuarioModel;


$r = new request();

$r->requestController();
