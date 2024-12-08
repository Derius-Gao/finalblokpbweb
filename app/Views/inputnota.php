<h2>Nota</h2>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Input nota</h1>
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
  <form action="/home/input_nota" method="POST">
    <table>
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