<?php
require_once('db.php');
require_once('includes/header.php');

$email_err = $password_err = '';
$email = $password = '';

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $email_err = 'Email is required';
    } else {
        $email = $_POST['email'];
        $email_err = "";
    }
    if (empty($password)) {
        $password_err = 'Password is required';
    } else {
        $password = $_POST['password'];
        $password_err = "";
    }

    if (empty($email_err) && empty($password_err) ) {
        $sql = "SELECT * FROM users where email = '$email'";
        $check_email = mysqli_query($conn, $sql);

        if (mysqli_num_rows($check_email) > 0) {
            $user = mysqli_fetch_array($check_email);
            $db_pass = $user['password'];
            $pass_check = password_verify($password, $db_pass);
            if ($pass_check) {
                $_SESSION['name']  = $user['name'];
                $_SESSION['role']  = $user['role'];
                $_SESSION['login']  = 1;

                header('location:index.php');
            } else {
                $password_err = 'Password Not match!';
            }

        } else {
            $email_err = 'Email nai';
        }
    }
}
?>

<div class="container mt-5">

    <div class="row ">
        <div class="col-md-6 mt-5 mx-auto">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= $email ?>">
                    <span class="text-danger"><?= $email_err ?></span>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <span class="text-danger"><?= $password_err ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once('includes/footer.php');

?>