<!doctype html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>JSON Ajax com jQuery</title>
    </head>
<body>
    
  
 
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
  // aqui o nosso script js
</script>
</body>
</html>

<script type="text/javascript">
//inicio o jquery
$(document).ready(function() {
// inicio uma requisição
    $.ajax({
    // url para o arquivo json.php
        url : "<?php echo base_url(); ?>" + "utilizador/user_data_submit",
    // dataType json
        dataType : "json",
    // função para de sucesso
        success : function(data){
        // vamos gerar um html e guardar nesta variável
            var html = "";
 
        // executo este laço para ecessar os itens do objeto javaScript
            for($i=0; $i < data.length; $i++){
            // coloco o nome e sobre nome
                html += "<strong>Nome:</strong> "+data[$i].nome +" "+ data[$i].alcunha;
            // coloco a cidade
                html += " <strong>Cidade:</strong> "+data[$i].email
            // e por ultimo dou uma quebra de linha
                html += "<br />";
            }//fim do laço
 
        //coloco a variável html na tela
            $('body').html(html);
        }
    });//termina o ajax
});//termina o jquery
</script>