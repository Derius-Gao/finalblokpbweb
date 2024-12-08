<h2>Edit Karyawan</h2>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Nota</h1>
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
<div class="container mt-3">
  <form action="<?= base_url('home/simpan_nota') ?>" method="post">
    <div class="ml-3">
      <label for="harga_per ">Harga per :</label>
      <input type="text " class="form-control" id="harga_per" placeholder="Enter harga_per " name="harga_per" value="<?=$marah->harga_per?>">
    </div>
    <div class="mp-3">
      <label for="harga_total">Harga total :</label>
      <input type="text" class="form-control" id="harga_total" placeholder="Enter harga_total" name="harga_total" value="<?= $marah->harga_total?>">
    </div>
    <div class="mq-3">
      <label for="Jumlah">Jumlah :</label>
      <input type="text" class="form-control" id="Jumlah" placeholder="Enter Jumlah" name="jumlah" value="<?= $marah->jumlah?>">
    </div>
     <div class="ml-3">
      <label for="nomor_nota">Nomor Nota :</label>
      <input type="text" class="form-control" id="nomor_nota" placeholder="Enter nomor_nota" name="nomor_nota" value="<?= $marah->nomor_nota?>">
    </div>
   <tr>
      <td></td>
      <td><input type="hidden" name="id" value="<?= $marah->id_nota ?>">
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="<?= base_url('home/hapus_nota/'.$marah->id_nota) ?>" class="btn btn-danger">Hapus </a>
        <!-- <input type="reset" value="reset" class="form-control">
        <input type="button" value="kembali" class="form-control"> -->
      </td>
    </tr>
  </form>
</div>

   </div>
                </div>
            </div>
        </div>
            </div>
    </section>

</main><!-- End #main -->
</table>