<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>toastr examples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
    <link href="<?= base_url(); ?>assets/build/toastr.css" rel="stylesheet" type="text/css" />
    <style>
        .row {
            margin-left: 0;
        }
    </style>
</head>

<body class="container">
<section class="row">
    <h1>toastr</h1>

    <div class="well row">
  

        <div class="row">
            <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button>
          
        </div>


    </div>
</section>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/toastr.js"></script>

<script type="text/javascript">
    $(function () {
        var i = -1;
        var toastCount = 0;
       

        var getMessage = function () {
            var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
                '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>',
                'Are you the six fingered man?',
                'Inconceivable!',
                'I do not think that means what you think it means.',
                'Have fun storming the castle!'
            ];
            i++;
            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };

 

        $('#showtoast').click(function () {
            var shortCutFunction = "success";
            var erro = "error";
            
            var msg = $('#message').val();
            var title = $('#title').val() || '';
  
            
          
            if (!msg) {
                msg = getMessage();
            }

       

            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
           

         
        
           
          
        });

     
      
     
    })
</script>
</body>
</html>
