
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
                    <?php if (session()->get('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Data produk berhasil <strong><?= session()->getFlashdata('message'); ?></strong> 
                        </div>
                    <?php endif; ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                            <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Komoditas</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm shadow-sm" data-toggle="modal" data-target="#modelId">
                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Komoditas
                            </button>
                            
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Komoditi</th>
                                            <th>Nama Komoditi</th>
                                            <th>Stok</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach ($product as $row) : ?>
                                            <tr>
                                                <td scope="row"><?= $row['id_komoditi']; ?></td>
                                                <td><?= $row['nama_komoditi']; ?></td>
                                                <td><?= $row['jumlah']; ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"  id="btn-edit" data-toggle="modal" data-target="#modaledit" name="btn-edit" id="btn-edit<?= $row['id_komoditi'] ?>" 
                                                    data-id="<?= $row['id_komoditi'];?>" 
                                                    data-nama="<?= $row['nama_komoditi']; ?>" 
                                                    data-jumlah="<?= $row['jumlah'];?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-danger" href="#<?= $row['id_komoditi']; ?>" data-toggle="modal" data-target="#modalhapus" onclick="$('#deleteProduct').attr('href','product/delete/<?= $row['id_komoditi']; ?>')">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>

                                                </td>

                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Edit Data -->
            <div class="modal fade" id="modaledit">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit <?= $judul; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('editProduct'); ?>" method="post">
                                <input type="hidden" name="id_komoditi" id="id_komoditi" class="form-control" >
                                <div class="form-group mb-0">
                                    <label for="nama_komoditi"></label>
                                    <input type="text" name="nama_komoditi" id="nama_komoditi" class="form-control" placeholder="Masukkan nama produk" >
                                </div>
                                <div class="form-group mb-0">
                                    <label for="jumlah"></label>
                                    <input type="text" name="jumlah_komoditi" id="jumlah_komoditi" class="form-control" placeholder="Masukkan stok">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary btn-sm"id ="editProduct">Simpan</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="modelId">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('addProduct'); ?>" method="post">
                                <div class="form-group mb-0">
                                    <label for="nama_komoditi"></label>
                                    <input type="text" name="nama_komoditi" id="" class="form-control" placeholder="Masukkan nama produk">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="jumlah"></label>
                                    <input type="text" name="jumlah_komoditi" id="" class="form-control" placeholder="Masukkan stok">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Tambah Data</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Hapus Modal-->
            <div class="modal fade" id="modalhapus">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">Apakah anda yakin menghapus data ini ?</div>
                        <div class="modal-footer">
                            <a class="btn btn-warning" data-dismiss="modal">Cancel</a>
                            <a class="btn btn-primary btn-ok" id="deleteProduct">Yakin</a>
                        </div>
                    </div>
                </div>
            </div>
             

