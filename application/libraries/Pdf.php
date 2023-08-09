<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    protected $CI;
    protected $dompdf;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->dompdf = new Dompdf();
    }

    public function generate($view, $data = [])
    {
        $html = $this->CI->load->view($view, $data, TRUE);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();

        $this->dompdf->stream('output.pdf', ['Attachment' => 0]);
    }
    public function generateHtml($html)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();

        $this->dompdf->stream('output.pdf', ['Attachment' => 0]);
    }
}
