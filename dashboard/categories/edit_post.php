<?php 
session_start();
require_once('../../path.php');
require_once(ROOT_PATH . '/db.php');

if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (empty($_POST['name'])) {
       $_SESSION['name_err']  = 'Name Field is Required';
    } else {
        $name = $_POST['name'];
    }

    if (empty($_SESSION['name_err'])) {
        $sql = "UPDATE categories SET name = '$name' where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['success'] = 'Category Updated';
            header('location:'.BASE_URL.'dashboard/categories/index.php');

        } else  {
            echo ' error ' . mysqli_error($conn);
        }
    } else {
        header('location:'.BASE_URL.'dashboard/categories/edit.php?id='.$_POST['id'].'');
    }
}
?>