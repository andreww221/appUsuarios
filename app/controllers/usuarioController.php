<?php



namespace App\controllers;

use App\models\usuarioRequests;

use App\models\usuarioModel;

class usuarioController extends usuarioRequests

{

  //RETORNA LA VISTA DE LA TABLA DE USUARIOS
  public function viewUsers()
  {
    require "../app/views/viewAllUsers.php";
  }


  //RETORNA LOS USUARIOS
  public function getUsers()
  {

    $request = new usuarioRequests();

    print_r($request->getAll());
  }


  //ME RETORNA UN USUARIO DADO UN ID
  public function getUser()
  {

    $requestBody = file_get_contents('php://input');
    $user = json_decode($requestBody);
    $request =  new usuarioRequests();
    print_r($request->get($user->id));
  }



  //CREA UN USUARIO DADO UN OBJETO DE TIPO  USUARIOMODEL
  public function createUser()
  {

    $error = false;
    $requestBody = file_get_contents('php://input');


    $user = json_decode($requestBody);
    $nombre = htmlentities($user->nombre);
    $apellidoPaterno  = htmlentities($user->apellidoPaterno);
    $apellidoMaterno = htmlentities($user->apellidoMaterno);
    $telefono = htmlentities($user->telefono);

    if (
      $nombre == "" or $nombre == " " or
      $apellidoPaterno == "" or $apellidoPaterno == " " or
      $apellidoMaterno == "" or  $apellidoMaterno == " " or
      $telefono == ""   or $telefono == " "
    ) {

      $error = true;
    }




    if (!$error) {
      $userModel = new usuarioModel(
        $nombre,
        $apellidoPaterno,
        $apellidoMaterno,
        $telefono

      );


      $request = new usuarioRequests();
      $request->create($userModel);
    } else {

      var_dump(http_response_code(400));
      echo ":)";
    }
  }


  //ACUTALIZA UN USUARIO DADO UN ID Y UN USUARIMODEL
  public function updateUser()
  {

    $error = false;
    $requestBody = file_get_contents('php://input');
    $user = json_decode($requestBody);


    $id = htmlentities($user->id);
    $nombre = htmlentities($user->nombre);
    $apellidoPaterno  = htmlentities($user->apellidoPaterno);
    $apellidoMaterno = htmlentities($user->apellidoMaterno);
    $telefono = htmlentities($user->telefono);

    if (
      $id == "" or $id == " " or
      $nombre == "" or $nombre == " " or
      $apellidoPaterno == "" or $apellidoPaterno == " " or
      $apellidoMaterno == "" or  $apellidoMaterno == " " or
      $telefono == ""   or $telefono == " "
    ) {

      $error = true;
    }




    if (!$error) {
      $userModel = new usuarioModel(
        $nombre,
        $apellidoPaterno,
        $apellidoMaterno,
        $telefono

      );
      $request = new usuarioRequests();
      $request->update($id, $userModel);

      var_dump($user);
    } else {

      var_dump(http_response_code(400));
      echo ":)";
    }
  }


  //ELIMINA UN USUARIO DADO UN ID
  public function deleteUser()
  {

    $error = false;;
    $requestBody = file_get_contents('php://input');
    $user = json_decode($requestBody);
    $id = $user->id;
    $request = new usuarioRequests();
    $request->delete($id);
  }
}
