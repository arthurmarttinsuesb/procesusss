<div class=" float-right">
    <div class="table-responsive">
        <table>
            <tr>
                <input type="hidden" name="tramitacao" id="tramitacao" value="{{ $tramite ?? '' }}">
                @if($tramite!=="")
                <!-- <td>
                        <a href="processo/{{$processo->id}}/devolver/{{$tramite}}" class="btn btn-block btn-outline-warning"><i class="fa fa-undo-alt"></i> Devolver o Processo ao Autor(a)</a>
                    </td> -->
                <td>
                    <a href="/processo/{{$processo->id}}/devolver/{{$tramite}}" class="btn btn-block btn-outline-warning"><i class="fa fa-undo-alt"></i> Devolver o Processo ao Autor(a)</a>
                </td>
                @endif
                <td>
                    <a href="/processo/{{$processo->id}}/encerrar" class="btn btn-block btn-outline-danger"><i class="fa fa-times"></i> Encerrar o Processo</a>
                </td>

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