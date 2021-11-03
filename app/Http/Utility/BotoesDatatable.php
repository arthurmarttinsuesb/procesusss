<?php

namespace App\Http\Utility;

// basta importar essa classe no controller; use App\Http\Utility\BotoesDatatable;
// e depois no return do Datatable chamar o metodo criarBotoes passando o id e a rota, exemplo
// return BotoesDatatable::criarBotoes($usuarios->id, 'usuarios');
//$btnExcluirClassName é caso você queira mudar a classe do botao pra buscar no seletor
//no javascript depois. Caso o padrao seja 'btnExcluir' n precisa ser passado na funcao.
//$btns é caso queira apenas um ou dois botoes, por padrao vem todos e nao precisa
// ser passado na chamada da funcao.
//$status é se o registro está ativo ou não (no caso do tramite, exibe os inativos)
class BotoesDatatable
{

    public static function criarBotoes($id, $route, $btnExcluirClassName = 'btnExcluir', $btns = 'all', $status = 'Ativo')
    {

        $retorno = '<div class="btn-group btn-group-sm">';

        $disabled = 'disabled';
        if ($status == 'Criado') {
            $disabled = '';
        }

        if (strpos($btns, 'ver') !== false || $btns == 'all') {
            $retorno = $retorno . '
            <a href="/' . $route . '/' . $id . '"
                class="btn bg-teal color-palette"
                title="Visualizar" data-toggle="tooltip" target="_blank">
                <i class="fas fa-eye"></i>
            </a>';
        }

        if (strpos($btns, 'editar') !== false || $btns == 'all') {
            $retorno = $retorno . '<a href="/' . $route . '/' . $id . '/edit"
                class="btn btn-info"
                title="Alterar" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i>
            </a>';
        }

        if (strpos($btns, 'deletar') !== false || $btns == 'all') {
            $retorno = $retorno . '<a href="#"
                class="btn bg-danger color-palette ' . $disabled . ' ' . $btnExcluirClassName . '"
                data-id="' . $id . '"
                title="Excluir" data-toggle="tooltip">
                <i class="fas fa-trash"></i>
            </a>';
        }

        $retorno = $retorno . '</div>';

        return $retorno;
    }

    public static function criarBotoesPrincipais($id, $route, $btnExcluirClassName = 'btnExcluir')
    {

        return '<div class="btn-group btn-group-sm">
                    <a href="/' . $route . '/' . $id . '/edit"
                        class="btn btn-info"
                        title="Alterar" data-toggle="tooltip">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="#"
                        class="btn bg-danger color-palette ' . $btnExcluirClassName . '"
                        data-id="' . $id . '"
                        title="Excluir" data-toggle="tooltip">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>';
    }

    public static function criarBotoesAtivar($id, $route, $slug)
    {
        return '<div class="btn-group btn-group-sm">
                        <a href="/'.$route.'/visualizar-dados/'.$slug.'"
                            class="btn bg-olive"
                            title="Visualizar Informações do Cidadão" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                </div>';
    }

    public static function criarBotoesProcesso($id, $route, $assinatura)
    {

        $botoes = '<div class="btn-group btn-group-sm">
            <a href="/pdf/' . $route . '/' . $id . '"
                class="btn bg-teal color-palette"
                title="Visualizar" data-toggle="tooltip" target="_blank">
                <i class="fas fa-eye"></i>
            </a>
            <a href="/' . $route . '/' . $id . '/edit"
                class="btn btn-info"
                title="Alterar" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a href="#"
                class="btn bg-danger color-palette btnExcluir"
                data-id="' . $id . '"
                title="Excluir" data-toggle="tooltip">
                <i class="fas fa-trash"></i>
            </a>
                ';
        if ($assinatura) {

            $botoes = $botoes . ' <a href="#"
                class="btn bg-secondary color-palette btnAssinar"
                data-id="' . $id . '"
                title="Assinar" data-toggle="tooltip">
                <i class="fa fa-edit"></i>
            </a>
                ';
        }
        $botoes = $botoes . '</div>';

        return $botoes;
    }

    public static function criarBotaoVisualizar($id, $route)
    {

        return '<div class="btn-group btn-group-sm">
            <a href="' . $route . '/' . $id . '"
                class="btn bg-teal color-palette"
                title="Visualizar" data-toggle="tooltip" target="_blank">
                <i class="fas fa-eye"></i>
            </a>
        </div>';
    }
}
