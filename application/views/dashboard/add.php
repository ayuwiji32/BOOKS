   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Buku</h1>
      </div>

      
      <?php
      // arahkan form submit ke kontroller 'book/insert' 
      echo form_open_multipart('book/insert'); 
      ?>

          <div class="form-group row">
              <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku">
              </div>
          </div>

          <div class="form-group row">
              <label for="pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="pengarang" placeholder="Masukkan nama pengarang buku">
              </div>
          </div>

          <div class="form-group row">
              <label for="kategori" class="col-sm-2 col-form-label">Kategori Buku</label>
              <div class="col-sm-10">
                  <select class="form-control" name="idkategori">
    
                  <?php
                      // menampilkan combo box berisi kategori buku
                      foreach ($kategori as $kat_item):
                  ?>
                      <option value="<?php echo $kat_item['idkategori']?>"><?php echo $kat_item['kategori']?></option>
                  <?php
                      endforeach;
                  ?>
                  </select>
              </div>
          </div>


          <div class="form-group row">
              <label for="penerbit" class="col-sm-2 col-form-label">Penerbit Buku</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="penerbit" placeholder="Masukkan penerbit buku">
              </div>
          </div>

          <div class="form-group row">
              <label for="thnterbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="thnterbit" placeholder="Masukkan tahun terbit">
              </div>
          </div>

          <div class="form-group row">
              <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis Buku</label>
              <div class="col-sm-10">
                  <textarea class="form-control" name="sinopsis" rows="3"></textarea>
              </div>
          </div>

          <div class="form-group row">
              <label for="imgcover" class="col-sm-2 col-form-label">Image Cover Buku</label>
              <div class="col-sm-10">
                  <input type="file" class="form-control-file" name="imgcover">
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mb-2">Submit Data Buku</button>      
              </div>
          </div>

          
      </form>

    </main>
  