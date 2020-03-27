<?php

$hari = array(
  1 =>    'Senin',
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
if (isset($this->session->tanggal_dari) && isset($this->session->tanggal_samp)) {
  $tanggal_dari = $this->session->tanggal_dari;
  $tanggal_samp = $this->session->tanggal_samp;
} else {
  $tanggal_dari = date('Y-m-d');
  $tanggal_samp = date('Y-m-d');
}

if (isset($this->session->tanggal_dari) && isset($this->session->tanggal_samp)) {
  $tanggal = tanggal_indo(date('d-m-Y', strtotime($tanggal_dari))) . ' - ' . tanggal(date('d-m-Y', strtotime($tanggal_samp)));
} else {
  $tanggal = tanggal(date('d-m-Y'));
}
?>
<link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

<body>
  <style>
    .bold {
      font-weight: bold;
    }

    .solid {
      border: 1px solid black
    }

    .ntb {
      border-right: 1px solid black;
      border-left: 1px solid black;
    }

    .kanan {
      border-right: 1px solid black;
    }

    .kiri {
      border-left: 1px solid black;
    }

    .atas {
      border-top: 1px solid black;
    }

    .bawah {
      border-bottom: 1px solid black;
    }

    .dashed {
      border-bottom: 2px dashed;
    }

    .putih {
      color: white;
    }

    #watermark {
      position: fixed;
      /* float: left; */

      /** 
                    Set a position in the page for your image
                    This should center it vertically
                **/
      bottom: 17cm;
      left: -3cm;

      /** Change image dimensions**/
      width: 8cm;
      height: 8cm;

      /** Your watermark should be behind every content**/
      z-index: -1;
      opacity: 0.5;
    }

    .table tbody {
      background: rgba(255, 255, 255, 0.8) !important;
    }

    .footer {
      position: fixed;
      bottom: 1px;
    }
  </style>
  <div id="watermark">
    <img src="img/logo_e-astur2.png" height="300%" />
  </div>
  <small class="footer"><i>Powered By TheCroc27...</i></small>
  <div class="card-body">
    <div class="table-responsive">
      <div class="img">
        <img style="float: left" src="<?= base_url('img/header_e-astur.png') ?>" width="665">
      </div>
      <div style="height: 140px;"></div>
      <table width="100%">
        <tr>
          <td width="13%"></td>
          <td width="2%"></td>
          <td width="85%"></td>
        </tr>
        <tr>
          <td class="putih" style="font-size: 15px; font-weight:bold;">Periode</td>
          <td class="putih" style="font-size: 15px; font-weight:bold;">:</td>
          <td class="putih" style="font-size: 15px; font-weight:bold;"><?= $tanggal ?></td>
        </tr>
        <tr>
          <td colspan="3" style="border-bottom: 4px solid black;"></td>
        </tr>
        <tr>
          <td colspan="3"> </td>
        </tr>
      </table>
      <br>
      <table class="table table-bordered table-sm" width="100%" cellspacing="0">
        <tr style="background-color:#99ccff;color:#000000; font-weight:bold">
          <td align="center" width="4%">No</td>
          <td align="center" width="28%">Tanggal</td>
          <td align="center" width="10%">Kelas</td>
          <td align="center" width="7%">SKS</td>
          <td align="center" width="24%">Astur</td>
          <td align="center" width="28%">Jam</td>
        </tr>
        <tbody>
          <?php
          $no = 1;
          foreach ($absen as $item) {
          ?>
            <tr>
              <td align="center" width="4%"><?= $no++ ?></td>
              <td align="center" width="23%"><?= $hari[date('N', strtotime($item->tanggal))] ?> <?= tanggal(date('d-m-Y', strtotime($item->tanggal))) ?></td>
              <td align="center" width="10%"><?= $item->kelas ?></td>
              <td align="center" width="7%"><?= $item->sks ?></td>
              <td width="36%"> <?= $item->nama ?></td>
              <td align="center" width="20%"><?= $item->mulai ?> / <?= $item->selesai ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div style="height: 50px; width: 100%;" class="bawah dashed">&nbsp;</div><br>
      <table class="table table-bordered table-sm" width="100%" cellspacing="0" border="1">
        <tr>
          <td colspan="3" align="center" style="background-color:#4145c7;color:white;font-weight: bold;">Total SKS</td>
        </tr>
        <tr style="background-color:#fee8a3;font-weight: bold;">
          <td align="center" width="4%">No</td>
          <td align="center" width="70%">Nama Astur</td>
          <td align="center" width="26%">Jumlah SKS</td>
        </tr>
        <tbody>
          <?php
          $ni = 1;
          foreach ($sks as $item) {
          ?>
            <tr>
              <td align="center" width="4%"><?= $ni++ ?></td>
              <td width="70%"> <?= $item->nama ?></td>
              <td align="center" width="26%"><?= $item->sks ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>