<?php
/**
 * HTML2PDF Library - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    ?>
 <page>
    <h1>Aprovação de Sócio</h1><br>
    <br>
   Eu _______________________________________________________ declaro que em reunião foi aprovado o sócio da iPUM – Associação de Percussão Universitária do Minho _______________________________________________________ com o nº de identificação civil ________________, nº de identificação fiscal ________________ e nº de filiação na Universidade do Minho ___________
</page>
<?php
    $content = ob_get_clean();

    // convert in PDF
    require_once('C:/xampp/htdocs/IPUM/html2pdf/vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
