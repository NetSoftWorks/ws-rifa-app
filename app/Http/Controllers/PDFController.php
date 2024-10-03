<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function generarTicket(array $ticket)
    {
        $url = "http://localhost:4200/validar/ticket/" . $ticket['codigo'];

        $qrCode = QrCode::size(200)->generate($url);
        $qrCode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrCode);

        $mpdf = new Mpdf();
        $mpdf->imageVars['images'] = 70;
        $mpdf->SetCompression(true);
        $mpdf->simpleTables = true;
        $mpdf->useSubstitutions = false;
        $mpdf->WriteHTML(view('pdfs.ticket', compact('ticket', 'qrCode'))->render());
        $mpdf->Output('Ticket ' . $ticket['codigo'] . '.pdf', 'I');
    }
}
