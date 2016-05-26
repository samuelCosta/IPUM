
<!--
<div class="col-sm-1 col-sm-offset-1 col-md-10 col-md-offset-2 main">
<div class="alert alert-success" role="alert">
    
 <h6>  </h6>
 
 
</div>
</div>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/toastr.js"></script>
 <link href="<?= base_url(); ?>assets/build/toastr.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">


        toastr.options.closeButton = true;
        $(document).ready(function () {
            
            var shortCutFunction = "success";
            
            
            var msg =  "<?= $msg; ?>";
            var title = "Erros";
  
            
          if(!msg ){
          }else{
       
             toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
           
        }
         
        });

     
      
     
    
</script>

