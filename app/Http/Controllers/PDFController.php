<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeloDocumento;
use App\ProcessoDocumento;
use App\DocumentoAssinatura;
use App\User;
use App\Processo;
use App\ProcessoTramitacao;
use Auth;
use Redirect;

use PDF;

class PDFController extends Controller
{
    public function modelo_documento($id)
    {
        $modelo = ModeloDocumento::where('id', $id)->first();
        $view = \View::make('pdf.modelo_documento',compact('modelo'));
        $html = "<!DOCTYPE html>
                <html>
                <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <title>$modelo->titulo</title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                </head>
                <body>
                    <h1>$modelo->titulo</h1>
                    <p>$modelo->conteudo</p>
                </body>
                </html>";

        $pdf = new PDF();
        $pdf::SetTitle($modelo->titulo);
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        return $pdf::Output('modelo.pdf');

    }
    public function documento($id)
    {
        $modelo = ProcessoDocumento::where('id', $id)->first();
        $assinatura = DocumentoAssinatura::where('fk_processo_documento', $id)->get();

        $view = \View::make('pdf.modelo_documento',compact('modelo'));
        $assinou = "";

        if(isset($assinatura)){
            foreach ($assinatura as $key => $vlr) {
                $usuario = user::where('id', $vlr->fk_user)->first();
                $data = date('d/m/Y H:s',strtotime($vlr->created_at));

                $assinou =$assinou."<br><br><br><br><br><br><tr>
                                        <td>Documento Assinado Eletronicamente por <strong>$usuario->nome</strong>, em $data, conforme horário oficial de Brasilia, conforme Decreto XX/XXXX</td>
                                    </tr>
                            <hr>";
            }
            // $usuario = user::where('id', $assinatura->fk_user)->first();

            // $data = date('d/m/Y H:s',strtotime($assinatura->created_at));

            $html = "<!DOCTYPE html>
                <html>
                <head>
                    <meta charset='utf-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <title>$modelo->titulo</title>
                    <!-- Tell the browser to be responsive to screen width -->
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <style type='text/css'>
                        .assinado {
                            position: fixed;
                            bottom: 0;
                            margin-bottom: 25px;
                        }
                    </style>
                </head>
                <body>
                    <div class='tudo'>
                        <h1>$modelo->titulo</h1>
                        $modelo->conteudo
                        <br><br>
                        <footer>
                            <table class='table table-bordered assinado'>
                                <tbody>
                                    $assinou
                                </tbody>
                            </table>
                        </footer>
                    </div>
                </body>
                </html>";
        }
        else{
            $html = "<!DOCTYPE html>
                <html>
                <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <title>$modelo->titulo</title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                </head>
                <body>
                    <h1>$modelo->titulo</h1>
                    $modelo->conteudo
                </body>
                </html>";
        }

        if($modelo->tipo == 'Público'){
            $pdf = new PDF();
            $pdf::SetTitle($modelo->titulo);
            $pdf::AddPage();
            $pdf::writeHTML($html, true, false, true, false, '');
            return $pdf::Output('modelo.pdf');
        }
        else{
            $id_user_logado = Auth::user()->id;
            $user_parte_doc = ProcessoTramitacao::where('fk_user', $id_user_logado)->where('fk_processo', $modelo->fk_processo)->first();

            if($modelo->fk_user == $id_user_logado || isset($user_parte_doc)){
                $pdf = new PDF();
                $pdf::SetTitle($modelo->titulo);
                $pdf::AddPage();
                $pdf::writeHTML($html, true, false, true, false, '');
                return $pdf::Output('modelo.pdf');
            }
            else{
                return Redirect::to('home/');
            }
        }
    }
}
