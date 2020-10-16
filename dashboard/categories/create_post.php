<?php 
require_once('../../path.php');
require_once(ROOT_PATH . '/db.php');
require_once(ROOT_PATH . '/function.php');

if (isset($_POST['create']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = 'sdsfd';
    if (empty($_POST['name'])) {
       $_SESSION['name_err']  = 'Name Field is Required';
    } else {
        $name = $_POST['name'];
    }
    $status = 1;

    if (empty($_SESSION['name_err'])) {
        $data = [
            'name' => $name,
            'status' => $status,
        ];
        $insert = db_insert('categories', $data);
        if ($insert) {
            $_SESSION['success'] = 'insert successfully';
            header('location:'.BASE_URL.'dashboard/categories/index.php');
        } else {
            $_SESSION['error'] = 'not insert';
            header('location:'.BASE_URL.'dashboard/categories/index.php');
        }
    } else {
        header('location:'.BASE_URL.'dashboard/categories/create.php');
    }
}
