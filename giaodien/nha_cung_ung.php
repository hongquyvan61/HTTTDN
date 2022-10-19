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
 <link rel="stylesheet" href="../bootstrap/css/admin2.css">
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
          <?php require '../giaodien/admin_menu.php';?>
         
   <div class="container">
             <button type="button" id="them_ncu" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style=" margin-left: 2.5%; margin-top: 5%;margin-bottom: 1%;">Thêm nhà cung ứng</button>
        <div class="form-row col-md-12" style="margin: 10px 0px;">
        <div class="form-group col-md-4">
            <input id="searchinput" class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search" style="display:inline-block; margin-left: 3%; width: 60%; font-size: 13px;">
            <button id="searchbtn" class="btn btn-outline-success" type="submit" name="submit" style="font-size: 13px;">Search</button>
        </div>
        </div>
            <table id="tablehienthi" class="table table-bordered table-striped" style="font-size: 15px;">
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Địa chỉ</th>                                        
                                        <th>Số điện thoại</th>
                                        <th>Sửa</th><!-- comment -->
                                         <th>Xóa</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   ?>
                                </tbody>
                            </table>
        </div>       
        
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Thêm nhà cung ứng</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
        
        <div >
    <form method="POST" enctype="multipart/form-data" action="../xuly/xulythem.php">
        <div class="themsp">        
         <br><label >Tên nhà cung ứng</label><br>
        <input type="text" name="name"  required="true">  <br><br>
        <label >Địa chỉ</label><br>
        <input type="text" name="address"  required="true"> <br><br>
         <label >SDT</label><br>
         <input type="text" name="sdt" required="true" > <br><br><br> 
         <button type="submit" class="btn btn-primary" name="sub3">Thêm</button>
         </div>
       
    </form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
        
<!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <div >
    <form method="POST" enctype="multipart/form-data" action="../xuly/xulysua.php">
       <input type="text" name="id" id="id" class="id" style="display: none;" class="form-controll" required ><br>
        <div class="themsp">
            Mã nhà cung ứng: <span id="id_ncu"></span><br><br>
          <label >Tên nhà cung ứng</label><br>
          
           <input type="text" name="name" id="name"  >  <br><br>
           <label >Địa chỉ</label><br>
          
           <input type="text" name="address" id="address"  >  <br><br>
     
         <label >SDT</label><br>
         
         <input type="text" name="sdt" id="sdt"  > <br><br>
     
   <br> <button type="submit" class="btn btn-primary" name="sub4">Sửa</button>
         </div>
    </form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal -->       
        <script type="text/javascript">
               function Del(id) {
                    return confirm("Bạn có chắc chắn muốn xóa nhà cung ứng có id là " + id + " ?");
                }
            $(document).ready(function(){
                function statusmacdinh(){
                    var searchinput = document.getElementById("searchinput").value;
                    guiajax(searchinput);
                }
                function guiajax(searchinput){
            
                    $.ajax({
                            method: 'post',
                            url: '../model/ajax_nhacungung.php',
                            datatype: "JSON",
                            data: {search: searchinput},
                            success: function(response){
                                var arrayObj = JSON.parse(response);
                                $("#tablehienthi").find('tbody').empty();
                                arrayObj.forEach(function (item,index){
                                    var row = $('<tr>');
                                    row.append('<td>' + item.id+'</td>');
                                    row.append('<td>' + item.name+'</td>');
                                    row.append('<td>' + item.address + '</td>');
                                    row.append('<td>' + item.phone + '</td>');
                                    row.append('<td>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="'+item.id+'">Sửa</button></td>');
                                    row.append('<td><a onclick="return Del('+item.id+')" href="../giaodien/xoa_nhacungung.php?id='+item.id+'" ><button class="btn btn-primary"> Xóa</button></a></td>');
                                    row.append('</tr>');
                                    $("#tablehienthi").find('tbody').append(row);
                                });
                                //console.log(arrayObj);
                            }
                    });
                }
                function search(){
                    var searchinput = document.getElementById("searchinput").value;
                    guiajax(searchinput);
                }
                statusmacdinh();
                document.getElementById("searchbtn").onclick = search;
                
            });
            
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
        $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.modal-title').text('Sửa thông tin nhà cung ứng');
   
       var xArrayObj = $.xResponse('../model/ajax_sua_nhacungung.php',{id: recipient});
       xArrayObj.forEach(function (item,index){   
         modal.find('#id_ncu').text(item.id);
         modal.find('#id').val(item.id);
         modal.find('#name').val(item.name);
        modal.find('#address').val(item.address);
        modal.find('#sdt').val(item.sdt);
                         });
    })
           </script> 
       
    </body>
     
</html>
 