<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

function generate_pdf($html)
{
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream();
}
