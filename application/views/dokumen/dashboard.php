  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Data Kumpulan Dokumen yang berkaitan dengan Retribusi Daerah</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Berikut merupakan data produk hukum yang berkaitan dengan retribusi daerah di Kabupaten Garut</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama Dokumen</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $count=0; if($dokumen>0) { foreach($dokumen as $dokumen): ?>
                    <tr>
                        <td> <?php echo ++$count; ?> </td>
                        <td> <?php echo $dokumen->nama; ?> </td>
                        <td> <?php echo date_format($dokumen->created_at, "d-m-Y"); ?> </td>
                        <td><a href="<?php echo base_url('public/dokumen/').$dokumen->file; ?>" class="btn btn-block btn-success">Download</a></td>
                    </tr>
                  <?php endforeach; } ?>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->