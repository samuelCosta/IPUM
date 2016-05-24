<?php
# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');
 
/* Guardamos na variável $html o html que queremos converter.
 * Linha 13 - Incluímos o nosso arquivo css (exemploPdf.css)
 * Linha 15 - Temos uma div de id = logo que formatamos a mesma 
 *            com uma altura, largura, uma borda azul e uma imagem 
 *            de background.
 * Linha 16 - Temos agora um span de id = texto que formatamos 
 *            usando a fonte arial em negrito. */


   ob_start(); ?>

<style>
p  {
    line-height:100%;
    text-align: justify;
 
      margin: 50px 50px 50px 50px;
}


</style>
 <img src="<?= base_url(); ?>assets/dist/img/IPUM.jpg" class="user-image" alt="User Image" style="width:100px;height:100px;  margin: 10px 0px 0px 10px;"> 
<h5 style="color:gray;">Universidade do Minho</h5>
<h1 style="text-align:center; color:black;">  Aprovação de Orgãos Sociais</h1>


<p style="line-height:200%; text-align: justify; margin: 50px 50px 50px 50px;">A Assembleia Geral da Associação de Percussão Universitária do Minho – iPUM – certifica que <?php echo $utilizador['nome']?>, 
    portadora do cartão 
    de cidadão nº <?php echo $utilizador['bi']?>, ocupou os seguintes cargos nos corpos gerentes desta Associação:</p>
       <?php foreach($comprovativo as $p){?>

<!--<h5 style="line-height:20%; margin: 20px 20px 20px 20px;">-->
    <p style="line-height:90%; text-align: justify; margin: 20px 0px 0px 80px;">•	<?php echo $p['cargo']?> da <?php echo $p['categoria'] ?> desde <?php echo $p['dataInicio'] ?>  <?php  if($p['dataFim'] ==null){echo "até à presente data.";}else{ echo "a ".$p['dataFim'];} ?></p>
       <?php } ?>
 <br>
<br>
<br><br><br><br><br><br><br>


<pre>                            __________________________________
                            
                        Vice-Presidente da Assembleia Geral da iPUM</pre>


<?php 



    $content = ob_get_clean();
    
# Converte o html para pdf.
try
{
    /* Aqui estamos instanciando um novo objeto que irá criar o 
     * pdf. Então vamos aos parametros passados:
     * 1º parâmetro: Utilize “P” para exibir o documento no 
     *               formato retrato e “L” para o formato 
     *               paisagem. 
     * 2º parâmetro: Formato da folha A4, A5....... 
     * 3º parâmetro: Caso ocorra alguma exceção durante a 
     *               conversão. Em qual idioma é para 
     *               exibir o erro. No caso o idioma escolhido 
     *               foi o português “pt”. 
     * 4º parâmetro: Informe TRUE caso o html de entrada esteja
     *               no formato unicode e FALSE caso negativo. 
     * 5º parâmetro: Codificação a ser utilizada. ISO-8859-15, UTF-8 ...... 
     * 6º parâmetro: Margem do documento. Você pode informa um 
     *               único valor como no exemplo acima. 
     *               Outra forma é informa um array setando as 
     *               margens separadamente.: Exemplo: 
     * $html2pdf = new HTML2PDF(
     *   'P',
     *   'A4',
     *   'pt',
     *   false,
     *   'ISO-8859-15',
     *   array(5,5,5,8));
     * Sendo que a primeira posição do array representa a margem esquerda depois      
     * topo, direita e rodapé. */
    $html2pdf = new HTML2PDF('P','A4','pt', true, 'UTF-8', 2);
     
    # Passamos o html que queremos converte.
   
//    $html2pdf->writeHTML('<p>A Assembleia Geral da Associação de Percussão Universitária do Minho – iPUM – certifica
//    que xxxxxxxx, portadora do cartão 
//    de cidadão nº xxxxxxx, ocupou os seguintes cargos nos corpos gerentes desta Associação:</p>',1);

    $html2pdf->writeHTML($content);
    
    /* Exibe o pdf:
     * 1º parãmetro: Nome do arquivo pdf. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
                     I: Abre o pdf gerado no navegador. 
                     D: Abre a janela para você realizar o download do pdf. 
                     F: Salva o pdf em alguma pasta do servidor. */
    $html2pdf->Output('exemploPdf.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}