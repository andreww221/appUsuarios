<?php

require "template.php";
?>

<div class="container py-5">


    <div class="row">

        <div class="col-xs-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-start align-items-center gap-2">


                        <svg style="width:15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z" />
                        </svg>

                        <div style="text-align: left;">CRUD Usuarios</div>



                    </div>
                    </svg>

                </div>
                <div class="card-body">


                    <div class="d-flex justify-content-end">

                        <button data-bs-toggle="modal" data-bs-target="#modalInsetar" class="btn btn-primary my-3 " type="button" name="" id="">Crear Usuario</button>


                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Telefono</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>

                            <tbody id="tablebody">



                            </tbody>
                        </table>
                    </div>





                </div>


                <div class="card-header">
                    <div class="d-flex justify-content-center align-items-center gap-2">

                        <p class="text-left">Creado por Andrew Buitrago 2022</p>

                    </div>
                    </svg>

                </div>

            </div>




        </div>



    </div>


</div>



<?php require "modalInsert.php"; ?>

<?php require "modalActualizar.php"; ?>






<script   src=" http://localhost/CrudUsuarios/app/views/js/peticionesAjax.js" ></script>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>








</body>

</html>