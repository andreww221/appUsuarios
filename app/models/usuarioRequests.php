<?php



namespace App\models;

use PDO;
use App\database\db;
use App\models\usuarioModel;


/**
 * Clase la cual representa la entidad usuarios y contiene los  metodos
 * para realizar peticiones a mi base de datos
 */


class usuarioRequests extends db
{

    private $connectionObject;


    public function __construct()
    {

        $object =  new db();
        $this->connectionObject = $object->connectDB();
    }


    /**
     * Me permite crear un registro dando como parametro un objeto de tipo  usuarioModel
     */

    function create($user)
    {

        $request = $this->connectionObject->prepare(
            "INSERT INTO users (nombre,apellidoPaterno,apellidoMaterno,telefono)
        VALUES (:nombre,:apellidoPaterno,:apellidoMaterno,
        :telefono)"
        );

        $request->execute([
            'nombre' => $user->getNombre(),
            'apellidoPaterno' => $user->getApellidoPaterno(),
            'apellidoMaterno' => $user->getApellidoMaterno(),
            'telefono' => $user->getTelefono()
        ]);
    }





    /**
     * Me retorna  un array con todos los registros de tipo usuarioModel
     */

    function getAll()
    {

        $request = $this->connectionObject->prepare('SELECT * FROM users');

        $request->execute();

        $users = $request->fetchAll();


        $usersArray = [];


        foreach ($users as $key => $value) {

            $user = new usuarioModel(
                $value['nombre'],
                $value['apellidoPaterno'],
                $value['apellidoMaterno'],
                $value['telefono'],
                $value['id']
            );

            array_push($usersArray, $user->returnObject());
        }


        return json_encode($usersArray);
    }



    /**
     * Me retorna  un  registro del tipo usuarioModel indicando un id
     */

    function get($id)
    {
        $request = $this->connectionObject->prepare("SELECT * FROM users WHERE id=:id");
        $request->execute(['id' => $id]);
        $response =  $request->fetch(PDO::FETCH_OBJ);

        $user = new usuarioModel(
            $response->nombre,
            $response->apellidoPaterno,
            $response->apellidoMaterno,
            $response->telefono,
            $response->id

        );

        return json_encode($user->returnObject());
    }


    /**
     * Me permite eliminar un usuario por el id
     */

    function delete($id)
    {

        $request = $this->connectionObject->prepare("DELETE FROM users WHERE id=:id ");

        $request->execute(['id' => $id]);
    }


    /**
     * Me permite actualizar un usuario pasando como parametro un nuevo
     * usuarioModel y el id del registro a actualizar
     */
    function update($id, $user)
    {

        $request = $this->connectionObject->prepare("UPDATE users SET   nombre=:nombre,apellidoPaterno=:apellidoPaterno,apellidoMaterno=:apellidoMaterno,telefono=:telefono 
        WHERE id=:id");

        $request->execute([
            'id'=>$id,
            'nombre' => $user->getNombre(),
            'apellidoPaterno' => $user->getApellidoPaterno(),
            'apellidoMaterno' => $user->getApellidoMaterno(),
            'telefono' => $user->getTelefono()
      
        ]);

        return "usuario actualizado";
    }
}
