 <div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="mt-3">
            <center>Form Streets</center>
        </h3>
        <?php
        
        extract($_POST);
        if(isset($simpan)){
                require_once("db.php");
                $name_streets = strip_tags($_POST['name_streets']);
                $geolocations_streets = strip_tags($_POST['geolocations_streets']);
                $conn = new connectToDB();
                $conn->addStreets($name_streets, $geolocations_streets);
                echo "<script>location='index.php?folder=polyline&file=index'</script>";
            
        }
        ?>
        
        <form action="" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label class="form-label">Streets Name</label>
            <input type="text" name="name_streets"  class="form-control" required autofocus>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi streets name
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Geolocations</label>
            <input type="text" name="geolocations_streets"  class="form-control" required autofocus>
            <div class="valid-feedback">
                Isian sudah benar
            </div>
            <div class="invalid-feedback">
                Silahkan di isi geolocations
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