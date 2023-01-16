<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inventory</title>
  <style>
    @page { margin: 1cm 0.5cm; }

    #tabel {
      width: 18cm;
      border: 2px solid black;
      border-collapse: collapse;
      text-align: center;
    }
    #tabel td,
    #tabel th {
      border: 2px solid black;
      height:0.5cm;
      padding-right: 0.2cm;
      padding-left: 0.2cm;
      word-wrap:break-word;
    }

    body{
      background-color: rgb(255, 254, 150);
      width:19cm;
      height:32cm;
      font-family:Arial, Helvetica, sans-serif;
    }
  </style>
</head>
<body>
  <div style="width:100%;text-align:left;">
    <h4 style='margin-top:0;padding-top:0;'>
      REKAM MEDISKU
    </h4>
  </div>
  <table id='tabel'>
    <thead>
      <tr>
        <th style='width:1cm;'>NO.</th>
        <th style='width:15cm;'>NAMA BARANG</th>
        <th style='width:3cm;'>STOK</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</body>
</html>
