  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Retribusi Daerah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Retribusi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Silahkan isi form berikut</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                <div class="form-group">
                  <label>Nama Perangkat Daerah</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option>=== Pilih Perangkat Daerah ===</option>
                    <?php if($pd>0) { foreach($pd as $pd): ?>
                      <option value="<?php echo $pd->id; ?>"> <?php echo $pd->nama; ?> </option>
                    <?php endforeach; } ?>
                  </select>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label>Nama Retribusi</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option>=== Pilih Retribusi ===</option>
                    <?php if($retribusi>0) { foreach($retribusi as $retribusi): ?>
                      <option value="<?php echo $retribusi->id; ?>"> <?php echo $retribusi->nama; ?> </option>
                    <?php endforeach; } ?>
                  </select>
                </div>
                <!-- /.form-group -->
                  <div class="form-group">
                    <label for="namaretribusi">Nominal</label>
                    <input type="number" class="form-control" id="namaretribusi" placeholder="Nominal Retribusi">
                  </div>
                  <div class="form-group">
                    <label for="namaretribusi">Tanggal</label>
                    <input type="date" class="form-control" id="namaretribusi" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bukti Retribusi</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->