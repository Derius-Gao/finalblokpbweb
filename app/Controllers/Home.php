<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;
use App\Models\M_der;

class Home extends BaseController
{
	public function index()
	{
		echo view('welcome_message');
	}
    public function login()
    {
        echo view ('pages-login');
    }
     public function aksi_login()
    {
        $a=$this->request->getpost('email');
          $b=$this->request->getpost('pswd');   

          $Joyce = new M_der;
          $data = array(
            'username' => $a,
            'password' => md5($b),
          );

          $cek = $Joyce->getWhere('user',$data);

         if ($cek != null) {
          session()->set('id',$cek->id_user);
          session()->set('u',$cek->username);
          session()->set('level',$cek->level);
          return redirect()->to('home/dashboard');
        }else{
          return redirect()->to('home/login');
         }
    }
    public function logout()
    {
      session()->destroy();
      return redirect()->to('home/login');
    }
    public function dashboard()
    {
      if (session()->get('level')==1) {
      echo view ('surga.php');
      echo view ('menu.php');
      echo view ('dashboard.php');
        echo view ('neraka.php');
      }else if (session()->get('level')==2) {
        echo view ('surga2.php');
      echo view ('menu.php');
      echo view ('dashboard.php');
        echo view ('neraka.php');
        }else if (session()->get('level')==3) {
        echo view ('surga3.php');
      echo view ('menu.php');
      echo view ('dashboard.php');
        echo view ('neraka.php');
         }else if (session()->get('level')==4) {
        echo view ('surga4.php');
      echo view ('menu.php');
      echo view ('dashboard.php');
        echo view ('neraka.php');
         }else if (session()->get('level')==5) {
        echo view ('surga5.php');
      echo view ('menu.php');
      echo view ('dashboard.php');
        echo view ('neraka.php');
        }else{
          return redirect()->to('home/login');
      }
    }
      public function user()
    {
       if (session()->get('level')==1) {
        $Joyce= new M_der;
        $wendy['marah']=$Joyce->join('user', 'karyawan',
         'user.id_user=karyawan.id_user');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampiluser.php',$wendy);
        echo view ('neraka.php');
         }else if (session()->get('level')>0){
        return redirect()->to('home/error');
      }else{
        return redirect()->to('home');
      }
    }
    public function tampilserah()
    {
      $Joyce= new M_der;
        $wendy['marah']=$Joyce->eltampil('serah');
      echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampilserah',$wendy);
        echo view ('neraka.php');
    }
    public function usr()
    {
       if (session()->get('level')==1) {
        $Joyce= new M_der;
        $wendy['marah']=$Joyce->tampil('user');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('reset.php',$wendy);
        echo view ('neraka.php');
         }else if (session()->get('level')>0){
        return redirect()->to('home/error');
      }else{
        return redirect()->to('home');
      }
    }
   public function lbarang()
    {
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('lbarang.php');
        echo view ('neraka.php');
    }
   public function lbarangm()
    {
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('lbarangm.php');
        echo view ('neraka.php');
    }
    public function lbarangm_1()
    {
      $Joyce= new M_der;
       $a=$this->request->getPost('tanggal_awal');
      $b=$this->request->getPost('tanggal_akhir');

        $wendy['marah']=$Joyce->filter('barang_masuk','barang','barang_masuk.id_barang=barang.id_barang','tanggal_diterima >=','tanggal_diterima <=', $a, $b);
        echo view ('laporan_bm.php',$wendy);
    }
    public function excellapor_bm()
{
    $Joyce = new M_der;
    $a=$this->request->getPost('tanggal_awal3');
    $b=$this->request->getPost('tanggal_akhir3'); //ambil dari string input
    $wendy['marah']=$Joyce->filter('barang_masuk','barang','barang_masuk.id_barang=barang.id_barang','tanggal_diterima >=','tanggal_diterima <=', $a, $b);
    echo view ('laporan_bm2.php',$wendy);
}
 public function pdflapor_bm()
{
    $Joyce = new M_der;
    $a=$this->request->getPost('tanggal_awal2');
    $b=$this->request->getPost('tanggal_akhir2'); //ambil dari string input
    $wendy['marah']=$Joyce->filter('barang_masuk','barang','barang_masuk.id_barang=barang.id_barang','tanggal_diterima >=','tanggal_diterima <=', $a, $b);
    $pdf = new TCPDF();

    // Setel metadata dasar PDF
    $pdf->SetCreator('TCPDF');
    $pdf->SetAuthor('Nama Anda');
    $pdf->SetTitle('Laporan Barang Masuk');
    $pdf->SetSubject('Laporan PDF');
    $pdf->SetKeywords('TCPDF, PDF, laporan, barang, masuk');

    // Atur halaman PDF
    $pdf->AddPage();

    // Load view and capture output
    $html = view('laporan_bm3', ['marah' => $wendy]);

    // Render HTML ke PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output file PDF
    $pdf->Output('laporan_barang_masuk.pdf', 'D'); // 'D' untuk download, 'I' untuk menampilkan di browser
}
     public function lbarang_1()
    {
      $Joyce= new M_der;
        $where=('id_barang');
        $wendy['marah']=$Joyce->tampil('barang',$where);
        echo view ('laporan_barang.php',$wendy);
    }
    public function lbarangk_1()
    {
      $Joyce= new M_der;
       $a=$this->request->getPost('tanggal_awal');
      $b=$this->request->getPost('tanggal_akhir');

        $wendy['marah']=$Joyce->filter('barang_keluar','barang','barang_keluar.id_barang=barang.id_barang','tanggal_keluar >=','tanggal_keluar <=', $a, $b);
        echo view ('laporan_bk.php',$wendy);
    }
        public function excellapor_bk()
{
    $Joyce = new M_der;
    $a=$this->request->getPost('tanggal_awal3');
    $b=$this->request->getPost('tanggal_akhir3'); //ambil dari string input
    $wendy['marah']=$Joyce->filter('barang_keluar','barang','barang_keluar.id_barang=barang.id_barang','tanggal_keluar >=','tanggal_keluar <=', $a, $b);
    echo view ('laporan_bk2.php',$wendy);
}
 public function pdflapor_bk()
{
    $Joyce = new M_der;
    $a=$this->request->getPost('tanggal_awal2');
    $b=$this->request->getPost('tanggal_akhir2'); //ambil dari string input
    $wendy['marah']=$Joyce->filter('barang_keluar','barang','barang_keluar.id_barang=barang.id_barang','tanggal_keluar >=','tanggal_keluar <=', $a, $b);
    $pdf = new TCPDF();

    // Setel metadata dasar PDF
    $pdf->SetCreator('TCPDF');
    $pdf->SetAuthor('Nama Anda');
    $pdf->SetTitle('Laporan Barang Keluar');
    $pdf->SetSubject('Laporan PDF');
    $pdf->SetKeywords('TCPDF, PDF, laporan, barang, keluar');

    // Atur halaman PDF
    $pdf->AddPage();

    // Load view and capture output
    $html = view('laporan_bk3', ['marah' => $wendy]);

    // Render HTML ke PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output file PDF
    $pdf->Output('laporan_barang_keluar.pdf', 'D'); // 'D' untuk download, 'I' untuk menampilkan di browser
}
 public function profil()
    {
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('profil.php');
        echo view ('neraka.php');
    }
    public function profil2()
    {
        echo view ('surga2.php');
        echo view ('menu.php');
        echo view ('profil2.php');
        echo view ('neraka.php');
    }
    public function profil3()
    {
        echo view ('surga2.php');
        echo view ('menu.php');
        echo view ('profil3.php');
        echo view ('neraka.php');
    }
    public function lbarangk()
    {
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('lbarangk.php');
        echo view ('neraka.php');
    }
      public function barang()
    {
      if (session()->get('id')>0) {
        $Joyce= new M_der;
        $where=('id_barang');
        $wendy['marah']=$Joyce->tampil('barang',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampilbarang.php',$wendy);
        echo view ('neraka.php');
        }else{
        return redirect()->to('home/login');
      }
    }
      public function inputbrg()
    {
        $Joyce= new M_der;
        $where=('id_barang');
        $wendy['marah']=$Joyce->tampil('barang',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('Inputbarang.php',$wendy);
        echo view ('neraka.php');
    }
    public function inputbrgm()
    {
        $Joyce= new M_der;
        $where=('id_barang');
        $wendy['marah']=$Joyce->tampil('barang',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('Inputbarangmasuk.php',$wendy);
        echo view ('neraka.php');
    }
     public function inputbrgk()
    {
        $Joyce= new M_der;
        $where=('id_barang');
        $wendy['marah']=$Joyce->tampil('barang',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('Inputbarangkeluar.php',$wendy);
        echo view ('neraka.php');
    }
     public function barangmasuk()
    {
      if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==5
  || session()->get('level')==3 ) {
        $Joyce= new M_der;
        $wendy['marah']= $Joyce->join('barang_masuk', 'barang',
         'barang_masuk.id_barang=barang.id_barang');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampilbarangmasuk.php',$wendy);
        echo view ('neraka.php');
        }else if (session()->get('level')>0){
        return redirect()->to('home/error');
      }else{
        return redirect()->to('home');
      }
    }
     public function barangkeluar()
    {
      if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4 ||session()->get('level')==3 ) {
        $Joyce= new M_der;
        $wendy['marah']= $Joyce->join('barang_keluar', 'barang', 'barang_keluar.id_barang=barang.id_barang');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampilbarangkeluar.php',$wendy);
        echo view ('neraka.php');
        }else if (session()->get('level')>0){
        return redirect()->to('home/error');
      }else{
        return redirect()->to('home');
      }
    }
   public function input_barang()
   {
            $Joyce= new M_der;
           $data = array (         
            'nama_barang'=> $this->request->getPost('nama'),
           'kode_barang'=> $this->request->getPost('kode_barang'),
            'stok'=> $this->request->getPost('stok'),
           );

           $Joyce->input('barang',$data);
           return redirect()->to('/home/barang');
   }
   public function hapus_barangm($id){
if (session()->get('level')==1 || session()->get('level')==3) {
        $Joyce= new M_der;
        $wece= array('id_barang' => $id);
         $Joyce->hapus('barang_masuk', $wece);
         $Joyce->hapus('barang', $wece);
        return redirect()->to('home/barangmasuk');
}else if (session()->get('level')>0){
        return redirect()->to('home/error');
      }else{
        return redirect()->to('home');
      }
    }
    public function editbrgm($id)
    {
        $Joyce= new M_der;
        $wece=array('barang_masuk.id_barang' => $id);
        $wendy['marah']=$Joyce->joinw('barang_masuk', 'barang', 'barang_masuk.id_barang=barang.id_barang',$wece);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('editbrgm.php',$wendy);
        echo view ('neraka.php');
    }
    public function simpan_barangm()
    {
      $n=$this->request->getPost('tanggal_diterima');
      $p=$this->request->getPost('jumlah');
      $l=$this->request->getPost('nama_barang');
       $b=$this->request->getPost('kode_barang');
        $c=$this->request->getPost('stok');
        $id=$this->request->getPost('id');

        $where=array(
          "id_barang"=>$id);
        $Joyce= new M_der;
         $data1=array(
         "nama_barang"=>$l,
          "kode_barang"=>$b,
           "stok"=>$c
        );
         $Joyce->edit('barang',$data1,$where);

   $where = array(
        "nama_barang" => $l,
    );
    $wendy = $Joyce->getWhere('barang', $where);
    $data2 = array(
       "id_barang" => $wendy->id_barang,
         "tanggal_diterima"=>$n, 
         "jumlah"=>$p
        );
        print_r($where);
        $Joyce->edit('barang_masuk',$data2,$where);
        return redirect()->to('home/barangmasuk');      
      }
   public function input_barangm()
{
    $a = $this->request->getPost('tanggal_diterima');
    $b = $this->request->getPost('jumlah');
    $c = $this->request->getPost('nama_barang');
    $d = $this->request->getPost('kode_barang');
    $e = $this->request->getPost('stok');
    $Joyce = new M_der;
    $data = array(
        "nama_barang" => $c,
        "kode_barang" => $d,
        "stok" => $e
    );
    $Joyce->input('barang', $data);
     $where = array(
        "nama_barang" => $c,
    );
    $wendy = $Joyce->getWhere('barang', $where);
    $data2 = array(
       "id_barang" => $wendy->id_barang,
        "tanggal_diterima" => $a,
        "jumlah" => $b
    );
    $Joyce->input('barang_masuk', $data2);
    return redirect()->to('home/barangmasuk');
}
   public function hapus_barangk($id){
if (session()->get('level')==1 || session()->get('level')==3) {
        $Joyce= new M_der;
        $wece= array('id_barang' => $id);
         $Joyce->hapus('barang_keluar', $wece);
         $Joyce->hapus('barang', $wece);
        return redirect()->to('home/barangkeluar');
}else if (session()->get('level')>0){
        return redirect()->to('home/error');
      }else{
        return redirect()->to('home');
      }
    }
    public function editbrgk($id)
    {
        $Joyce= new M_der;
        $wece=array('barang_keluar.id_barang' => $id);
        $wendy['marah']=$Joyce->joinw('barang_keluar', 'barang', 'barang_keluar.id_barang=barang.id_barang',$wece);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('editbrgk.php',$wendy);
        echo view ('neraka.php');
    }
    public function simpan_barangk()
    {
      $n=$this->request->getPost('tanggal_keluar');
      $p=$this->request->getPost('jumlah');
      $l=$this->request->getPost('nama_barang');
       $b=$this->request->getPost('kode_barang');
        $c=$this->request->getPost('stok');
        $id=$this->request->getPost('id');

        $where=array(
          "id_barang"=>$id);
        $Joyce= new M_der;
         $data1=array(
         "nama_barang"=>$l,
          "kode_barang"=>$b,
           "stok"=>$c
        );
         $Joyce->edit('barang',$data1,$where);


        $data2=array(
         "tanggal_keluar"=>$n, 
         "jumlah"=>$p
        );
        print_r($where);
        $Joyce->edit('barang_keluar',$data2,$where);
        return redirect()->to('home/barangkeluar');      
      }
    public function input_barangk()
{
    $a = $this->request->getPost('tanggal_keluar');
    $b = $this->request->getPost('jumlah');
    $c = $this->request->getPost('nama_barang');
    $d = $this->request->getPost('kode_barang');
    $e = $this->request->getPost('stok');

    $Joyce = new M_der;
    $data = array(
        "nama_barang" => $c,
        "kode_barang" => $d,
        "stok" => $e
    );
    $Joyce->input('barang', $data);

    $where = array(
        "nama_barang" => $c,
    );
    $wendy = $Joyce->getWhere('barang', $where);
    $data2 = array(
        "id_barang" => $wendy->id_barang,
        "tanggal_keluar" => $a,
        "jumlah" => $b
    );
    $Joyce->input('barang_keluar', $data2);
    return redirect()->to('home/barangkeluar');
}
    public function karyawan()
    {
    if (session()->get('level')==1) { 
        $Joyce= new M_der;
        $wendy['marah']=$Joyce->join('karyawan', 'user', 'karyawan.id_user=user.id_user');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampilkaryawan.php',$wendy);
        echo view ('neraka.php');      
      }else{
        return redirect()->to('home');
      }
    }
     public function inputkaryawan()
    {
        $Joyce= new M_der;
        $where=('id_user');
        $wendy['marah']=$Joyce->tampil('user',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('inputkaryawan.php',$wendy);
        echo view ('neraka.php');
    }
    public function hapus_karyawan($id){
        $Joyce= new M_der;
        $wece= array('id_user' => $id);
         $Joyce->hapus('karyawan', $wece);
         $Joyce->hapus('user', $wece);
        return redirect()->to('home/karyawan');
    }
   public function input_karyawan()
{
    $a = $this->request->getPost('nama');
    $b = $this->request->getPost('NIK');
    $c = $this->request->getPost('username');
    $d = $this->request->getPost('level');
    $e = $this->request->getPost('password');
    $f = $this->request->getPost('tanggal_lahir');
    $g = $this->request->getPost('jeniskel');
    $h = $this->request->getPost('alamat');
    $i = $this->request->getPost('no_hp');

    $Joyce = new M_der;
    $data = array(
        "username" => $c,
        "password" => md5($e),
        "level" => $d
    );
    $Joyce->input('user', $data);

    $where = array(
        "username" => $c,
    );
    $wendy = $Joyce->getWhere('user', $where);
    $data2 = array(
        "id_user" => $wendy->id_user,
        "nama" => $a,
        "NIK" => $b,
        "tanggal_lahir" => $f,
        "jeniskel" => $g,
        "alamat" => $h,
        "no_hp" => $i
    );
    $Joyce->input('karyawan', $data2);
    return redirect()->to('home/karyawan');
}
public function editkaryawan($id)
    {
        $Joyce= new M_der;
        $wece=array('karyawan.id_user' => $id);
        $wendy['marah']=$Joyce->joinw('karyawan', 'user', 'karyawan.id_user=user.id_user',$wece);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('editkaryawan.php',$wendy);
        echo view ('neraka.php');
    }
    public function simpan_karyawan()
    {
      $n=$this->request->getPost('username');
      $p=$this->request->getPost('password');
      $l=$this->request->getPost('level');
       $b=$this->request->getPost('nama');
        $c=$this->request->getPost('NIK');
        $e=$this->request->getPost('tanggal_lahir');
       $f=$this->request->getPost('jeniskel');
        $g=$this->request->getPost('alamat');
        $i=$this->request->getPost('no_hp');
        $id=$this->request->getPost('id');

        $where=array(
          "id_user"=>$id);
        $Joyce= new M_der;
         $data1=array(
         "username"=>$n,
          "level"=>$l
        );
         $Joyce->edit('user',$data1,$where);


        $data2=array(
         "nama"=>$b, 
         "NIK"=>$c,
         "tanggal_lahir"=>$e,
         "jeniskel"=>$f, 
         "alamat"=>$g,
         "no_hp"=>$i,
        );
        print_r($where);
        $Joyce->edit('karyawan',$data2,$where);
        return redirect()->to('home/karyawan');      
      }
            public function transaksi()
    {
      if (session()->get('id')>0) {
        $Joyce= new M_der;
        $wendy['marah']=$Joyce->join('transaksi', 'nota', 'transaksi.id_nota=nota.id_nota');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampiltransaksi.php',$wendy);
        echo view ('neraka.php');
        }else{
        return redirect()->to('home/login');
      }
    }
    public function hapus_transaksi($id){
        $Joyce= new M_der;
        $wece= array('id_nota' => $id);
         $Joyce->hapus('transaksi', $wece);
         $Joyce->hapus('nota', $wece);
        return redirect()->to('home/transaksi');
    }
    public function edittransaksi($id)
    {
        $Joyce= new M_der;
        $wece=array('transaksi.id_nota' => $id);
        $wendy['marah']=$Joyce->joinw('transaksi', 'nota', 'transaksi.id_nota=nota.id_nota',$wece);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('edittransaksi.php',$wendy);
        echo view ('neraka.php');
    }
      public function simpan_transaksi()
    {
      $n=$this->request->getPost('kode');
      $p=$this->request->getPost('tanggal');
      $l=$this->request->getPost('harga_per');
       $b=$this->request->getPost('harga_total');
        $c=$this->request->getPost('jumlah');
        $e=$this->request->getPost('nomor_nota');
        $id=$this->request->getPost('id');

        $where=array(
          "id_nota"=>$id);
        $Joyce= new M_der;
         $data1=array(
         "harga_per"=>$l,
          "harga_total"=>$b,
           "jumlah"=>$c,
           "nomor_nota"=>$e
        );
         $Joyce->edit('nota',$data1,$where);


        $data2=array(
         "kode_transaksi"=>$n, 
         "tanggal_transaksi"=>$p,
        );
        print_r($where);
        $Joyce->edit('transaksi',$data2,$where);
        return redirect()->to('home/transaksi');      
      }
        public function inputtransaksi()
    {
        $Joyce= new M_der;
        $where=('id_nota');
        $wendy['marah']=$Joyce->tampil('nota',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('inputtransaksi.php',$wendy);
        echo view ('neraka.php');
    }
       public function input_transaksi()
{
    $a = $this->request->getPost('kode');
    $b = $this->request->getPost('tanggal');
    $c = $this->request->getPost('harga_per');
    $d = $this->request->getPost('harga_total');
    $e = $this->request->getPost('jumlah');
    $f = $this->request->getPost('nomor_nota');
    $Joyce = new M_der;
    $data = array(
        "harga_per" => $c,
        "harga_total" => $d,
        "jumlah" => $e,
        "nomor_nota" => $f
    );
    $Joyce->input('nota', $data);

    $where = array(
        "harga_per" => $c,
    );
    $wendy = $Joyce->getWhere('nota', $where);
    $data2 = array(
        "id_nota" => $wendy->id_nota,
        "kode_transaksi" => $a,
        "tanggal_transaksi" => $b
    );
    $Joyce->input('transaksi', $data2);
    return redirect()->to('home/transaksi');
}
    public function nota()
    {
      if (session()->get('id')>0) {
        $Joyce= new M_der;
        $where=('id_nota');
        $wendy['marah']=$Joyce->tampil('nota',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('tampilnota.php',$wendy);
        echo view ('neraka.php');
        }else{
        return redirect()->to('home/login');
      }
    }
    public function hapus_nota($id){
        $Joyce= new M_der;
        $wece= array('id_nota' => $id);
         $Joyce->hapus('nota', $wece);
        return redirect()->to('home/transaksi');
    }
    public function editnota($id)
    {
        $Joyce= new M_der;
        $wece=array('id_nota' => $id);
        $wendy['marah']=$Joyce->eltampil('nota');
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('editnota.php',$wendy);
        echo view ('neraka.php');
    }
          public function simpan_nota()
    {
      $l=$this->request->getPost('harga_per');
       $b=$this->request->getPost('harga_total');
        $c=$this->request->getPost('jumlah');
        $e=$this->request->getPost('nomor_nota');
        $id=$this->request->getPost('id');

        $where=array(
          "id_nota"=>$id);
        $Joyce= new M_der;
         $data1=array(
         "harga_per"=>$l,
          "harga_total"=>$b,
           "jumlah"=>$c,
           "nomor_nota"=>$e
        );
         $Joyce->edit('nota',$data1,$where);
        return redirect()->to('home/nota');      
      }
            public function inputnota()
    {
        $Joyce= new M_der;
        $where=('id_nota');
        $wendy['marah']=$Joyce->tampil('nota',$where);
        echo view ('surga.php');
        echo view ('menu.php');
        echo view ('inputnota.php',$wendy);
        echo view ('neraka.php');
    }
           public function input_nota()
{
    $c = $this->request->getPost('harga_per');
    $d = $this->request->getPost('harga_total');
    $e = $this->request->getPost('jumlah');
    $f = $this->request->getPost('nomor_nota');
    $Joyce = new M_der;
    $data = array(
        "harga_per" => $c,
        "harga_total" => $d,
        "jumlah" => $e,
        "nomor_nota" => $f
    );
    $Joyce->input('nota', $data);
    return redirect()->to('home/nota');
}
    }