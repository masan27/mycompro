<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Rekap Absensi');
$pdf->SetHeaderMargin();
$pdf->setFooterMargin(0);
// $pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
// $pdf->setPrintHeader(false);

$pdf->AddPage();

$hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);

$sekarang = $hari[date('N')];

function tanggal_indo($tanggal)
{
  $bulan = array(
    1 =>   'Jan',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Jun',
    'Jul',
    'Agu',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $split = explode('-', $tanggal);
  return $split[0] . ' ' . $bulan[(int) $split[1]];
}

function tanggal($tanggal)
{
  $bulan = array(
    1 =>   'Jan',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Jun',
    'Jul',
    'Agu',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $split = explode('-', $tanggal);
  return $split[0] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[2];
}

//tanggal
if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
  $tgl_dari = $_REQUEST['tgl_dari'];
  $tgl_samp = $_REQUEST['tgl_samp'];
} else {
  $tgl_dari = date('Y-m-d');
  $tgl_samp = date('Y-m-d');
}

if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
  $tgl = tanggal_indo(date('d-m-Y', strtotime($tgl_dari))) . ' - ' . tanggal(date('d-m-Y', strtotime($tgl_samp)));
} else {
  $tgl = tanggal(date('d-m-Y'));
}

$html = '<link href="' . base_url('css/sb-admin-2.min.css') . '" rel="stylesheet">
        <style>
        .bold {font-weight : bold;}
        .solid {border: 1px solid black}        
        .ntb {
            border-right : 1px solid black;						
            border-left: 1px solid black;
        }     
        .kanan {border-right: 1px solid black;}
        .kiri {border-left: 1px solid black;}
        .atas {border-top: 1px solid black;}
        .bawah{border-bottom: 1px solid black;}     
        .putih {color: white;}   	
        </style>
        <div class="card-body">
            <div class="table-responsive">';
// <div class="img">
//     <img src="'.base_url('img/header.png').'">
// </div>
$html .= '            
            <table width="100%">
                <tr>
                    <td width="13%"></td>
                    <td width="2%"></td>
                    <td width="85%"></td>				
                </tr>
                <tr><td colspan="3"> </td></tr>
                <tr><td colspan="3"> </td></tr>
                <tr><td colspan="3"> </td></tr>
                <tr><td colspan="3"> </td></tr>
                <tr><td colspan="3"> </td></tr>
                <tr><td colspan="3"> </td></tr>
                <tr><td colspan="3"> </td></tr>
                <tr>
                    <td class="putih" style="font-size: 13px; font-weight:bold;">Periode</td>
                    <td class="putih" style="font-size: 13px; font-weight:bold;">:</td>				
                    <td class="putih" style="font-size: 13px; font-weight:bold;">' . $tgl . '</td>
                </tr>        
                <tr><td colspan="3" style="border-bottom: 4px solid black;"></td></tr>
                <tr><td colspan="3"> </td></tr>
            </table>            
            <br>
            <table class="table table-bordered table-striped table-sm" width="100%" cellspacing="0" border="1">
                <thead class="kanan kiri atas bawah">
                <tr style="background-color:#99ccff;color:#000000; font-weight:bold">
                      <td align="center" width="4%">No</td>
                      <td align="center" width="23%">Tanggal</td>
                      <td align="center" width="10%">Kelas</td>
                      <td align="center" width="7%">SKS</td>
                      <td align="center" width="36%">Astur</td>
                      <td align="center" width="20%">Jam</td>
                </tr>                    
                </thead>
                <tbody>';
$no = 1;
foreach ($absen as $item) {
  $html .= '               
                  <tr>     
                    <td align="center" width="4%">' . $no++ . '</td>
                    <td align="center" width="23%" >'. $hari[date('N', strtotime($item->tanggal))]. ' ' . tanggal(date('d-m-Y', strtotime($item->tanggal))) . '</td>
                    <td align="center" width="10%" >' . $item->kelas . '</td>
                    <td align="center" width="7%">' . $item->sks . '</td>
                    <td width="36%"> ' . $item->nama . '</td>
                    <td align="center" width="20%">' . $item->mulai . ' / ' . $item->selesai . '</td>
                  </tr>';
}
$html .= '                    
                </tbody>                
            </table>            
            <div style="height: 500px; width: 100%;" class="bawah">&nbsp;</div><br>            
            <table class="table table-bordered table-striped table-sm" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <td colspan="3" align="center" style="background-color:#4145c7;color:white;font-weight: bold;">Total SKS</td>
                </tr>
                <tr style="background-color:#fee8a3;font-weight: bold;">
                  <td align="center" width="4%">No</td>
                  <td align="center" width="70%">Nama Astur</td>
                  <td align="center" width="26%">Jumlah SKS</td>
                </tr>
              </thead> 
              <tbody>';
$ni = 1;
foreach ($sks as $item) {
  $html .= '                                        
                <tr>
                  <td align="center" width="4%">' . $ni++ . '</td>
                  <td width="70%"> ' . $item->nama . '</td>
                  <td align="center" width="26%">' . $item->sks . '</td>
                </tr>';
}
$html .= '                  
              </tbody>
            </table> 
          </div>
        </div>';

$pdf->writeHTML($html, true, true, true, false, '');

function tanggal_indo1($tanggal)
{
  $bulan = array(
    1 =>   'Jan',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Jun',
    'Jul',
    'Agu',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $split = explode('-', $tanggal);
  return $split[0] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[2];
}

//tanggal
if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
  $tgl_dari = $_REQUEST['tgl_dari'];
  $tgl_samp = $_REQUEST['tgl_samp'];
} else {
  $tgl_dari = date('Y-m-d');
  $tgl_samp = date('Y-m-d');
}

if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
  $tgl = tanggal_indo(date('d-m-Y', strtotime($tgl_dari))) . ' s/d ' . tanggal_indo1(date('d-m-Y', strtotime($tgl_samp)));
} else {
  $tgl = tanggal_indo1(date('d-m-Y'));
}
$pdf->Output('Rekap e-Astur ' . $tgl . '.pdf', 'I');
