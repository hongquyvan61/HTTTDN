<?php
include('../../TCPDF-main/tcpdf.php');
 session_start();
   include '../../connectdb/connect.php';
   $total=0;
   $id=$_GET['id'];
   $get=$_GET['loai'];
   class MYPDF extends TCPDF {
      
   public function LoadDatanhap($id) {
      
         $con = ketnoi();
         
         $sql="SELECT * FROM `chi_tiet_nhap_kho` WHERE ma_nhap_kho=$id;";
         $query=mysqli_query($con,$sql);
      return $query;
    }
    public function LoadDataxuat($id) {
      
         $con = ketnoi();
         
         $sql="SELECT * FROM `chi_tiet_xuat_kho` WHERE ma_xuat_kho=$id;";
         $query=mysqli_query($con,$sql);
      return $query;
    }
     public function LayDate($id,$get) {
      
         $con = ketnoi();
         if(strcmp($get, "nhapkho") == 0){
         $sql="SELECT ngay_gio_nhap_kho FROM `nhap_kho` WHERE ma_nhap_kho=$id;";
         $query=mysqli_query($con,$sql);
          foreach($query as $row) {
              $this->writeHTML("Ngay nhap kho: ".$row['ngay_gio_nhap_kho'], true, false, true, false, '');
          }
         }
         else{
           $sql="SELECT ngay_gio_xuat_kho FROM `xuat_kho` WHERE ma_xuat_kho=$id;";
         $query=mysqli_query($con,$sql);
          foreach($query as $row) {
              $this->writeHTML("Ngay xuat kho: ".$row['ngay_gio_xuat_kho'], true, false, true, false, '');
          }  
         }
    }
    
    public function ColoredTablenhap($header,$data,$total) {
      
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        
        
        // Header
        $w = array( 20,60, 30,35,35);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        $i=1;
        $total=0;
        foreach($data as $row) {
          $this->Cell($w[0], 6, $i, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6,$row['id_giay'] , 'LR', 0, 'C', $fill);
          $this->Cell($w[2], 6,$row['size'] , 'LR', 0, 'C', $fill);
          $this->Cell($w[3], 6,$row['so_luong_cua_size'] , 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6,$row['don_gia'] , 'LR', 0, 'C', $fill);
            $total+=$row['so_luong_cua_size']*$row['don_gia'];
            $this->Ln();
            $fill=!$fill;
            $i++;
        }
    
        $this->Cell(array_sum($w), 0, '', 'T');
           return $total;
    }
    public function ColoredTablexuat($header,$data,$total) {
      
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        
        
        // Header
        $w = array( 20,60, 30,35);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
       $i=1;
        $total=0;
        foreach($data as $row) {
          $this->Cell($w[0], 6,$i , 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6,$row['id_giay'] , 'LR', 0, 'C', $fill);
          $this->Cell($w[2], 6,$row['size'] , 'LR', 0, 'C', $fill);
          $this->Cell($w[3], 6,$row['so_luong_cua_size'] , 'LR', 0, 'C', $fill);
            $total+=$row['so_luong_cua_size']*$row['don_gia'];
            $this->Ln();
            $fill=!$fill;
            $i++;
        }
    
        $this->Cell(array_sum($w), 0, '', 'T');
           return $total;
    }
   }
   $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('áa');
$pdf->SetTitle('In phieu');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, abc, test, hhhhh');
$pdf->setPrintHeader(true   );
$pdf->setPrintFooter(true);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'HTVC Shop');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();
 if(strcmp($get, "nhapkho") == 0){
// column titles
$header = array('STT','Ma san pham','Size','So luong','Don gia');
// data loading
$data = $pdf->LoadDatanhap($id);
$total1 = $pdf->ColoredTablenhap($header, $data,$total);
$pdf->writeHTML("<br>", true, false, true, false, '');
$pdf->writeHTML("<h3>Tong cong: ".$total1, true, false, true, false, '');
$html='<h4 style=" margin-top:70px;">Kí tên</h4>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('phieu_nhap '.$id.'.pdf', 'I');
 }
 else {
     $total="";
     $header = array('STT','Ma san pham','Size','So luong');
// data loading
$data = $pdf->LoadDataxuat($id);
$total1 = $pdf->ColoredTablexuat($header, $data,$total);
$html='<h4 style=" margin-top:70px;">Kí tên</h4>';
$pdf->writeHTML("<br><br><br><br>", true, false, true, false, '');
$pdf->LayDate($id, $get);
$pdf->writeHTML($html, true, false, true, false, '');

//$pdf->writeHTML("<br>", true, false, true, false, '');
$pdf->Output('phieu_xuat '.$id.'.pdf', 'I');
}
   ?>