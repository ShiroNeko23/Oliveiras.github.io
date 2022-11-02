<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ModalEdit">
                    <div class="container-fluid container-sm container p-5">
                        <div class="row">
                            <div class="card card-body mb5 col-md-3">
                                <label for="Mcbx1" class="form-label">Variedad del Producto: </label>
                                <select class="form-select" name="Mcbx1" id="Mcbx1">
                                    <option id="0" value="0">Selecione una Variedad</option>
                                    <?php
                                                include('../../Conection/bd.php');
                                                $consulta1='select * from variedad_producto;';
                                                $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                            ?>
                                    <?php foreach($ejecutar1 as $opciones): ?>
                                    <option id="<?php echo $opciones['id_variedad']?>"
                                        value="<?php echo $opciones['id_variedad']?>">
                                        <?php echo $opciones['nom_variedad']?></option>
                                    <?php endforeach ?>
                                </select>&nbsp;
                                <div class="mb-3">
                                    <label for="Mcbx2" class="form-label">Tipo Variedad del Producto: </label>
                                    <select class="form-control" name="Mcbx2" id="Mcbx2" disabled>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Mtxt1" class="form-label">Cantidad del Producto: </label>
                                    <input type="number" class="form-control" id="Mtxt1" name="Mtxt1">
                                </div>
                                <div class="mb-3">
                                    <label for="Mtxt2" class="form-label">Precio del Paquete: </label>
                                    <input type="numb" class="form-control" id="Mtxt2" name="Mtxt2"
                                        placeholder="Example: 29.30">
                                </div>
                                <div class="mb-3">
                                    <label for="Mcbx3" class="form-label">Calibre del Producto: </label>
                                    <select class="form-select" name="Mcbx3" id="Mcbx3">
                                        <option id="0" value="0">Selecione una Calibre</option>
                                        <?php
                                                            include('../../Conection/bd.php');
                                                            $consulta1='select * from calibre_producto;';
                                                            $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                                        ?>
                                        <?php foreach($ejecutar1 as $opciones): ?>
                                        <option id="<?php echo $opciones['id_calibre']?>"
                                            value="<?php echo $opciones['id_calibre']?>">
                                            <?php echo $opciones['calibre']?></option>
                                        <?php endforeach ?>
                                    </select>&nbsp;
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description" id="MfloatingTextarea"
                                        maxlength="150"></textarea>
                                    <label for="MfloatingTextarea">Descripción del Producto</label>
                                </div><br>
                                <button type="button" class="btn btn-outline-success btn-lg" id="Mbtn1"
                                    onclick="MEditar()">Agregar Stock</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-outline-danger btn-lg" onclick=""
                                    data-bs-dismiss="modal" id="Mbtn2">Salir</button>
                            </div>
                            <label hidden="false" id="Mtxid"></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>