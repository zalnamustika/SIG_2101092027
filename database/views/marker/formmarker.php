 <div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="mt-3">
            <center>Form Companies</center>
        </h3>
        <?php
        
        extract($_POST);
        if(isset($simpan)){
                require_once("db.php");
                $company = strip_tags($_POST['company']);
                $details = strip_tags($_POST['details']);
                $latitude = strip_tags($_POST['latitude']);
                $longitude = strip_tags($_POST['longitude']);
                $telephone = strip_tags($_POST['telephone']);
                $conn = new connectToDB();
                $conn->addCompany($company, $details, $latitude, $longitude, $telephone);
                echo "<script>location='index.php?folder=marker&file=index'</script>";
            
        }
        ?>
        
        <form action="" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" name="company"  class="form-control" required autofocus>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi Company
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Detail</label>
            <textarea name="details" class="form-control" required autofocus  cols="30" rows="10"></textarea>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi Detail
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" name="latitude"  class="form-control" required autofocus>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi Latitude
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Longitude</label>
            <input type="text" name="longitude"  class="form-control" required autofocus>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi Longitude
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Telephone</label>
            <input type="text" name="telephone"  class="form-control" required autofocus>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi Telephone
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>

<script>
$( document ).ready(function() {
putDraggable();
});
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()


</script>