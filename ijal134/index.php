<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Futsal.com</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Ayo Futsal</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Team
                            </a>
                            <a class="nav-link" href="bayar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bayar
                            </a>
                            <a class="nav-link" href="status.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Status
                            </a>
                            <a class="nav-link" href="lapangan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lapangan
                            </a>
                            <a class="nav-link" href="member.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Member
                            </a>
                            <a class="nav-link" href="login.php">
                                Logout
                            </a>
                            <a class="nav-link" href="Penilaian.php">
                                Penilaian
                            </a>
                           
                            
                        </div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">AYO FUTSAL</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ayo Futsal biar tubuh sehat dan selalu jaga sportifitas</li>
                        </ol>

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Data Team
                                </button>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Team</th>
                                                <th>Hari</th>
                                                <th>Lapangan</th>
                                                <th>Jam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilsemuadatastock = mysqli_query($conn,"select * from stock");

                                            $i = 1;

                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                $namatim = $data['namatim'];
                                                $hari = $data['hari'];
                                                $lapangan = $data['lapangan'];
                                                $idbm = $data['idtim'];
                                                $jam = $data['jam'];
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namatim;?></td>
                                                <td><?=$hari;?></td>
                                                <td><?=$lapangan;?></td>
                                                <td><?=$jam;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idbm;?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idbm;?>">
                                                        Delete
                                                    </button>
                                                <td>
                                            </tr>
                                        </div>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$idbm;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    <input type= "text" name="namatim" value="<?=$namatim;?>" class="form-control" required>
                                                    <br>
                                                    <input type= "text" name="hari" value="<?=$hari;?>" class="form-control" required>
                                                    <br>
                                                    <input type="hidden" name="idtim" value="<?=$idbm;?>">
                                                    <button type="submit" class="btn btn-primary" name="editdata">submit</button>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$idbm;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus <?=$namatim;?>?
                                                    <input type="hidden" name="idtim" value="<?=$idbm;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapusdata">submit</button>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                            <?php
                                            };

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            <input type= "text" name="namatim" placeholder="Nama Team" class="form-control" required>
            <br>
            <input type= "text" name="hari" placeholder="Hari" class="form-control" required>
            <br>
            <input type= "number" name="lapangan" class="form-control" placeholder="Lapangan" required>
            <br>
            <input type= "text" name="jam" class="form-control" placeholder="jam" required>
            <br>
            <button type="submit" class="btn btn-primary" name="addnewdata">Tambah</button>
            </div>
            </form>
            
        </div>
        </div>
    </div>
</html>