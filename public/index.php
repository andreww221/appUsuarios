
<?php


require "../vendor/autoload.php";

use App\Models\usuarioRequests;
use App\Models\usuarioModel;




$a = new usuarioRequests();


$b = new usuarioModel(
    'actua',
    'actua',
    'actua',
    'actua'
);

$a->update(1,$b);