<!-- Modal -->
<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="">
                        <input type="hidden" name="" id="idActualizar">

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre :</label>
                            <input type="text" class="form-control" name="" id="nombreActualizar" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Apellido Paterno : </label>
                            <input type="text" class="form-control" name="" id="apellidoPaternoActualizar" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Apellido Materno :</label>
                            <input type="text" class="form-control" name="" id="apellidoMaternoActualizar" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Telefono :</label>
                            <input type="text" class="form-control" name="" id="telefonoActualizar" aria-describedby="helpId" placeholder="">
                        </div>


                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        
                        <button type="button" class="btn btn-primary" onclick="actualizarUsuario()">Actualizar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var modelId = document.getElementById('modalActualizar');

    modelId.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>