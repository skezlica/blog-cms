<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/manageUsers.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css">

<div class="navbar">
    <div class="profile">
        <img src="<?= ROOT ?>/assets/images/profile.png" alt="">
        <p><?= $_SESSION['user']->email; ?></p>
    </div>
    <ul>
        <li><a href="<?=ROOT?>/home">Home</a></li>
        <li><a href="<?=ROOT?>/dashboard">Dashboard</a></li>
        <li><a href="<?=ROOT?>/signout">Sign Out</a></li>
    </ul>
</div>

<div class="users-table">
    <h2>Users List</h2>
    <table>
        <tr>
            <td>Id</td>
            <td>Email</td>
            <td>Role</td>
            <td>Created At</td>
            <td>Action</td>
        </tr>

        <?php foreach ($data['users'] as $user): ?>
            <tr>
                <td><?=$user->id?></td>
                <td><?=$user->email?></td>
                <td><?=$user->role_name?></td>
                <td><?=$user->created_at?></td>
                <td>
                    <form method="POST" action="<?= ROOT ?>/manageUsers/deleteUser">
                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                        <button type="submit">
                            <img src="<?= ROOT ?>/assets/images/bin.png" alt="">
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="set-user">
    <h2>Set User</h2>
    <form method="POST" action="<?= ROOT ?>/manageUsers/updateUser">
        <?php if(!empty($errors)):?>
            <div class="alert">
                <?= implode("<br>", $errors) ?>
            </div>
        <?php endif; ?>
        <label for="category_id">Select User:</label>
        <select name="user_id" required>
            <option value="0"></option>
            <?php foreach ($data['users'] as $user): ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->email; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="category_id">Select Role:</label>
        <select name="role_id" required>
            <option value="0"></option>
            <?php foreach ($data['roles'] as $role): ?>
                <option value="<?php echo $role->id; ?>"><?php echo $role->role_name; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Update Role</button>
    </form>
</div>
