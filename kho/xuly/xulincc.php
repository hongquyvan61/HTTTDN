<table id="tablehienthi" class="table table-bordered table-striped" style="font-size: 15px;">
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Địa chỉ</th>
                                        
                                        <th>Số điện thoại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   ?>
                                </tbody>
</table>
<div class="form-row">
    <div class="form-group col-md-2">
      <label style="font-size: 15px; font-weight: bold;" for="sortthang">Tháng: </label>
      <select style="font-size: 13px;" id="sortthang" class="form-control">
          <option value="--" selected="true">--</option>
          <option value="1" >Tháng 1</option>
          <option value="2" >Tháng 2</option>
          <option value="3" >Tháng 3</option>
          <option value="4" >Tháng 4</option>
          <option value="5" >Tháng 5</option>
          <option value="6" >Tháng 6</option>
          <option value="7" >Tháng 7</option>
          <option value="8" >Tháng 8</option>
          <option value="9" >Tháng 9</option>
          <option value="10" >Tháng 10</option>
          <option value="11" >Tháng 11</option>
          <option value="12" >Tháng 12</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label style="font-size: 15px; font-weight: bold;" for="sorttype">Loại: </label>
      <select style="font-size: 13px;" id="sorttype" class="form-control">
          <option value="--" selected="true">--</option>
          <option value="nhapkho" >Nhập kho</option>
          <option value="xuatkho" >Xuất kho</option>
      </select>
    </div>
    <div class="form-group col-md-1" style="display: flex; align-items:center; justify-content: center; padding-top: 2.5%;">
       <button id="locbaocao" class="btn btn-primary" style="width:100%; height:100%; font-size: 15px;">Lọc</button>
    </div>
</div>
<table id="tablebaocao" class="table table-bordered table-striped" style="font-size: 15px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Tên NCC</th>
                                        <th id="tongslhangnhap">Tổng lượng hàng nhập theo tháng</th>
                                        <th>Tổng chi phí nhập</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
</table>

