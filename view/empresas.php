<?php
require_once '../controller/securityController.php';
//include ("../model/userClass.php");
//include ("../model/userModel.php");
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


        <?php foreach ($userCompany as $image) { ?> 

            <img src="<?php echo $image->getLogo(); ?>" alt=""/>        


        <?php } ?>


    </body>
</html>
