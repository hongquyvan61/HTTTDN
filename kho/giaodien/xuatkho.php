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
        
     
  
 
        
     <?php
        // put your code here
        ?>
        <div class="container">
            <?php require '../xuly/xulixuatkho.php';?>
        </div>
      


    </body><!-- comment -->
    <script type="text/javascript">
            
            $(document).ready(function(){
                function statusmacdinh(){
                    var macdinh = document.getElementById('slboxsort').value;
                    if(macdinh != ''){
                        
                    guiajax(macdinh);
                    }
                }
                function sanphammacdinh(){
                    var macdinh = document.getElementById('sortsanpham').value;
                    if(macdinh != ''){
                    guiajaxsanpham(macdinh);
                }
                }
                function guiajax(brand){
                    //var user = <?php //echo $_SESSION['id'];?>;
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxlocsanpham.php',
                            datatype: "JSON",
                            data: {nhanhang: brand},
                            success: function(response){
                                var arrayObj = JSON.parse(response);
                                var slboxsp = document.getElementById('sortsanpham');
                                while (slboxsp.options.length > 0) {                
                                    slboxsp.remove(0);
                                }
                                var optnull = document.createElement('option');
                                    optnull.value = "--";
                                    optnull.text = "--";
                                    slboxsp.add(optnull);
                                arrayObj.forEach(function (item,index){
                                    var opt = document.createElement('option');
                                    opt.value = item.name;
                                    opt.text = item.name;
                                    slboxsp.add(opt);
                                });
                            }
                    });
                }
                 
                function guiajaxsanpham(tensp,sizedachon){
                    //var user = <?php //echo $_SESSION['id'];?>;
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxlaysize.php',
                            datatype: "JSON",
                            data: {ten: tensp, size: sizedachon},
                            success: function(response){
                                var result = JSON.parse(response);
                                var slboxsize = document.getElementById('size');
                                while (slboxsize.options.length > 0) {                
                                    slboxsize.remove(0);
                                }
                               var optnull = document.createElement('option');
                                    optnull.value = "--";
                                    optnull.text = "--";
                                    slboxsize.add(optnull);
                                result.forEach(function (item,index){
                                    var opt = document.createElement('option');
                                    opt.value = item;
                                    opt.text = item;
                                    slboxsize.add(opt);
                                });
      
                            }
                           
                           
                    });
                }
                function guiajaxsl(tensp,sizedachon){
                    //var user = <?php //echo $_SESSION['id'];?>;
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxlaysl.php',
                            datatype: "JSON",
                            data: {ten: tensp, size: sizedachon},
                            success: function(response){
                                var result = JSON.parse(response);
                                document.getElementById("sl").value =result;
                    }
                });
                
            }
                function checkselect(){
                    var statusdachon = document.getElementById('slboxsort').value;
                    guiajax(statusdachon);
                }
                function checkselectsanpham(){
                    var spdachon = document.getElementById('sortsanpham').value;
                    var sizedachon=document.getElementById('size').value;
                    console.log(spdachon,sizedachon);
                    guiajaxsanpham(spdachon,sizedachon);
                }
                function selectsl(){
                    var spdachon = document.getElementById('sortsanpham').value;
                    var sizedachon=document.getElementById('size').value;
                    guiajaxsl(spdachon,sizedachon);
                }
                function getrowvaluetable(){
                    var $table = $("#tablexuatkho");
  
                    var headers = $table.find('thead th').map(function(){
                      return $(this).text().replace(' ', '');
                    });
                  
                    var rows = $table.find('tbody tr').map(function(){
                      var result = {};
                      var values = $(this).find('>td').map(function(){
                        return $(this).text();
                      });
                      
                      // use the headers for keys and td values for values
                      for (var i = 0; i < headers.length; i++) {
                          if(values[i] != "Xoá"){
                          
                            result[i] = values[i];
                          }
                      }

                      // If you are using Underscore/Lodash you could replace this with
                      // return _.object(headers, values);

                      return result;
                    }).toArray();


                    // just for demo purposes
                    var tableresult = JSON.stringify(rows);
                   
                    var tabledatajson = JSON.parse(tableresult);
                    var tenncc = $("#slboxsort").val();
                    guiajaxxuatkho(tabledatajson);
                }
                function guiajaxxuatkho(tableresult){
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxxuatkho.php',
                            datatype: "JSON",
                            data: {tabledata: tableresult},
                            success: function(response){
                                var result = JSON.parse(response);
                                if(result == 1){
                                    alert("Tạo đơn xuất kho thành công!");
                                  $('#tablexuatkho').find('tbody').empty();
                                   
                                }
                                else{
                                    alert("Xảy ra sự cố! Xin thử lại");
                                }
                            }
                    });
                }
                function layidgiay(){
                    var tensp = document.getElementById("sortsanpham").value;
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxlayidgiay.php',
                            datatype: "JSON",
                            data: {ten: tensp},
                            success: function(response){
                                var result = JSON.parse(response);
                                var sl =  parseInt(document.getElementById("sl").value);
                                var slinp =  parseInt(document.getElementById("soluong").value);
                                if(slinp<=sl){
                                inserttable(tensp,result);
                            }
                            else{
                                alert("Không đủ số lương trong kho!");  
                            }      
                            }
                    });
                }
                function inserttable(tensp,id){
                    var idgiay = id;
                    //var dongia = document.getElementById("sl").value;
                    var sl = document.getElementById("soluong").value;
                    var size = document.getElementById("size").value;
                    document.getElementById("sortsanpham").selectedIndex = 0;
                    document.getElementById("size").selectedIndex = 0;
                    document.getElementById("sl").value = "";
                    document.getElementById("soluong").value = "";
                    var row = $('<tr>');
                    row.append('<td>' + idgiay + '</td>');
                    row.append('<td>' + tensp + '</td>');
                    row.append('<td>' + size + '</td>');
                    row.append('<td>' + sl + '</td>');
                    row.append('<td><button class="btn btn-danger" style="font-size: 13px;" onclick="SomeDeleteRowFunction(this)">Xoá</button></td>');
                    row.append('</tr>');
                    $("#tablexuatkho").find('tbody').append(row);
                }
                function locknhacungcap(){
                    $("#slboxsort").prop("disabled", true);
                }
                statusmacdinh();
                sanphammacdinh();
                document.getElementById("slboxsort").onchange = checkselect;
                document.getElementById("sortsanpham").onchange  = checkselectsanpham;
                document.getElementById("size").onchange  = selectsl;
                document.getElementById("thembtn").onclick = layidgiay;
                document.getElementById("getdatatable").onclick = getrowvaluetable;
                document.getElementById("khoabtn").onclick = locknhacungcap;
            });
            function SomeDeleteRowFunction(o) {
                    //no clue what to put here?
                    var p=o.parentNode.parentNode;
                        p.parentNode.removeChild(p);
                        //console.log(p);
            }
   </script>
</html>
