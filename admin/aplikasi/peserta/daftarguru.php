<div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">Input Data Guru</h3>
      </div>
    </div><!--/.row-->
<!--<a href="#">Tambah</a>-->
<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php if (isset($_GET['ap']) && $_GET['ap']=="peserta")?><a href="?ap=daftarproses" class="btn btn-primary btn-sm" id="btn-todo">Tambah Biodata</a>
<div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Isi Biodata Guru</h3>
              <hr>
              <form role="form"  <?php if (isset($_GET['ap']) && $_GET['ap']=="peserta")?> action="?ap=daftarproses" method="post"><!---->
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="NIP" name="nip">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="pendidikan">
                    <?php
                      if ($tmp_pend==""){
                        ?> <option value=''>-- Pendidikan --</option><?php
                      }else{
                        echo "<option value='$tmp_pend'>$tmp_pend</option>";
                      }
                    ?>
                    <option value='S1'>Sarjana (S1)</option>
                    <option value='S2'>Magister (S2)</option>
                    <option value='S3'>Doktor (S3)</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="jabatan">
                    <?php
                      if ($tmp_jabatan==""){
                        echo "<option value=''>-- Jabatan --</option>";  
                      }else{
                        echo "<option value='$tmp_jabatan'>$tmp_jabatan</option>";
                      }
                    ?>
                    <option value='Kepala Sekolah'>Kepala Sekolah</option>
                    <option value='Guru'>Guru</option>
                  </select>
                </div>
                <br>
                <input name="submit" type="submit" class="btn btn-success" value="Daftar">
              </form>  
            </div>
          </div>
            </div>
          </div>
        </div>

            <div class="container pt">
    <div class="row mt">
      <div class="col-lg-6 col-lg-offset-3 centered">
              <h3></h3>
              <hr>