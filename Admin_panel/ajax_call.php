<?php
include_once "../Database/connect.php";
include_once "../Database/Database.php";
spl_autoload_register(function($class){
	include 'layout/Class/'.$class.'.php';
});
$db=new Database;
if(isset($_POST['quantity']) && isset($_POST['id']))
{
    $quantity=$_POST['quantity'];
    $id=$_POST['id'];
    $medicine_quantity=$db->select("medicine_list","id=$id")->fetch_assoc();
    $new_quantity=$medicine_quantity['quantity']+$quantity;
    $update=$db->update("medicine_list","quantity='$new_quantity'","id='$id'");
    if($update)
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
}

if (isset($_POST['id']))
{
	$id=$_POST['id'];
	$medicine=$db->select("medicine_list","id=$id")->fetch_assoc();
	if($medicine)
	{
		$data=json_encode($medicine);
		echo $data;
	}
}

if (isset($_POST['edit_id']))
{
	$id=$_POST['edit_id'];
	$medicine_name=$_POST['medicine_name'];
	$category=$_POST['category'];
	$purchase_price=$_POST['purchase_price'];
	$selling_price=$_POST['selling_price'];
	$store_box=$_POST['store_box'];
	$quantity=$_POST['quantity'];
	$genric_name=$_POST['genric_name'];
	$company=$_POST['company'];
	$effects=$_POST['effects'];
	$expire_date=$_POST['expire_date'];

	$update_medicine=$db->update("medicine_list","medicine_name='$medicine_name',category='$category',purchase_price='$purchase_price',selling_price='$selling_price',store_box='$store_box',quantity='$quantity',genric_name='$genric_name',company='$company',effects='$effects',expire_date='$expire_date'","id=$id");
	if ($update_medicine)
	{
		echo "true";
	}
	else {
		echo "false";
	}
}
?>
