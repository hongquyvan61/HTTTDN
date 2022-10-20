<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>   
        <meta charset="UTF-8">
      <!-- Latest compiled and minified CSS -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/csskho.css" type="text/css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div>
            <?php require 'header.php'; ?>  
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin:auto;">
                        <div class="card">
                            <div class="card-header bg-info text-white">Information</div>
                            <div class="card-body"><p>You have been logged out. <a href="Dangnhap.php">Login again.</a></p></div> 
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container" style="margin-top: 4%;">
                    <center>
                       <p>Copyright &copy Store. All Rights Reserved.</p>
                       <!--<p>This website is developed by Yugesh Verma</p>-->
                   </center>
               </div>
           </footer>
        </div>
    </body>
</html>
