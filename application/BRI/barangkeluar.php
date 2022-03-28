<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <!-- icon -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

  <link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />

  <link href="css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/mycss.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark shadow-sm ">

    <!-- Navbar Brand-->
    <!-- logo -->
    <a class="navbar-brand   align-items-centerps-3" href="index.php">
      <img src="logo.png" class=" navbar-brand rounded align-items-center ms-5" style="width: 100px; height: 60px;" alt="logo">
    </a>
    <!-- akhir logo -->

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-2 " id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: #757774;"></i></button>
    <!-- Navbar Search-->

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-2">
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color: #757774;"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="login.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- navbar end -->

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" style="background: #013161;" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="databarangmasuk.php">
              <div class="sb-nav-link-icon"><i class="bi bi-reply"></i></div>
              Data Barang Masuk
            </a>
            <a class="nav-link active" href="barangkeluar.php">
              <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
              Data Barang Keluar
            </a>
            <a class="nav-link " href="pegawai.php">
              <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
              Data Pegawai
            </a>
            <a class="nav-link" href="user.php">
              <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
              Kelola Users
            </a>

          </div>
        </div>
        <div class="sb-sidenav-footer " style="background: #013161;">
          <div class="small">Logged in as:</div>
          Admin
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Data Barang Keluar</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item text-decoration-none"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Barang Keluar</li>
          </ol>
          <!-- card -->
          <div class="card shadow-sm ">
            <h5 class="card-header">
              <i class="bi bi-truck"></i>
              Data Barang Keluar
            </h5>

            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- modal -->
                  <!-- Button trigger modal -->
                  <?php
                  function tgl_indo($tanggal)
                  {
                    $bulan = array(
                      1 =>   'Januari',
                      'Februari',
                      'Maret',
                      'April',
                      'Mei',
                      'Juni',
                      'Juli',
                      'Agustus',
                      'September',
                      'Oktober',
                      'November',
                      'Desember'
                    );
                    $pecahkan = explode('-', $tanggal);

                    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                  }

                  if (isset($_POST["simpan"])) {
                    $state = true;
                    $count = $_POST['count'];
                    $id_barang = $_POST['id_barang'];
                    $id_unit = $_POST['id_unit'];
                    $jumlah_barang_keluar = $_POST['jumlah_barang_keluar'];
                    $tgl_barang_keluar  = $_POST['tgl_barang_keluar'];
                    $id_pegawai = $_POST['id_pegawai'];

                    for ($i = 0; $i < $count; $i++) {
                      $query = mysqli_query($koneksi, "INSERT INTO tb_barang_keluar (id_keluar, id_barang, id_unit, jumlah_barang_keluar, tgl_barang_keluar, id_pegawai) VALUES (NULL, '$id_barang[$i]', '$id_unit', '$jumlah_barang_keluar[$i]', '$tgl_barang_keluar', '$id_pegawai')");
                      $state *= $query;
                    }
                  }
                  if (isset($_POST["update"])) {
                    $id_keluar = $_POST['id_keluar'];
                    $id_barang = $_POST['id_barang'];
                    $id_unit = $_POST['id_unit'];
                    $jumlah_barang_keluar = $_POST['jumlah_barang_keluar'];
                    $tgl_barang_keluar  = $_POST['tgl_barang_keluar'];
                    $id_pegawai = $_POST['id_pegawai'];


                    $query = mysqli_query($koneksi, "UPDATE tb_barang_keluar SET id_barang = '$id_barang', id_unit = '$id_unit', jumlah_barang_keluar = '$jumlah_barang_keluar', tgl_barang_keluar = '$tgl_barang_keluar', id_pegawai = '$id_pegawai' WHERE id_keluar = '$id_keluar'");
                    if ($query) {
                      echo "
                      <script>
                        alert('Berhasil Mengupdate Data!');
                        window.location.href = 'databarangmasuk.php';
                      </script>";
                    } else {
                      echo "
                        <script>
                        alert('Gagal Mengupdate Data!');
                        window.location.href = 'databarangmasuk.php';
                        </script>";
                    }
                  }

                  if (isset($_GET['aksi']) == 'delete') {
                    $id_keluar = $_GET['id'];
                    $query = mysqli_query($koneksi, "DELETE FROM tb_barang_keluar WHERE id_keluar = '$id_keluar'");
                    if ($query) {
                      echo "
                      <script>
                        alert('Berhasil Menghapus Data!');
                        window.location.href = 'databarangmasuk.php';
                      </script>";
                    } else {
                      echo "
                        <script>
                        alert('Gagal Menghapus Data!');
                        window.location.href = 'databarangmasuk.php';
                        </script>";
                    }
                  }
                  ?>
                  <div class="input-group mb-3">
                    <button type="button" class="btn btn-primary rounded btnmodal" data-bs-toggle="modal" data-bs-target="#exampleModal1">Tambah Data</button>
                    <button type="button" class="btn btn-success rounded ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal2"> <i class="bi bi-printer me-2">
                      </i>Cetak Data</button>
                  </div>
                  <!-- Modal -->


                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header " style="background: #013161;">
                          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data</h5>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" id="countData" name="count" value="1">
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">Nama Pegawai</label>
                              <select class="form-control" name="id_pegawai" required>
                                <option value="" disabled selected hidden>-- Pilih Pegawai --</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_data_pegawai");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                  <option value="<?php echo $row['id_pegawai']; ?>"><?php echo $row['nama_pegawai']; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">Nama Unit Ker</label>
                              <select class="form-control" name="id_unit" required>
                                <option value="" disabled selected hidden>-- Pilih Unit --</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_unit");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                  <option value="<?php echo $row['id_unit']; ?>"><?php echo $row['nama_unit_tujuan']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">Tanggal Keluar</label>
                              <input type="date" name="tgl_barang_keluar" class="form-control" placeholder="Tanggal Barang Keluar" />
                            </div>

                            <div class="row">
                              <div class="col-md-12">

                                <label for="message-text" class="col-form-label">Nama Barang</label>
                                <div class="form-group fieldGroup mb-3">
                                  <div class="input-group">
                                    <select class="form-control" name="id_barang[]" id="inputGroupSelect01" required>
                                      <option value="" disabled selected hidden>-- Pilih Barang --</option>
                                      <?php
                                      $query = mysqli_query($koneksi, "SELECT * FROM barang");
                                      while ($row = mysqli_fetch_array($query)) {
                                      ?>
                                        <option value="<?php echo $row['id_barang']; ?>"><?php echo $row['nama_barang']; ?></option>
                                      <?php } ?>
                                    </select>
                                    <input type="number" name="jumlah_barang_keluar[]" class="form-control" min="0" placeholder="Masukan Jumlah Barang" />
                                    <div class="input-group-addon ml-3">
                                      <a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group fieldGroupCopy" style="display: none;">
                                  <div class="input-group mt-3">
                                    <select class="form-control " name="id_barang[]" id="inputGroupSelect01" name="username1[]">
                                      <option value="" disabled selected hidden>-- Pilih Barang --</option>
                                      <?php
                                      $query = mysqli_query($koneksi, "SELECT * FROM barang");
                                      while ($row = mysqli_fetch_array($query)) {
                                      ?>
                                        <option value="<?php echo $row['id_barang']; ?>"><?php echo $row['nama_barang']; ?></option>
                                      <?php } ?>
                                    </select>
                                    <input type="number" name="jumlah_barang_keluar[]" class="form-control" min="0" placeholder="Masukan Jumlah Barang" />

                                    <div class="input-group-addon ml-3">
                                      <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>




                  <!-- modal edit data -->

                  <!-- end modal -->
                  <!-- modal cetak data -->
                  <!-- Modal -->



                  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header bg-success">
                          <h5 class="modal-title text-white" id="exampleModalLabel">Cetak Data</h5>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="cetakKeluar.php" target="_blank" enctype="multipart/form-data">
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">Nama Unit</label>
                              <select class="form-control" name="id_unit" required>
                                <option value="" disabled selected hidden>-- Pilih Unit --</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_unit");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                  <option value="<?php echo $row['id_unit']; ?>"><?php echo $row['nama_unit_tujuan']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">From</label>
                              <input type="date" name="tanggal_awal" class="form-control" id="recipient-name" required />
                            </div>
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">To</label>
                              <input type="date" name="tanggal_akhir" class="form-control" id="recipient-name" required />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <input type="submit" name="simpan" class="btn btn-primary" value="Cetak Semua Data">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                  <!-- akhir modal cetak data -->
                </div>

              </div>

              <!-- table data -->
              <table class="table table-borderless " id="datatablesSimple">
                <thead class="text-light" style="background: #013161;">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Unit Tujuan</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col" width="300px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_barang_keluar JOIN tb_unit ON tb_unit.id_unit = tb_barang_keluar.id_unit JOIN barang ON barang.id_barang = tb_barang_keluar.id_barang ORDER BY tgl_barang_keluar DESC");
                  $no = 1;
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td scope="row"><?php echo $no; ?></td>
                      <td><?php echo tgl_indo($row['tgl_barang_keluar']); ?></td>
                      <td><?php echo $row['nama_unit_tujuan']; ?></td>
                      <td><?php echo $row['jumlah_barang_keluar']; ?></td>
                      <td><?php echo $row['jumlah_barang_keluar'] * $row['harga_satuan']; ?></td>
                      <td width="300px" class="d-flex justify-content-center">
                        <a class="btn btn-primary btnku btnedit" data-bs-toggle="modal" data-bs-target="#editData<?php echo $row['id_keluar']; ?>"><i class="bi bi-pencil-square iconku me-1"></i>Edit</a>
                        <a class="btn btn-danger btnku ms-1" onclick="return confirm('Apakah kamu yakin akan menghapus data?')" href="databarangmasuk.php?aksi=delete&id=<?php echo $row['id_keluar']; ?>"><i class="bi bi-trash-fill iconku me-1"></i>Hapus</a>
                        <a class="btn bg-success btnku ms-1" target="_blank" href="cetak1.php?id_keluar=<?php echo $row['id_keluar']; ?>&id_unit=<?php echo $row['id_unit']; ?>"><i class="bi bi-printer iconku me-1"></i>Cetak</a>
                      </td>
                      <!-- modal edit data -->
                      <div class="modal fade" id="editData<?php echo $row['id_keluar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header" style="background: #013161;">
                              <h5 class="modal-title text-white" id="exampleModalLabel">Edit Data</h5>
                            </div>
                            <div class="modal-body">
                              <?php
                              $id = $row['id_keluar'];
                              $query_view = mysqli_query($koneksi, "SELECT * FROM tb_barang_keluar JOIN tb_unit ON tb_unit.id_unit = tb_barang_keluar.id_unit JOIN barang ON barang.id_barang = tb_barang_keluar.id_barang JOIN tb_data_pegawai ON tb_data_pegawai.id_pegawai = tb_barang_keluar.id_pegawai WHERE id_keluar='$id'");
                              while ($data = mysqli_fetch_array($query_view)) {
                              ?>
                                <form method="POST" action="" enctype="multipart/form-data">
                                  <input type="hidden" name="id_keluar" value="<?php echo $data['id_keluar']; ?>">
                                  <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Nama Pegawai</label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="<?php echo $data['id_pegawai']; ?>" selected><?php echo $data['nama_pegawai']; ?></option>
                                      <?php
                                      $query1 = mysqli_query($koneksi, "SELECT * FROM tb_data_pegawai");
                                      while ($row1 = mysqli_fetch_array($query1)) {
                                      ?>
                                        <option value="<?php echo $row1['id_pegawai']; ?>"><?php echo $row1['nama_pegawai']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Nama Unit Ker</label>
                                    <select class="form-control" name="id_unit" required>
                                      <option value="<?php echo $data['id_unit']; ?>" selected><?php echo $data['nama_unit_tujuan']; ?></option>
                                      <?php
                                      $query2 = mysqli_query($koneksi, "SELECT * FROM tb_unit");
                                      while ($row2 = mysqli_fetch_array($query2)) {
                                      ?>
                                        <option value="<?php echo $row2['id_unit']; ?>"><?php echo $row2['nama_unit_tujuan']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Tanggal Keluar</label>
                                    <input type="date" value="<?php echo $data['tgl_barang_keluar']; ?>" name="tgl_barang_keluar" class="form-control" placeholder="Tanggal Barang Keluar" />
                                  </div>

                                  <div class="row">
                                    <div class="col-md-12">
                                      <label for="message-text" class="col-form-label">Nama Barang</label>
                                      <div class="form-group-1 fieldGroup1 mb-3">
                                        <div class="input-group">
                                          <select class="form-control" name="id_barang" id="inputGroupSelect01" required>
                                            <option value="<?php echo $data['id_barang']; ?>" selected><?php echo $data['nama_barang']; ?></option>
                                            <?php
                                            $query3 = mysqli_query($koneksi, "SELECT * FROM barang");
                                            while ($row3 = mysqli_fetch_array($query3)) {
                                            ?>
                                              <option value="<?php echo $row3['id_barang']; ?>"><?php echo $row3['nama_barang']; ?></option>
                                            <?php } ?>
                                          </select>
                                          <input type="number" value="<?php echo $data['jumlah_barang_keluar']; ?>" name="jumlah_barang_keluar" class="form-control" placeholder="Masukan Jumlah Barang" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="update" class="btn btn-primary" value="Update" data-bs-dismiss="modal">
                                  </div>
                                </form>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
              <!-- akhir table -->
            </div>
          </div>
        </div>
    </div>
  </div>
  </main>





  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>

  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  <!-- multiple insert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // membatasi jumlah inputan
      var maxGroup = 10;

      //melakukan proses multiple input
      $(".addMore").click(function() {
        if ($("body").find(".fieldGroup").length < maxGroup) {
          var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + "</div>";
          $("body").find(".fieldGroup:last").after(fieldHTML);
        } else {
          alert("Maximum " + maxGroup + " groups are allowed.");
        }
        sumFieldGroup = document.querySelectorAll(".fieldGroup").length;
        let countData = document.getElementById("countData");
        countData.setAttribute("value", sumFieldGroup);
      });

      //remove fields group
      $("body").on("click", ".remove", function() {
        $(this).parents(".fieldGroup").remove();
        sumFieldGroup = document.querySelectorAll(".fieldGroup").length;
        let countData = document.getElementById("countData");
        countData.setAttribute("value", sumFieldGroup);
      });
    });
  </script>
  <!-- end multiple -->
  <!-- multipleinsert edit data -->
  <script>
    $(document).ready(function() {
      // membatasi jumlah inputan
      var maxGroup = 10;

      //melakukan proses multiple input 
      $(".addMore1").click(function() {
        if ($('body').find('.fieldGroup1').length < maxGroup) {
          var fieldHTML = '<div class="form-group-1 fieldGroup1">' + $(".fieldGroupCopy1").html() + '</div>';
          $('body').find('.fieldGroup1:last').after(fieldHTML);
        } else {
          alert('Maximum ' + maxGroup + ' groups are allowed.');
        }
      });

      //remove fields group
      $("body").on("click", ".remove1", function() {
        $(this).parents(".fieldGroup1").remove();
      });
    });
  </script>
  <!-- end edit data multiple -->




</body>

</html>