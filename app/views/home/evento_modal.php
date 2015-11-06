<!-- /.modal -->
        <div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content">
              <div class="modal-header dark-container header">
                <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title titulo">Evento</h4>
              </div>
              <div class="modal-body">
                <form id="form_evento" name="form_evento" action="" method="post">
                  <div class="row form-group">                                    
                    <div class="col-sm-12">
                      <div class="col-sm-3">
                      <label>Evento:</label>
                        <input type="text" class="form-control" id="txt_evento" readonly> 
                      </div>
                      <div class="col-sm-3">
                      <label>Fecha:</label>
                        <input type="text" class="form-control" id="txt_fecha" readonly>
                      </div>
                      <div class="col-sm-6">
                      <label>Descripción:</label>
                        <input type="text" class="form-control" id="txt_descripcion" readonly>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="col-sm-3">
                        <label>Establecimiento:</label>
                        <input type="text" class="form-control" id="txt_est" readonly>
                      </div>
                      <div class="col-sm-3">
                        <label>Distrito:</label>
                        <input type="text" class="form-control" id="txt_dis" readonly>
                      </div>
                      <div class="col-sm-6">
                        <label>Direccion:</label>
                        <input type="text" class="form-control" id="txt_dir" readonly>
                      </div>
                    </div>
                  </div>
<input type="text" name="latitud" style="visibility:hidden;position:absolute;" id="lat">
<input type="text" name="longitud" style="visibility:hidden;position:absolute;" id="lon">
                  <div class="row form-group">
                    <div class="col-sm-12">
                      <input id="pac-input" class="controls" type="text" placeholder="Ubicación exacta">
                      <div id="canvas"></div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" id="btn_close_modal" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal -->
