<h2>Transaksi</h2>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Input transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="<? base_url('home/dashboard')?>">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
  <form action="/home/input_transaksi" method="POST">
    <table>
      <tr>
        <td>Kode transaksi</td>
       <td><input type="text" class="form-control" name="kode"  value="<?= $marah->kode_transaksi?>"></td>
      </tr>
      <tr>
        <td>tanggal transaksi</td>
        <td><input type="date" class="form-control" name="tanggal"  value="<?= $marah->tanggal_transaksi?>"></td>
      </tr>
            <tr>
        <td>Harga per Barang</td>
        <td><input type="text" class="form-control" name="harga_per"  value="<?= $marah->harga_per?>"></td>
      </tr>
      <tr>
        <td>Harga Total</td>
        <td><input type="text" class="form-control" name="harga_total"  value="<?= $marah->harga_total?>"></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td><input type="text" class="form-control" name="jumlah"  value="<?= $marah->jumlah?>"></td>
      </tr>
       <tr>
        <td>Nomor Nota</td>
        <td><input type="text" class="form-control" name="nomor_nota"  value="<?= $marah->nomor_nota?>"></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" value="Simpan">
          <input type="reset" value="Reset">
          <input type="button" value="Kembali">
            
        </td>
      </tr>
    </table>

</body>
</html>

                    </div>
                </div>
            </div>
        </div>
            </div>
    </section>

</main><!-- End #main -->