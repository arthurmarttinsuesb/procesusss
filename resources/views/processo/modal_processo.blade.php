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
                    <strong>Processo <span style="color: red;">*</span></strong>
                    <select type="text" name="tipo" class="form-control" required>
                        @foreach(Auth::user()->getRoleNames() as $nome)
                          @if($nome=="cidadao")
                              <option>Público</option>
                            @else
                              <option>Público</option>
                              <option>Privado</option>
                          @endif  
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12">
                    <strong>Título <span style="color: red;">*</span></strong>
                    <input type='text' class="textarea form-control" name='titulo' required></textarea>
                </div>
                <div class="form-group col-12">
                    <strong>Descrição</strong>
                    <textarea class="textarea form-control" name='descricao'></textarea>
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