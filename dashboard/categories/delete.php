<?php
require_once('../../path.php');
require_once(ROOT_PATH . '/db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == '') {
        $url = BASE_URL . 'dashboard/categories/index.php';
        header('location:' . $url . '');
    }
}

$sql = "DELETE FROM categories WHERE id = '$id'";

$delete = mysqli_query($conn, $sql);
if ($delete) {
    $_SESSION['success'] = 'Deleted successfully';
    header('location:' . BASE_URL . 'dashboard/categories/index.php');
} else {
    $_SESSION['error'] = 'Not  delete ' . mysqli_error($conn);
    header('location:' . BASE_URL . 'dashboard/categories/index.php');
}
