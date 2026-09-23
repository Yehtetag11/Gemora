<?php 
require_once "../Admin/database/data_connection.php";
require_once "nevbar.php";
require_once "../Admin/database/methods.php";

$users = get_user($pdo); // Fetch all users by default

if (isset($_GET['query'])) {
    $search = "%" . $_GET['query'] . "%";
    $search_int = (int)$_GET['query']; // Convert numeric input

    $sql = "SELECT * FROM users 
            WHERE id = :search_int
            OR name LIKE :search
            OR age = :search_int
            OR gender LIKE :search
            OR email LIKE :search
            OR role LIKE :search";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->bindParam(':search_int', $search_int, PDO::PARAM_INT);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="searchbtn">
    <form class="d-flex" role="search" method="GET" action="search_user.php">
        <input class="form-control srch" type="search" name="query" placeholder="Search..." required>
        <button class="btn" type="submit"></button>
    </form>
</div>

<div class="bgdiv2">
    <table class="table2">
        <thead>
            <tr class="pdtitle2">
                <th class="pddetail2">ID</th>
                <th class="pddetail2">User Profile</th>
                <th class="pddetail2">Name</th>
                <th class="pddetail2">Age</th>
                <th class="pddetail2">Gender</th>
                <th class="pddetail2">Email Address</th>
                <th class="pddetail2">Role</th>
                <th class="pddetail2">Edit</th>
                <th class="pddetail2">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($users)): ?>
                <tr>
                    <td colspan="9" style="text-align: center;">No users found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td>
                            <img src="../Assets/profileimg/<?= htmlspecialchars($user['img_url']); ?>" class="userpfp">
                        </td>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['age']); ?></td>
                        <td><?= htmlspecialchars($user['gender']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td>
                            <a href="user_update.php?id=<?= $user['id'] ?>" class="btn">
                                <img class="editimg" src="../Assets/img/edit.png" alt="Edit">
                            </a>
                        </td>
                        <td>
                            <a href="user_delete.php?id=<?= $user['id'] ?>" class="delbtn" onclick="return confirm('Are you sure you want to delete this user?');">
                                <img class="delimg" src="../Assets/img/delete.png" alt="Delete">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>