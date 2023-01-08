<?php
function koneksi()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "dbpemetaan";

    $conn = mysqli_connect($server,$user,$password,$database);

    if (!$conn) {
        die('Gagal Terhubung ke database');
    }

    return $conn;
}
function close_koneksi()
{
    return mysqli_close(koneksi());
}
function query($sql){
  $query = mysqli_query(koneksi(),$sql);

  if(!$query){
      die('Kesalahan Query');
  }
  return $query;
  
}
function getAllData($table,$where = "")
{
    $sql = "SELECT * FROM $table $where";
    $query = query($sql);
    $datas = [];
    while ($data = mysqli_fetch_assoc($query)) {
        $datas[] = $data;
    }
    return $datas;
}
function delete($table,$where)
{
    $sql = "DELETE FROM $table WHERE $where";
    return  query($sql);
}

function insert($table, $data)
{
    if (!is_array($data)) {
        die('Data Belum Variabel Array');
    }
    $field = "";
    $value = "";

    foreach ($data as $key => $isi) {
        $field .=",$key";
        $value .=",'$isi'";
    }
    //no_bp, nama, prodi
    $field_ =substr($field,1);
    $value_ =substr($value,1);
    /* echo "Field : $field_";
    echo "<br>";
    echo "Value : $value_"; */
   $sql = "INSERT INTO $table ($field_) VALUE ($value_)";
    $hasil = query($sql);
    // print_r ($sql); die();
    return $hasil;
}
function getOneData($table,$where)
{
    $sql = "SELECT * FROM $table WHERE $where";
    $query = query($sql);
    $data = mysqli_fetch_assoc($query);
    return $data;
}

class connectToDB {

private $conn;

public function __construct()
{
  $config = include 'konek.php';
  $this->conn = new mysqli( $config['db']['server'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);
}

function __destruct()
{
  $this->conn->close();
}

public function addCompany( $company, $details, $latitude, $longitude, $telephone){
$statement = $this->conn->prepare("Insert INTO companies( company, details, latitude, longitude, telephone) VALUES(?, ?, ?, ?, ?)");
$statement->bind_param('sssss', $company, $details, $latitude, $longitude, $telephone);
$statement->execute();
$statement->close();
}

public function addAreas( $name_areas,$geolocations_areas){
$statement = $this->conn->prepare("Insert INTO areas( name_areas, geolocations_areas ) VALUES(?, ?)");
$statement->bind_param('ss', $name_areas, $geolocations_areas);
$statement->execute();
$statement->close();
}

public function addStreets( $name_streets,$geolocations_streets){
$statement = $this->conn->prepare("Insert INTO streets( name_streets, geolocations_streets ) VALUES(?, ?)");
$statement->bind_param('ss',$name_streets, $geolocations_streets);
$statement->execute();
$statement->close();
}


public function getCompaniesList()
{
  $query = "SELECT * FROM companies";
  $result = mysqli_query($this->conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
     $rows[] = $row;
     
  }
  return $rows;
}

public function getStreetsList()
{
  $query = "SELECT * FROM streets";
  $result = mysqli_query($this->conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
     $rows[] = $row;
     
  }
  return $rows;
}
public function getAreasList()
{
  $query = "SELECT * FROM Areas";
  $result = mysqli_query($this->conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
     $rows[] = $row;
     
  }
  return $rows;
}
}