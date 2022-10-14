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
       
    <container id="search">
        <div style="width: 300px;">
            <form method="post" class="form-inline" action="index.php">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search" style="margin-left: 30px;
    height: 27px;
    width: 186px">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
  </form>


        </div>
        <div class="form-group col-md-6">
            <label for="brand" class="col-md-3" style="font-size: 13px;">Nhà cung cấp:</label>

            <select id="slboxsort" name="brand" class="form-control col-md-3" style="display:inline-block; font-size: 13px;" placeholder="Thương hiệu" >
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

    <?php require '../xuly/xulihienthi.php';?>
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
                //AJAX LAY SO LUONG TON TRONG KHO TONG THEO SIZE
                $.extend({
                    slsizeResponse: function(url, data) {
                    var sl = null;
                    $.ajax({
                            method: 'post',
                            url: url,
                            datatype: "JSON",
                            data: data,
                            async: false,
                            success: function(response){
                                sl = JSON.parse(response);
                            }   
                        });
                        return sl;
                    }
                });
                //END AJAX LAY SO LUONG TON TRONG KHO TONG THEO SIZE
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
                function hienthisltheosize(idgiay,selectedsize, ele){
                    $.ajax({
                            method: 'post',
                            url: '../../model/ajaxsltheosize.php',
                            datatype: "JSON",
                            data: {shoe: idgiay, size: selectedsize},
                            success: function(response){
                                var sl = JSON.parse(response);
                                ele.text(' - Số lượng tồn: ' + sl);
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
                    var slboxsize = modal.find('.kcsoluong #selectsize');
                    var sizemacdinh = slboxsize.find(":selected").val();
                    var elementslton = modal.find('#sltontheosize');
                    if(typeof(sizemacdinh) !== 'undefined'){
                        hienthisltheosize(idgiay,sizemacdinh, elementslton);
                    }
                    else{
                        elementslton.text(' - Số lượng tồn: Đang xử lí...');
                    }
                    //var sltonmacdinh = $.slsizeResponse('../../model/ajaxslmacdinh.php',{shoe: idgiay, size: sizemacdinh});
                    //modal.find('#sltontheosize').text(' - Số lượng tồn: ' + sltonmacdinh);
                    slboxsize.change(function(){
                        var selectedsize = slboxsize.find(":selected").val();
                        hienthisltheosize(idgiay,selectedsize, elementslton);
                        //var sltontheosize = $.slsizeResponse('../../model/ajaxsltheosize.php',{shoe: idgiay, size: selectedsize});
                        //modal.find('#sltontheosize').text(' - Số lượng tồn: ' + sltontheosize);
                    });
                    //modal.find('.modal-body input').val(recipient)
                })
            });
            
   </script>
</html>

