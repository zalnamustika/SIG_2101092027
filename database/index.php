
<?php
require_once 'views/header.php';

extract($_GET);
require_once 'db.php';

//halaman Back End
if(isset($folder) && isset($file)){
  $view_dir ="views/$folder";
        if(is_dir($view_dir)){
            $file_page = "$view_dir/$file.php";
            if(is_file($file_page)){
                require_once $file_page;
            }else{
                require_once 'views/404.php';
            }
        }else{
            require_once 'views/404.php';
        }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Leaflet basic example</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <!--CSS Icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!--CSS Trix-->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
</style>
</head>
<body>
<?php

require_once("db.php");
$conn = new  connectToDB();
$companies = $conn->getCompaniesList();
$streets = $conn->getStreetsList();
$areas = $conn->getAreasList();
//  require_once 'views/header.php';

?>



<?php
if (isset($front_folder)=="" && isset($folder)=="") {
  require_once 'views/home.php';
}

require_once 'views/footer.php';
?>


