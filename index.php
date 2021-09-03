<?php
  
  require_once 'app/config/config.php';
  require_once 'app/modules/hg-api.php';

  $hg = new HG_API(HG_API_KEY);
  $dolar = $hg->dolar_quotation();
  if ($hg->is_error() == false){
      $variation = $dolar['variation'] < 0 ?     'danger' : 'info';
  }


?>
<!doctype html>
<html lang="en">
<head>
    <title>Cotação Dolar</title>
    <!-- metatags necessárias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    
<style>
    .badge {
    display: inline-block;
    padding: .35em .65em;
    padding-top: 0.35em;
    padding-right: 0.65em;
    padding-bottom: 0.35em;
    padding-left: 0.65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: #f00;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    }
    .badge2 {
    display: inline-block;
    padding: .35em .65em;
    padding-top: 0.35em;
    padding-right: 0.65em;
    padding-bottom: 0.35em;
    padding-left: 0.65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: black;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    }
</style>

</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Cotação Dólar</p>
                <?php 
                if ($hg->is_error() == false): ?>
                <p>USD <span class="badge badge-pill badge-<?php echo($variation); ?>"><?php echo($dolar['buy']) ?></span></p>
                <?php else: ?>
                    <p>USD <span class="badge2">Serviço indisponível</span></p>
                    <?php endif; ?>  
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <!-- Jquery, Popper.js e então Bootstrap JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>




</html>