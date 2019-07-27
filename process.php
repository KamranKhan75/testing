<?php
session_start();
$mysqli= new mysqli('localhost','root','','test') or die($mysqli->error());

$empid=0;
$typeid=0;
$update=false;
$ename='';
$iNo='';
$passNo='';
$emptype='';

if(isset($_POST['save'])){
  $ename=$_POST['txtempname'];  
  $iNo=$_POST['txtiNo'];
  $passNo=$_POST['txtPassNo'];
  $emptype=$_POST['JobDesc'];

  $mysqli->query("INSERT INTO employeetable(empName,iqamaNo,passportNo,jobID) VALUES('$ename','$iNO','$passNo',(SELECT typeID from typetable WHERE Type=$emptype))") or die($mysqli->error());
  $_SESSION['message']="Record has been added";
    $_SESSION['msg_type']="success";
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $empid=$_GET['delete'];
    $mysqli->query("DELETE FROM employeetable WHERE empID=$empid") or die(mysqli_error($mysqli));

    $_SESSION['message']="Record has been deleted";
    $_SESSION['msg_type']="danger";
    header("location: index.php");
}


if(isset($_GET['edit'])){
    $empid=$_GET['edit'];
    $update=true;
    
    $result=$mysqli->query("SELECT empName,iqamaNo,passportNo,JobDesc FROM employeetable,typetable WHERE employeetable.typeID=typetable.typeID AND empID=$empid ") or die($mysqli->error());
    if(count([$result])==1){
        $row=$result->fetch_array();
        $ename=$row['empName'];
        $iNo=$row['iqamaNo'];
        $passNo=$row['passportNo'];
        $emptype=$row['JobDesc'];
    }
}

?>