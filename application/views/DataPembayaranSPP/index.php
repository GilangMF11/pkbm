<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pembayaran SPP</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="Welcome">Dashboard</a></li>
            <li class="breadcrumb-item active">Data spp Siswa</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php
    if ($this->session->flashdata('flash_dataPembayaranSPP')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i>
          Data Berhasil
          <strong>
            <?= $this->session->flashdata('flash_dataPembayaranSPP');   ?>
          </strong>
        </h6>
      </div>
    <?php } ?>

    <!-- list data -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- card-body -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Paket</th>
                  <th>Jenis</th>
                  <th>Nominal spp</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($dataSiswa as $row) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->nisn ?></td>
                    <td><?= $row->nama_siswa ?></td>
                    <td><?= $row->kode_jurusan ?></td>
                    <td><?= $row->kategori ?></td>
                    <td><?= $row->nominal_jenis ?></td>
                    <td class="text-center">

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayarSPP" data-nisn="<?= $row->nisn ?>">Bayar SPP</button>
                      <a href="<?= base_url() ?>DataPembayaranSPP/detailTransaksi/<?= $row->nisn ?>" class="btn btn-danger">Detail Transaksi</a>
                      <a href="" class="btn btn-secondary" onclick="generateAndPrintPDF(<?= $row->nisn ?>)">Cetak<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                    </td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- modal detail data-->
<!-- Modal -->
<form action="<?= base_url() ?>DataPembayaranSPP/insertData" method="post" accept-charset="utf-8">
  <div class="modal fade " id="bayarSPP" tabindex="-1" aria-labelledby="bayarSPPLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bayarSPPLabel">Pembayaran SPP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('DataPembayaran/insertData') ?>" method="post">
          <div class="modal-body">
            <table class="table tabel-bordered">
              <tr>
                <td>NISN</td>
                <td>
                  <div id="dataNISN"></div>
                  <input type="hidden" id="NIS" value="" name="dataNISN">
                </td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>
                  <div id="dataNama"></div>
                </td>
              </tr>
              <tr>
                <td>Jurusan</td>
                <td>
                  <div id="dataJurusan"></div>
                </td>
              </tr>
              <tr>
                <td>Jenis SPP</td>
                <td>
                  <div id="dataJenisSPP"></div>
                  <input type="hidden" id="jenisSpp" value="" name="jenisspp">

                </td>
              </tr>
              <tr>
                <td>Nominal SPP</td>
                <td>
                  <div id="dataNominalSPP"></div>
                  <input type="hidden" id="nominalspp" value="" name="nominal">
                </td>
              </tr>
              <!-- <tr>
                <td>Kelas</td>
                <td>
                  <div class="form-group">
                    <div id="selectKelas"></div>
                  </div>
                </td>
              </tr> -->
            </table>
            <div id="dataDaftarTagihan"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->
  <!-- end modal detail data -->

<!-- Cetak Data -->
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function generateAndPrintPDF(nisn) {
    // Use AJAX to generate the PDF on the server
    $.ajax({
        type: 'POST',
        url: '<?= base_url('DataPembayaranSPP/generatePDF') ?>/' + nisn,
        success: function(data) {
            // Create an iframe and set its content to the PDF data
            var iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = 'data:application/pdf;base64,' + data;
            document.body.appendChild(iframe);

            // Wait for the iframe to load the PDF content
            iframe.onload = function() {
                // Print the PDF
                iframe.contentWindow.print();
            };
        },
        error: function() {
            alert('Failed to generate PDF. Please try again.');
        }
    });
}
</script>

