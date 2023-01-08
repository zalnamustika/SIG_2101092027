<nav class="navbar navbar-expand-sm navbar-light bg-default">
      <div class="container mt-3">
        <a class="btn btn-success" href="index.php?folder=marker&file=formmarker">
        <i class="bi bi-plus-circle-fill"></i> Tambah</a>
          
            <form class="d-flex my-2 my-lg-0">
                <input type="hidden" name="folder" value="marker">
                <input type="hidden" name="file" value="index">
                <input class="form-control me-sm-3" name="cari" value="<?php if(isset($cari)) echo $cari; ?>" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
            </form>
        
  </div>
</nav>

<div class="table-responsive-lg mt-3">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Company Name</th>
                <th scope="col">Detail</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Telephone</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            extract($_GET);
            $search = "";
            if(isset($cari)){
                $search = "WHERE company like '%$cari%'";
            }
            $allDataMarker= getAllData($table="companies", $where = $search);
            $no = 0;
            foreach ($allDataMarker as $isi) {
                $no++;
            
            ?>
            <tr class="">
                <td scope="row"><?= $no ?></td>
                <td><?= $isi['company'] ?></td>
                <td><?= $isi['details'] ?></td>
                <td><?= $isi['latitude'] ?></td>
                <td><?= $isi['longitude'] ?></td>
                <td><?= $isi['telephone'] ?></td>
                <td>
                <a href="index.php?folder=marker&file=index&id=<?= $isi['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin hapus : <?= $isi['company'] ?>')"> <i class="bi bi-x-circle"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
    
    if(isset($id)) {
        delete($table="companies",$where ="id = '$id'");
        echo "<script>location='index.php?folder=marker&file=index'</script>";
    }
?>
