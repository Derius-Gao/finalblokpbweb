<h2>Barang Masuk</h2>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Input barang Masuk</h1>
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
<h2>Barang Masuk</h2>
<form action="/home/input_barangm" method="POST">
    <div class="mb-3 mt">
        <label for="jumlah" class="form-label">Jumlah Barang: </label>
        <input type="text" placeholder="Jumlah Barang" class="form-control" name="jumlah">
    </div>
    <div class="mb-3 mt">
        <label for="tanggal_diterima" class="form-label">Tanggal Diterima: </label>
        <input type="date" placeholder="masukkan tanggal" class="form-control" name="tanggal_diterima">
    </div>
    <div class="mb-3 mt">
        <label for="name" class="form-label">Nama Barang: </label>
        <select class="form-control" name="nama_barang">
            <option>Pilih Barang</option>
            <?php foreach ($marah as $value): ?>
                <option value="<?= $value->nama_barang ?>"><?= $value->nama_barang ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3 mt">
        <label for="kode_barang" class="form-label">Kode Barang: </label>
        <input type="text" placeholder="masukkan kode" class="form-control" name="kode_barang">
    </div>
    <div class="mb-3 mt">
        <label for="stok" class="form-label">Stok: </label>
        <input type="text" placeholder="masukkan stok" class="form-control" name="stok">
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan">
        <input type="reset" value="Reset">
        <input type="button" value="Kembali" onclick="window.history.back()">
    </div>
</form>
</body>
</html>
       </div>
                </div>
            </div>
        </div>
            </div>
    </section>

</main><!-- End #main -->