<!-- Modal -->
<div class="modal fade" id="modalInsetar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <form action="">
                        <div class="mb-3">
                            <label for="nombreCreate" class="form-label">Nombre :</label>
                            <input autofocus type="text" class="form-control" name="nombre" id="nombreCreate" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="apellidoPaternoCreate" class="form-label">Apellido Paterno : </label>
                            <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaternoCreate" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="apellidoMaternoCreate" class="form-label">Apellido Materno :</label>
                            <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaternoCreate" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="telefonoCreate" class="form-label">Telefono :</label>
                            <input type="text" class="form-control" name="telefono" id="telefonoCreate" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="text-danger py-5" id="mensaje">

                        </div>



                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                        <button type="button" class="btn btn-primary" onclick="crearUsuario()">Crear Usuario</button>


                



                    </form>

                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script>
    var modelId = document.getElementById('modalInsetar');

    modelId.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>


