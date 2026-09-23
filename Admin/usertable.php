<?php require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php"
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
            <?php
            $users = get_user($pdo);
            foreach ($users as $user):
            ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><img src="../Assets/profileimg/<?= $user['img_url']; ?>" class="userpfp"></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['age']; ?></td>
                    <td><?= $user['gender']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td>
                        <a href="user_update.php?id=<?= $user['id'] ?>" class="btn">
                            <img class="editimg" src="../Assets/img/edit.png" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="user_delete.php?id=<?= $user['id'] ?>" class="delbtn" onclick="return confirm('Are you sure you want to delete this user?');">
                            <img class="delimg" src="../Assets/img/delete.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>