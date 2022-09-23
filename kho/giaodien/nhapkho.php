<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/css.css" type="text/css">
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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

        <title></title>
    </head>
    <body>
         <?php require 'header.php'; ?>
        
     
  
 
        
     <?php
        // put your code here
        ?>
      <?php require '../xuly/xulinhapkho.php';?>


    </body><!-- comment -->
    <script type="text/javascript">
            
            $(document).ready(function(){
                function statusmacdinh(){
                    var macdinh = document.getElementById('slboxsort').value;
                    guiajax(macdinh);
                }
                function guiajax(brand){
                    //var user = <?php //echo $_SESSION['id'];?>;
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxlochang.php',
                            datatype: "JSON",
                            data: {nhanhang: brand},
                            success: function(response){
                                var arrayObj = JSON.parse(response);
                                console.log(arrayObj);
                                $("#tablelichsu").find('tbody').empty();
                                arrayObj.forEach(function (item,index){
                                    var row = $('<tr>');
                                    row.append('<td>' + item.name+ '</td>');
                                    row.append('<td><img src="../../'+ item.image +'" style="width: 100px; height: 85px" ></td>');
                                    row.append('<td>' + item.price + '</td>');
                                    row.append('<td>' + item.soluong + '</td>');
                                    row.append('</tr>');
                                    $("#tablelichsu").find('tbody').append(row);
                                });
                            }
                    });
                }
                function checkselect(){
                    var statusdachon = document.getElementById('slboxsort').value;
                    guiajax(statusdachon);
                }
                statusmacdinh();
                document.getElementById("slboxsort").onchange = checkselect;
            });
            
   </script>
</html>