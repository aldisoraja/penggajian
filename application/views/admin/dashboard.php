
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Pegawai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Jabatan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jabatan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Golongan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $golongan ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Data Potongan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pot_gaji ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <br>
                    <br>
                    
                    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">
                        Selamat Datang, Anda Login sebagai Admin.
                    </div>

                    <div class="card" style="margin-bottom: 120px; width: 65%">
                        <div class="card-header font-weight-bold bg-primary text-white">
                            Data Admin
                        </div>

                        <?php foreach($biodata as $b) : ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img style="width: 250px" class="img-profile rounded-circle" src="<?php echo base_url('assets/avatar/').$this->session->userdata('foto') ?>">
                                    </div>

                                    <div class="col-md-7">
                                        <table class="table">
                                            <tr>
                                                <td>NIP</td>
                                                <td>:</td>
                                                <td><?php echo $b->nip ?></td>
                                            </tr>

                                            <tr>
                                                <td>NIK</td>
                                                <td>:</td>
                                                <td><?php echo $b->nik ?></td>
                                            </tr>

                                            <tr>
                                                <td>Nama Pegawai</td>
                                                <td>:</td>
                                                <td><?php echo $b->nama_pegawai ?></td>
                                            </tr>

                                            <tr>
                                                <td>Golongan</td>
                                                <td>:</td>
                                                <td><?php echo $b->golongan ?></td>
                                            </tr>

                                            <tr>
                                                <td>Jabatan</td>
                                                <td>:</td>
                                                <td><?php echo $b->jabatan ?></td>
                                            </tr>

                                            <tr>
                                                <td>Kategori</td>
                                                <td>:</td>
                                                <td><?php echo $b->kat_jab ?></td>
                                            </tr>

                                            <tr> 
                                                <td>Status</td>
                                                <td>:</td>
                                                <td><?php echo $b->status ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           