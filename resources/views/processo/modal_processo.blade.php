<!-- Modal -->
<div class="modal fade" id="modal-processo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Novo Processo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form  method="POST" id="form" action='/processo'>
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <strong>Tipo</strong>
                    <select type="text" name="tipo" class="form-control">
                        <option>Público</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Criar</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>