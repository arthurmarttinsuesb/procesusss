<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeloDocumento;
use App\ProcessoDocumento;
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
                    $modelo->conteudo
                </body>
                </html>";
        
        $pdf = new PDF();
        $pdf::SetTitle($modelo->titulo);
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        return $pdf::Output('modelo.pdf');
        
    }
}
