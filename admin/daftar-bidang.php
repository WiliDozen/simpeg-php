<?php 

$judul = "Dashboard Bidang";
include "layout/header.php";

// query untuk menampilkan data tabel bidang
$bidang = query("SELECT * FROM bidang ORDER BY id_bidang DESC");

// ketika tombol submit ditekan jalankan fungsi dibawah ini
if (isset($_POST['tambah'])) {
    if (tambah_bidang($_POST) > 0) {
        // pesan berhasil
        echo "<script>
        alert('Data Berhasil Di Tambahkan');
        document.location.href = 'daftar-bidang.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Berhasil Gagal Tambahkan');
        document.location.href = 'daftar-bidang.php';
        </script>";
    }

}

// ketika tombol submit ditekan jalankan fungsi dibawah ini
if (isset($_POST['ubah'])) {
    if (ubah_bidang($_POST) > 0) {
        // pesan berhasil
        echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'daftar-bidang.php';
        </script>";
    } else {
        //pesan gagal
        echo "<script>
        alert('Data Berhasil Gagal Diubah');
        document.location.href = 'daftar-bidang.php';
        </script>";
    }
}


 ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Bidang</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- dibuat agar waktu aktif didaftar bidang ade tulisan dashboard kalo diklik nimbul dashboard -->
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Daftar Bidang</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabel Daftar Bidang
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i>Tambah</button>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Fungsi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach($bidang as $data) : ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?=date('d/m/y H:i:s', strtotime($data['tanggal']))?></td>
                                                    <td width="20%" class="text-center">
                                                        <!-- btn sm ukuran -->
                                                        <!-- mb tuh batas bawah ee -->
                                                        <button class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#modalubah<?= $data['id_bidang']; ?>">
                                                            <i class="fas fa-edit"></i>Ubah</button>

                                                        <a href="hapus-bidang.php?id_bidang=<?= $data['id_bidang'];?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin Data Bidang Akan Dihapus.?');">
                                                            <i class="fas fa-trash-alt"></i>Hapus</a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    
                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


                <!-- Modal -->
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>Tambah Bidang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post"> 
                            <div class="from-group">
                                <label for="nama">Nama Bidang</label>
                                <input type="text" name="nama" id="nama" class="form-control" required minlength="4 "> 
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-mb" data-dismiss="modal">Kembali</button>
                                <button type="submit" name="tambah" class="btn btn-primary btn-mb">Submit</button>
                              </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


            <?php foreach ($bidang as $data) : ?>
                <div class="modal fade" id="modalubah<?= $data['id_bidang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i>Ubah Bidang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post"> 
                            <input type="hidden" name="id_bidang" value="<?= $data['id_bidang']; ?>">
                            <div class="from-group">
                                <label for="nama">Nama Bidang</label>
                                <input type="text" name="nama" id="nama" class="form-control" required minlength="4"value="<?= $data['nama']; ?>"> 
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-mb" data-dismiss="modal">Kembali</button>
                                <button type="submit" name="ubah" class="btn btn-primary btn-mb">ubah</button>
                              </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

<?php endforeach; ?>


<?php 

include "layout/footer.php";
?>