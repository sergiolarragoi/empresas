<?php
require_once '../controller/securityController.php';
include "../controller/companyController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenid@</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>


        <?php foreach ($listaCompany as $company) { ?> 
            
        <a href="<?php echo $company->getWeb(); ?>" target="_blank"><img style="width: 150px; height: 150px;" src= "<?php echo $company->getLogo(); ?>" alt=""/></a>
            
            
        <?php } ?>
             

    </body>
</html>
