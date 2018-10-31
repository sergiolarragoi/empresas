<?php
require_once '../controller/securityController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>add company</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../js/functions_events.js"></script>
        <script type="text/javascript" src="../js/functions.js"></script>
    </head>
    <body>
<!--        <div class="container">
            <h2>Select company:</h2>
            <form action="">
                <div class="form-group">
                    <label for="sel1">Select sector to charge table using JSON:</label>
                    <select class="form-control" id="primaryCmb" name="cmbSector" onchange="loadTable()">
                        <option selected id="noSelect"></option>
                        <?php
                        /* First select combbobox is loaded using php and second with json */
//                        foreach ($listSectors as $sector) {
                            ?>
                            <option value='<?php // echo $sector->getIdSector() ?>'><?php // echo $sector->getName(); ?> </option>
                        <?php // }
                        ?>
                    </select>
                    <label for="sel1">Selected sector companies:</label>
                    <table id="myTable" name="myTable">
                         Records will be displayed here 
                    </table>  

                </div>
            </form>-->

            <!-- second form  -->
            <form action="printJSON.php" method="get">
                <div class="form-group">
                    <label for="sel1">Select sector to print JSON array:</label>
                    <select class="form-control" id="primaryCmb" name="cmbSector" onchange="loadTable()">
                        <option selected id="noSelect"></option>
                        <?php
                        /* First select combbobox is loaded using php and second with json */
                        foreach ($listSectors as $sector) {
                            ?>
                            <option value='<?php echo $sector->getIdSector() ?>'><?php echo $sector->getName(); ?> </option>
                        <?php }
                        ?>
                    </select>
                    <label for="sel1">Select 2:</label>
                    <select class="form-control" id="selectCompany" name="selectConten">
                        <option selected id="noSelect"></option>
                        
                    </select>
                    
                </div>

                <input type="submit" value="print JSON">
            </form>
    </body>
</html>
