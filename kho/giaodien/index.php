<?php 
session_start();
                    if(isset($_SESSION['email'])){
                            $user = $_SESSION['email'];
                        }
                        else{
                            $user = "";
                        }
                     
                    if($user === ""){
                    echo "<script>
                    alert('Vui lòng đăng nhập trước!');
                    window.location.href='../giaodien/Dangnhap.php';
                    </script>";
                    }
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
       
    <container id="search">
        <div style="width: 300px;">
            <form method="post" class="form-inline" action="index.php">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search" style="margin-left: 30px;
    height: 27px;
    width: 186px">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
  </form>

        </div>
  <label for="brand"></label>

  <select id="slboxsort" name="brand" class="s" style="position: absolute;
   top: 79px;
    left: 200px;
     height: 30px;
     width: 100px;
     margin-left: 100px;
      border-radius: 4px;" placeholder="Thương hiệu" >
  <option value="nhapkho">Nhập kho</option>
  <option value="xuatkho">Xuất kho</option>
</select> 
<input type="date" id="start" name="trip-start"
       value="2022-07-22"
       class="d" style="position: absolute;
    top: 79px;
    left: 336px;
     height: 30px;
     width: 100px;
     margin-left: 100px;
      border-radius: 4px;">
<button type="button" class="z" style="position: absolute;
    top: 79px;
    left: 500px;
     height: 30px;
     width: 100px;
     margin-left: 100px;
      border-radius: 4px;" >Apply</button>
</container>      <?php
        // put your code here
        ?>
      <?php require '../xuly/xulihienthi.php';?>
    </body>
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
                            url: '../model/ajaxloctrangchu.php',
                            datatype: "JSON",
                            data: {nhanhang: brand},
                            success: function(response){
                                var arrayObj = JSON.parse(response);
                                $("#tablehienthi").find('tbody').empty();
                                arrayObj.forEach(function (item,index){
                                    var row = $('<tr>');
                                    row.append('<td>' + item.name+'<br>'+ item.price +'</td>');
                                    row.append('<td><img src="../../'+ item.image +'" style="width: 100px; height: 85px" ></td>');
                                    row.append('<td>' + item.soluong + '</td>');
                                        row.append('<td>' + item.brand + '</td>');
                                          row.append('<td>' + item.size + '</td>');
                                            row.append('<td>' + item.date + '</td>');
                                    row.append('</tr>');
                                    $("#tablehienthi").find('tbody').append(row);
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
