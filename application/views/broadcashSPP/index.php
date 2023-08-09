<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Broadcast Whatsapp</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="Welcome">Dashboard</a></li>
            <li class="breadcrumb-item active">Broadcash Whatsapp</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php
    if ($this->session->flashdata('flash_broadcast')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i>
          Data Berhasil
          <strong>
            <?= $this->session->flashdata('flash_broadcast');   ?>
          </strong>
        </h6>
      </div>
    <?php } ?>
    <!-- tambah data -->
    <?php if ($this->session->userdata('level') == 'admin') { ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Broadcast Whatsapp</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <?= validation_errors(); ?>
                  <form action="<?= base_url() ?>DataBroadcast/validation_form" method="post" accept-charset="utf-8">
                    <div class="card-body">
                      <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Kode Jenis SPP</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="kode_jenisspp">
                    </div> -->


                      <div class="form-group">
                        <label for="exampleInputPassword1">Broadcast</label>
                        <textarea type="text" class="form-control" id="exampleInputPassword1" name="pesan" placeholder="Masukan nama dengan $nama"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="exampleInputPassword1" name="nisn">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="exampleInputPassword1" name="tanggal">
                      </div>
                      <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Tahun</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="tahun">
                    </div> -->

                      <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    <?php } ?>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper