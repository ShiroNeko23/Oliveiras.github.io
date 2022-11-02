<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Variedad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" name="modal1" id="modal1">
            <div class="mb-3">
              <label hidden="false" id="idvar"></label>
              <label class="form-label">Nombre de Variedad</label>
              <input type="text" name="txt1" id="txt1" class="form-control" placeholder="Ingrese Nombre de la Variedad" autofo>
            </div>
            <div class="mb-3">
              <label class="form-label">Tipo de Variedad</label><br>
              <label>
                <select name="cbx1" id="cbx1">
                    <option value="">Selecione un Tipo Variedad</option>
                    <?php
                        include('../Conection/bd.php');
                        $consulta1='select * from tipo_variedad;';
                        $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                    ?>
                    <?php foreach($ejecutar1 as $opciones): ?>
                        <option id="<?php echo $opciones['id_tipovar']?>"value="<?php echo $opciones['id_tipovar']?>"><?php echo $opciones['Tipo_variedad']?></option>
                    <?php endforeach ?>
                </select>
            </label>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnEditarModal">Guardar Edición</button>
      </div>
    </div>
  </div>
</div>