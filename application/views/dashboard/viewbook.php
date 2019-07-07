

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID Buku</th>
              <th><?php echo $idbuku?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Judul Buku</th>
              <th><?php echo $judul?></th>
            </tr>
            <tr>
            	<td>Pengarang</td>
            	<td><?php echo $pengarang?></td>
            </tr>
            <tr>
            	<td>Penerbit</td>
            	<td><?php echo $penerbit?></td>
            </tr>
            <tr>
            	<td>ID Kategori Buku</td>
            	<td><?php echo $idkategori ?></td>
            </tr>
            <tr>
            	<td>Sinopsis</td>
            	<td><?php echo $sinopsis ?></td>
            </tr>
            <tr>
            	<td>Tahun Terbit</td>
	            <td><?php echo $thnterbit ?></td>
            </tr>
            <tr>
            	<td>Cover Buku</td>
            	<td><?php echo "<img src=".base_url()."assets/images/".$img.">"?></td> 
            </tr>                   
          </tbody>
        </table>
      </div>
      
    </main>
  