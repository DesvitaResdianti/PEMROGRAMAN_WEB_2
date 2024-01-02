<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    body h5 {
      te
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 750px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <form action="proses_pendaftaran.php" method="post">
    <h5>FORMULIR PENDAFTARAN</h5>
    <br>
    <label for="id_mahasiswa">ID Mahasiswa:</label>
    <input type="text" id="id_mahasiswa" name="id_mahasiswa" required>

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select id="jenis_kelamin" name="jenis_kelamin" required>
      <option value="pria">Pria</option>
      <option value="wanita">Wanita</option>
    </select>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" rows="4" required></textarea>


    <label for="jurusan">Jurusan:</label>
    <input type="text" id="jurusan" name="jurusan" required>

    <label for="jenis_kelamin">Minat</label>
    <select id="jenis_kelamin" name="jenis_kelamin" required>
      <option value="progreming">Prongreming</option>
      <option value="animasi">Animasi</option>
      <option value="desain">Desain</option>
      <option value="mapala">Mapala</option>
    </select>

    

    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" accept="image/*" required>

    <button type="submit">Daftar</button>
    <button type="submit">Batal</button>

    </select>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>