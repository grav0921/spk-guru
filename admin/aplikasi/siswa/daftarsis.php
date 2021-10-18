<div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">Daftar Siswa</h3>
      </div>
    </div><!--/.row-->
<!--<a href="#">Tambah</a>-->
<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
<div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Isi Biodata Siswa</h3>
              <hr>
              <form role="form" action="siswadaftarproses.php" method="post"><!---->
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="NIS" name="nim">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="kelas">
                    <?php
                      if ($tmp_kelas==""){
                        ?> <option value=''>-- Kelas --</option><?php
                      }else{
                        echo "<option value='$tmp_kelas'>$tmp_kelas</option>";
                      }
                    ?>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
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