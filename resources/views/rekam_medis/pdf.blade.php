<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rekam Medisku</title>
  <style>
    @page { margin: 0cm; }

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
      padding:0.5cm;
      background-color: rgb(255, 254, 150);
      width:20cm;
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
    <table>
      <tr>
        <td style='width:3cm;'>Nama Lengkap</td>
        <td style='width:6cm;'>: Christian Antonio Sadha</td>
        <td style='width:3cm;'>Jenis Kelamin</td>
        <td style='width:6cm;'>: Laki Laki</td>
      </tr>
      <tr>
        <td style='width:3cm;'>Tanggal Lahir</td>
        <td style='width:6cm;'>: 23 April 2001 (22 Tahun)</td>
        <td style='width:3cm;'>No. HP</td>
        <td style='width:6cm;'>: 082233574795</td>
      </tr>
    </table>
  </div>
  <table id='tabel' style='margin-top:0.5cm;'>
    <thead>
      <tr>
        <th style='width:3cm;'>Tanggal</th>
        <th style='width:3cm;'>Anamnesa</th>
        <th style='width:12cm;'>Diagnosis</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>20 Jun 2022</td>
        <td>Pemeriksaan Lutut</td>
        <td style="text-align:justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, officia maiores? Fugit labore nostrum obcaecati, dolor at corporis et quaerat doloribus voluptatem ab ducimus! Aliquid tenetur suscipit illum libero delectus.</td>
      </tr>
    </tbody>
  </table>
</body>
</html>
