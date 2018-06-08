<?php

require_once '../dbconfig.php';


if(isset($_POST['save']))
{
	$uname = $_POST['uname'];
	$umail = $_POST['umail'];
	
	$stmt = $DBcon->prepare("INSERT INTO news(titre,contenu) VALUES(:uname, :umail)");
	
	$stmt->bindparam(':uname', $uname);
	$stmt->bindparam(':umail', $umail);
	$stmt->execute();

}
if(isset($_GET['delete_id']))
{
	$id = (int) $_GET['delete_id'];
	$stmt = $DBcon->prepare("DELETE FROM news WHERE id=:id");
	$stmt->execute(array(':id' => $id));
	header("Location: index.php");
}

if(isset($_GET['edit_id']))
{
	$stmt = $DBcon->prepare("SELECT * FROM news WHERE id=:id");
	$stmt->execute(array(':id' => $_GET['edit_id']));
	$editRow=$stmt->FETCH(PDO::FETCH_ASSOC);
	
}

if(isset($_POST['update']))
{
	$uname = $_POST['uname'];
	$umail = $_POST['umail'];
	$id = $_GET['edit_id'];
	
	$stmt = $DBcon->prepare("UPDATE news SET titre=:uname, contenu=:umail WHERE id=:id");
	$stmt->bindparam(':uname', $uname);
	$stmt->bindparam(':umail', $umail);
	$stmt->bindparam(':id', $id);
	$stmt->execute();
	header("Location: index.php");
}