<?php
session_start();
require_once("../Admin/database/data_connection.php");
require_once "../Admin/database/methods.php";

$error = ""; // Variable to store error message

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = getIdByEmail($pdo, $email);

    if ($customer && password_verify($password, $customer['password'])) {
        $_SESSION["id"] = $user;

        if ($customer['role'] == 'user') {
            header("Location: home.php");
            exit();
        } else if ($customer["role"] == "admin") {
            header("Location: ../Admin/dashboard.php");
            exit();
        }
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../Assets/gemora.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="accbg">
        <div class="imgbg">
            <img src="../Assets/img/accbg2.jpg" alt="" class="symbol_cta">
        </div>
        <div class="fillin">
            <div class="fillin2">
                <h1>Sign In</h1>

                <!-- Error Message Box -->
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="detail">
                        Enter your email address <br>
                        <input type="text" name="email" class="first" id="email" required>
                    </div>

                    <div class="detail">
                        Enter your password <br>
                        <input type="password" name="password" class="first" id="pw1" required>
                    </div>

                    <div class="detail">
                        <button class="signin" type="submit" name="submit">Sign In</button> <br>
                        <p class="aldy">You don't have an account?</p>
                        <a href="register.php" class="going">Go to registration form</a>
                    </div>
                </form>

                <div class="backhp">
                    <a href="home.php"><img src="../Assets/img/left-arrow.png" alt="">Back to home page</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
