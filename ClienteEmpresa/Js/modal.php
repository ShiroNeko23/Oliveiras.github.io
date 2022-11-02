<div class="modal fade" id="modalempresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Js/edicemp.php" method="POST" name="modal1" id="modal1" style="height: 450px;">
                <input type="hidden" name='lbidcl' id="lbidcl"><input type="hidden" name='lbiddg' id="lbiddg"><br>
                <div class="mb-2 col-4" id="nom">
                    <label for="txt1" class="form-label">Empresa</label>
                    <input type="text" class="form-control" id="t1" name="txt1" style="width:300px;">
                </div>
                <div class="mb-3 col-8" id="divcor">
                    <label for="txt4" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="t4" name="txt4" placeholder="example@examples.com">
                </div>
                <div class="mb-3 col-5" id="tel">
                    <label for="txt5" class="form-label">Telefono</label>
                    <input type="num" class="form-control" id="t5" name="txt5" maxlength="9">
                </div>
                <div class="mb-3 col-5" id="iden">
                    <label for="txt6" class="form-label">Identificación</label>
                    <input type="num" class="form-control" id="t6" name="txt6" maxlength="11">
                </div>
                <div class="mb-3 col-10" id="selid">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditarempresa">Guardar Edición</button>
                </div>
                
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>