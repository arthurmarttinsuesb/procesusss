<div class=" float-right">
    <div class="table-responsive">
        <table>
            <tr>
               <input type="hidden" name="tramitacao" id="tramitacao" value="{{ $tramite ?? '' }}">
                @if($tramite!=="")
                    <td>
                        <a href="#" class="btn btn-block btn-outline-warning btnDevolver"><i class="fa fa-undo-alt"></i> Devolver o Processo</a>
                    </td>
                @endif
                @if(($processo->user->hasRole('cidadao') & $tramite!=="") || (!Auth::user()->hasRole('cidadao') & $tramite=="" & $processo->tramite=="Liberado"))
                    <td>
                        <a href="#" class="btn btn-block btn-outline-danger btnEncerrar"><i class="fa fa-times"></i> Encerrar o Processo</a>
                    </td>
                @endif

                <td>
                    <a href="/processo-tramitacao/create/{{$processo->numero}}/{{$tramite}}" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Encaminhamento</a>
                </td>
            </tr>
        </table>
    </div>
</div>

   

<br>
<br>
<table id="table_tramite" class="table table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Trâmite</th>
        </tr>
    </thead>
    <tbody>
</table>



