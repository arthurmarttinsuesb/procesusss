<?php

namespace App\Http\Utility;

class BotoesDatatable
{

    public static function criarBotoes($id, $route)
    {
        return '<div class="btn-group btn-group-sm">
            <a href="javascript:void(0)"
                class="btn bg-teal color-palette btnVisualizar"
                data-id="' . $id . '"
                title="Visualizar" data-toggle="tooltip">
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
    </div>';
    }
}
