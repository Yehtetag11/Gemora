<?php
require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";

// Get user ID from URL
$id = $_GET['id'];
$products = get_user_id($pdo, $id);
?>

<div class="createbg">
    <div class="blurbg">
        <div class="createbg2">
            <div class="create">
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="user_name" class="input" value="<?= htmlspecialchars($products['name']) ?>" disabled>

                    <label for="age">Age</label>
                    <input type="text" id="age" name="user_age" class="input" value="<?= htmlspecialchars($products['age']) ?>" disabled>

                    <label for="gender">Gender</label>
                    <select name="user_gender" id="gender" class="input" disabled>
                        <option value="male" <?= $products['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?= $products['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
                        <option value="others" <?= $products['gender'] == 'others' ? 'selected' : ''; ?>>Others</option>
                    </select>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="user_email" class="input" value="<?= htmlspecialchars($products['email']) ?>" disabled>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="user_password" class="input" value="<?= htmlspecialchars($products['password']) ?>" disabled>

                    <label for="role">Role</label>
                    <select name="user_role" id="role" class="input">
                        <option value="admin" <?= $products['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?= $products['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                    </select>

                    <div class="btn">
                        <button type="submit" name="update_user" class="btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Check if form is submitted
if (isset($_POST['update_user'])) {
    $userrole = $_POST['user_role'];

    // Update only the role
    $sql = "UPDATE users SET role = :role WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':role', $userrole);
        $stmt->execute();

        // Redirect after update
        header("Location: usertable.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
