<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <title></title>
    </head>
    <body>
       <?php require 'header.php'; ?>
<div class="modal fade" id="modalchitiet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">    
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="display: flex;justify-content: center;">
              <div class="a anh1">
                  <img src="../../img/adidas/bravada.jpg" id="anh1">
              </div>
              <div class="a anhphai">
                  <div class="anh2">
                      <img src="../../img/adidas/bravada.jpg" id="anh2">
                  </div>
                  <div class="anh3">
                      <img src="../../img/adidas/bravada.jpg" id="anh3">
                  </div>
              </div>
          </div>
          <div class="form-group">
              <div>
                  <label class="col-form-label">Tổng số lượng tồn trong kho:</label>
                  <span id="tongslton"></span>
              </div>
              <div>
                  <label class="col-form-label">Kich cỡ:</label>
                  <select id="selectsize">
                      
                  </select>
                  <span id="sltontheosize"> - Số lượng tồn:</span>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="form-row col-md-12">
        <div class="form-group col-md-4">
            
                            <input id="searchinput" class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search" style="margin-left: 30px; height: 27px; width: 60%; font-size: 13px;">
                            <button id="searchbtn" class="btn btn-outline-success" type="submit" name="submit" style="font-size: 13px;">Search</button>
            
        </div>
        <div class="form-group col-md-6">
            <label for="brand" class="col-md-3" style="font-size: 13px;">Nhà cung cấp:</label>

            <select id="slboxsort" name="brand" class="form-control col-md-3" style="font-size: 13px;" placeholder="Thương hiệu" >
               <option value="All" selected="true">All</option>
                <?php 
                    require '../../connectdb/connect.php';
                    $con= ketnoi();
                    $query="select * from nha_cung_cap";
                      $result = mysqli_query($con, $query);

                                                      while ($row = mysqli_fetch_assoc($result)) { ?>
                      <option value="<?php echo $row['ten_nha_cung_cap']; ?>"><?php echo $row['ten_nha_cung_cap']; ?></option>
                                                          <?php 
                                                      } 
                                                          ?>

              
               ?>
            </select>
        </div>
    </div>
    <?php require '../xuly/xulihienthi.php';
    
    //dfdsfdsfdsfds
    ?>
</div>
    </body>
    <script type="text/javascript">
            
            $(document).ready(function(){
                function statusmacdinh(){
                    var macdinh = document.getElementById('slboxsort').value;
                    var searchinput = document.getElementById("searchinput").value;
                    guiajax(macdinh, searchinput);
                }
                function guiajax(brand, searchinput){
                    //var user = <?php //echo $_SESSION['id'];?>;
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxloctrangchu.php',
                            datatype: "JSON",
                            data: {nhanhang: brand, search: searchinput},
                            success: function(response){
                                var arrayObj = JSON.parse(response);
                                $("#tablehienthi").find('tbody').empty();
                                arrayObj.forEach(function (item,index){
                                    var row = $('<tr>');
                                    row.append('<td>' + item.name+'</td>');
                                    row.append('<td><img src="../../'+ item.image +'" style="width:200px; height:230px;"></td>');
                                    row.append('<td>' + item.brand + '</td>');
                                    row.append('<td>' + item.price + '</td>');
                                    row.append('<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalchitiet" data-whatever="'+ item.idgiay +'">Chi tiết</button></td>')
                                    row.append('</tr>');
                                    $("#tablehienthi").find('tbody').append(row);
                                });
                                //console.log(arrayObj);
                            }
                    });
                }
                //AJAX LAY THONG TIN CHI TIET GIAY
                $.extend({
                    xResponse: function(url, data) {
                    var arrayObj = null;
                    $.ajax({
                            method: 'post',
                            url: url,
                            datatype: "JSON",
                            data: data,
                            async: false,
                            success: function(response){
                                arrayObj = JSON.parse(response);
                            }   
                        });
                        return arrayObj;
                    }
                });
                //END AJAX LAY THONG TIN CHI TIET GIAY
                function ttctsizegiay(idgiay,isgetsize){
                    $.ajax({
                            method: 'post',
                            url: '../model/ajaxthongtinchitiet.php',
                            datatype: "JSON",
                            data: {shoe: idgiay, checkgetsize: isgetsize},
                            success: function(response){
                                var arrayObj = JSON.parse(response);
                                var selectsize = document.getElementById('selectsize');
                                while (selectsize.options.length > 0) {                
                                    selectsize.remove(0);
                                }
                                arrayObj.forEach(function (item,index){
                                    var opt = document.createElement('option');
                                    opt.value = item;
                                    opt.text = item;
                                    selectsize.add(opt);
                                });
                            }   
                        });
                }
                function checkselect(){
                    var searchinput = document.getElementById("searchinput").value;
                    var statusdachon = document.getElementById('slboxsort').value;
                    guiajax(statusdachon, searchinput);
                }
                function search(){
                    var searchinput = document.getElementById("searchinput").value;
                    var statusdachon = document.getElementById('slboxsort').value;
                    guiajax(statusdachon, searchinput)
                }
                statusmacdinh();
                document.getElementById("slboxsort").onchange = checkselect;
                document.getElementById("searchbtn").onclick = search;
                $('#modalchitiet').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var idgiay = button.data('whatever'); 
                    var modal = $(this);
                    modal.find('.modal-title').text('Thông tin chi tiết sản phẩm');
                    var xArrayObj = $.xResponse('../model/ajaxthongtinchitiet.php', {shoe: idgiay,checkgetsize: 0});
                    xArrayObj.forEach(function (item,index){
                       modal.find('.anh1 img').attr('src','../../'+item.hinh1);
                       modal.find('.anh2 img').attr('src','../../'+item.hinh2);
                       modal.find('.anh3 img').attr('src','../../'+item.hinh3);
                       modal.find('#tongslton').text(item.tongslkhotong);
                    });
                    ttctsizegiay(idgiay,1);
                    //modal.find('.modal-body input').val(recipient)
                })
            });
            
   </script>
</html>

