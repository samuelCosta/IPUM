<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
    $content = "
<page>
    <h1>Exemple d'utilisation</h1>
    <br>
    Ceci est un <b>exemple d'utilisation</b>
    de <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
</page>";
    
    require_once(dirname(__FILE__).'/vendor/autoload.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('exemple.pdf');
?>

    </body>
</html>