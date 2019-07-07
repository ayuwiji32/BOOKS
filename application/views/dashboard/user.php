   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Users</h1>
      </div>

      
      <?php
      // arahkan form submit ke kontroller 'book/insertKategori' 
      echo form_open_multipart('user/insertUser'); 
      ?>

          <div class="form-group row">
              <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="fullname" placeholder="Masukkan Nama Lengkap">
              </div>
          </div>

          <div class="form-group row">
              <label for="useRname" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="uname" placeholder="Masukkan Username">
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="pass" placeholder="Masukkan Password">
              </div>
          </div>

          <div class="form-group row">
              <label for="role" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                  <select class="form-control" name="role">
    
                  <?php
                      // menampilkan combo box berisi kategori buku
                      foreach ($role as $role_item):
                  ?>
                      <option value="<?php echo $role_item['role']?>"><?php echo $role_item['role']?></option>
                  <?php
                      endforeach;
                  ?>
                  </select>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mb-2">Add User</button>      
              </div>
          </div>

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Users</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
        
              <th>Nama Lengkap User</th>
              <th>Username</th>
              <th>Password</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            // menampilkan data buku
            foreach ($users as $users_item): 

            ?>
            <tr>
              <td><?php echo $users_item['fullname']?></td>
              <td><?php echo $users_item['username']?></td>
              <td><?php echo $users_item['password']?></td>
              <td><?php echo $users_item['role']?></td>
              <td><?php echo anchor('user/edit/'.$users_item['username'], 'Edit |', 'Edit Users'); ?>
               <?php echo anchor('user/delete/'.$users_item['username'], 'Del', 'Hapus Users'); ?> </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </form>

    </main>
  