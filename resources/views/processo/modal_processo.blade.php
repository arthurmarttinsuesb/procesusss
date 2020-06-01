<div class="modal fade" id="modall-processo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Criar Processo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" id="form" action='/processo'>
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <strong>Tipo</strong>
                    <select type="text" name="tipo" class="form-control">
                        <option>Público</option>
                    </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Criar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>