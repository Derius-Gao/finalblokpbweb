<main id="main" class="main">

    <div class="pagetitle">
        <h1>Table Barang Masuk</h1>
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

                        <!-- Table with stripped rows -->
                        <button class="btn btn-success mb-3">
                            <i class="bi bi-plus-lg"></i>
                            <a href="/home/inputbrgm" class="text-white">Tambah</a>
                        </button>
                         <div class="datatable-dropdown">
            <label>
                <select class="datatable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page
            </label>
        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="3%">#</th>
                                     <th scope="col">Nomor Barang</th>
                                    <th scope="col">Nama Barang</th>
                                     <th scope="col">Tanggal diterima</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ms = 1;
                                foreach ($marah as $key => $value) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><?= $value->id_barang ?></td>
                                    <td><?= $value->nama_barang ?></td>
                                    <td><?= $value->tanggal_diterima ?></td>
                                    <td><?= $value->jumlah ?></td>
                                    <td>
                                        <a href="<?= base_url('home/editbrgm/' .$value->id_barang)?>">
              <button class="btn btn-info">
              <i class="fas fa-info-circle"></i>
              Detail
            </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->