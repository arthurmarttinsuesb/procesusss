<!-- Modal -->
<div class="modal fade" id="modal_replicar_processo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Replicar Processo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form" action='/replicarModal'>
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <strong>Processo <span style="color: red;">*</span></strong>
                            @inject('processos', 'App\Processo')
                            <select id="processo" name='processo' class="form-control select2 @error('processo') is-invalid @enderror">
                                <option value="">Selecione</option>
                                @foreach($processos->get() as $processo)
                                @if (Auth::user()->id == $processo->fk_user)
                                <option value='{{$processo->numero}}'>{{$processo->numero}}</option>
                                @endif
                                @endforeach
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