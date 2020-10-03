<?php
require_once('db.php');
require_once('includes/header.php');
// print_r($_SERVER) ;
$name_err = $email_err = $password_err = $c_password_err = '';
$name = $email = $password = $c_password = '';
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $gender = $_POST['gender'];

    if (empty($name)) {
        $name_err = 'Name is required';
    } else {
        $name = $_POST['name'];
        $name_err = "";
    }
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
    if (empty($c_password)) {
        $c_password_err = 'Confirm Password is required';
    } else {
        // code for confirm password
        if ($password == $c_password) {
            $password = $password;
            $c_password_err = "";
            $password = $_POST['password'];
        } else {
            $c_password_err  = "Confirm Password Not Match!";
        }
    }

    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($c_password_err)) {
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password, gender) VALUES ('$name', '$email', '$hash_pass', '$gender')";

        $insert = mysqli_query($conn, $sql);

        if ($insert) {
            echo 'done';
        } else {
            echo 'Error ' . mysqli_error($conn);
        }
    }
    // $hash_pass = password_hash($password, PASSWORD_BCRYPT);
    // $sql = "INSERT INTO users (name, email, password, gender) VALUES ('$name', '$email', '$hash_pass', '$gender')";

    // $insert = mysqli_query($conn, $sql);

    // if ($insert) {
    //     echo 'done';
    // } else {
    //     echo 'Error ' . mysqli_error($conn);
    // }
}
?>

<div class="container mt-5">

    <div class="row ">
        <div class="col-md-6 mt-5 mx-auto">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
                    <span class="text-danger"><?= $name_err ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= $email ?>">
                    <span class="text-danger"><?= $email_err ?></span>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <span class="text-danger"><?= $password_err ?></span>
                    </div>
                    <div class="form-group">
                        <label for="c_password">Confirm Password</label>
                        <input type="password" class="form-control" id="c_password" name="c_password">
                        <span class="text-danger"><?= $c_password_err ?></span>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                                    <label class="form-check-label" for="gridRadios2">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php
require_once('includes/footer.php');

?>