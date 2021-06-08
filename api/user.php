<?php
//กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect_db.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

//ตรวจสอบหากใช้ Method GET
if ($requestMethod == 'POST') {
	//ตรวจสอบการส่งค่า id
	if (isset($_GET['id']) && !empty($_GET['id'])) {

		$id = $_GET['id'];

		//คำสั่ง SQL กรณี มีการส่งค่า id มาให้แสดงเฉพาะข้อมูลของ id นั้น
		$sql = "SELECT * FROM user WHERE id = $id";
	} else {
		//คำสั่ง SQL แสดงข้อมูลทั้งหมด
		$sql = "SELECT * FROM user";
	}

	$result = mysqli_query($link, $sql);

	//สร้างตัวแปร array สำหรับเก็บข้อมูลที่ได้
	$arr = array();

	while ($row = mysqli_fetch_assoc($result)) {

		$arr[] = $row;
	}

	echo json_encode($arr);
}

//อ่านข้อมูลที่ส่งมาแล้วเก็บไว้ที่ตัวแปร data
$data = file_get_contents("php://input");

//แปลงข้อมูลที่อ่านได้ เป็น array แล้วเก็บไว้ที่ตัวแปร result
$result = json_decode($data, true);

//ตรวจสอบการเรียกใช้งานว่าเป็น Method POST หรือไม่
if ($requestMethod == 'get') {

	if (!empty($result)) {

		$user_id = $result['user_id'];
		$restaurant_id = $result['restaurant_id'];
		$menu_name = $result['menu_name'];
		$menu_img = $result['menu_img'];
		$menu_detail = $result['menu_detail'];
		$menu_status = $result['menu_status'];

		//คำสั่ง SQL สำหรับเพิ่มข้อมูลใน Database
		$sql = "INSERT INTO user (id,user_id,restaurant_id,menu_name,menu_img,menu_detail,menu_status) VALUES (NULL,'$user_id','$restaurant_id','$menu_name','$menu_img','$menu_detail','$menu_status')";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo json_encode(['status' => 'ok', 'message' => 'Insert Data Complete']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Error']);
		}
	}
}

//ตรวจสอบการเรียกใช้งานว่าเป็น Method PUT หรือไม่
if ($requestMethod == 'PUT') {

	//ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
	if (isset($_GET['id']) && !empty($_GET['id'])) {

		$id = $_GET['id'];

		$user_id = $result['user_id'];
		$restaurant_id = $result['restaurant_id'];
		$menu_name = $result['menu_name'];
		$menu_img = $result['menu_img'];
		$menu_detail = $result['menu_detail'];
		$menu_status = $result['menu_status'];

		//คำสั่ง SQL สำหรับแก้ไขข้อมูลใน Database โดยจะแก้ไขเฉพาะข้อมูลตามค่า id ที่ส่งมา
		$sql = "UPDATE menus SET 
			user_id 		= '$user_id',
			restaurant_id   = '$restaurant_id',
			menu_name       = '$menu_name',
			menu_img        = '$menu_img',
			menu_detail     = '$menu_detail',
			menu_status     = '$menu_status'
			WHERE id        = $id";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo json_encode(['status' => 'ok', 'message' => 'Update Data Complete']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Error']);
		}
	}
}

//ตรวจสอบการเรียกใช้งานว่าเป็น Method DELETE หรือไม่
if ($requestMethod == 'DELETE') {

	//ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
	if (isset($_GET['id']) && !empty($_GET['id'])) {

		$id = $_GET['id'];

		//คำสั่ง SQL สำหรับลบข้อมูลใน Database ตามค่า id ที่ส่งมา
		$sql = "DELETE FROM menus WHERE id = $id";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo json_encode(['status' => 'ok', 'message' => 'Delete Data Complete']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Error']);
		}
	}
}
