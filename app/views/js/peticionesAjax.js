//PINTAMOS LOS DATOS EN NUESTRA PABLA
printUsers();

//FUNCION LA CUAL CREA UN OBJETO JSON CON LOS DATOS DEL FORMULARIO Y LOS VALIDA

function crearObjetoUsuario() {
  let $error;

  let $usuario = {
    nombre: document.getElementById("nombreCreate").value,
    apellidoPaterno: document.getElementById("apellidoPaternoCreate").value,
    apellidoMaterno: document.getElementById("apellidoMaternoCreate").value,
    telefono: document.getElementById("telefonoCreate").value,
  };

  for (var i in $usuario) {
    if ($usuario[i] == "" || $usuario[i] == " ") {
      $error = true;
    }
  }

  if ($error == true) {
    return false;
  } else {
    return $usuario;
  }
}

//FUNCION LA CUAL REALIZA UNA PETICION AJAX PARA OBTENER TODOS LOS USUARIOS Y
//PINTARLOS EN LA TABLA
function printUsers() {
  const $table = document.getElementById("tablebody");
  $table.innerHTML = "";

  const request = fetch(
    "http://localhost/CrudUsuarios/usuarioController/getUsers"
  )
    .then((response) => response.json())
    .then((data) => {
      data.forEach((user) => {
        var $elemento = `

    
    <td>${user.id}</td>
    <td>${user.nombre}</td>
    <td>${user.apellidoPaterno}</td>
    <td>${user.apellidoMaterno}</td>
    <td>${user.telefono}</td>
    <td>
        <span style="cursor:pointer"  data-bs-toggle="modal" data-bs-target="#modalActualizar"    onclick="buscarUsuario(${user.id})"    >
            <svg style="width:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z" />
            </svg>
        </span>
    </td>
    <td>
        <span  style="cursor:pointer"   onclick="eliminarUsuario(${user.id})"          >
            <svg style="width:15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z" />
            </svg>
        </span>
    </td>
    
    
  `;

        var $registro = document.createElement("tr");
        $registro.innerHTML = $elemento;

        $table.appendChild($registro);
      });
    });
}

//FUNCION LA CUAL REALIZA UNA PEITICON AJAX PARA OBTENER UN USUARIO
function buscarUsuario(id) {
  fetch("http://localhost/CrudUsuarios/usuarioController/getUser", {
    method: "POST",
    body: JSON.stringify({ id }),
  })
    .then((response) => response.json())
    .then(function (response) {
      document.getElementById("nombreActualizar").value = response.nombre;
      document.getElementById("apellidoPaternoActualizar").value =
        response.apellidoPaterno;
      document.getElementById("apellidoMaternoActualizar").value =
        response.apellidoMaterno;
      document.getElementById("telefonoActualizar").value = response.telefono;
      document.getElementById("idActualizar").value = response.id;
    });
}

//FUNCION LA CUAL REALIZA UNA PEITICON AJAX PARA CREAR UN USUARIO
function crearUsuario() {
  $usuario = crearObjetoUsuario();

  if ($usuario != false) {
    fetch("http://localhost/CrudUsuarios/usuarioController/createUser", {
      method: "POST",
      body: JSON.stringify($usuario),
    })
      .then(function () {
        printUsers();
        $nombre = document.getElementById("nombreCreate").value = "";
        $apellidoPaterno = document.getElementById(
          "apellidoPaternoCreate"
        ).value = "";
        $apellidoMatenro = document.getElementById(
          "apellidoMaternoCreate"
        ).value = "";
        $telefono = document.getElementById("telefonoCreate").value = "";

        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Usuario creado con exito.",
          showConfirmButton: false,
          timer: 1500,
        });
      })
      .catch(function () {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Nop",
        });
      });
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ningun campo puede estar vacío",
    });
  }
}

//FUNCION LA CUAL REALIZA UNA PETICION AJAX PARA ACTUALIZAR UN USUARIO
function actualizarUsuario() {
  let $error;
  let $usuario = {
    nombre: document.getElementById("nombreActualizar").value,
    apellidoPaterno: document.getElementById("apellidoPaternoActualizar").value,
    apellidoMaterno: document.getElementById("apellidoMaternoActualizar").value,
    telefono: document.getElementById("telefonoActualizar").value,
    id: document.getElementById("idActualizar").value,
  };

  for (var i in $usuario) {
    if ($usuario[i] == "" || $usuario[i] == " ") {
      $error = true;
    }
  }

  if ($error == true) {
    $error = false;
  } else {
    $error = $usuario;
  }

  if ($usuario != false) {
    fetch("http://localhost/CrudUsuarios/usuarioController/updateUser", {
      method: "PUT",
      body: JSON.stringify($usuario),
    })
      .then(function () {
        printUsers();
        $nombre = document.getElementById("nombreCreate").value = "";
        $apellidoPaterno = document.getElementById(
          "apellidoPaternoCreate"
        ).value = "";
        $apellidoMatenro = document.getElementById(
          "apellidoMaternoCreate"
        ).value = "";
        $telefono = document.getElementById("telefonoCreate").value = "";
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Usuario Actualizado con exito.",
          showConfirmButton: false,
          timer: 1500,
        });
      })
      .catch(function () {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Nop",
        });
      });
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ningun campo puede estar vacío",
    });
  }
}

//fFUNCION LA CUAL REALIZA UNA PEITICION AJAX DE ELIMINAR UN USUARIO
function eliminarUsuario(id) {
  Swal.fire({
    title: "Estas seguro en eliminar este usuario?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("http://localhost/CrudUsuarios/usuarioController/deleteUser", {
        method: "DELETE",
        body: JSON.stringify({ id }),
      }).then(function () {
        printUsers();
        Swal.fire("Deleted!", "Your file has been deleted.", "success");
      });
    }
  });
}
