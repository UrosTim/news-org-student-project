<!--prikaz profila ako je status ulogovan-->
<page-profile>
    <?php if (($_SESSION['loggedin'] ?? '') == 1) : ?>
        <page-profile-body>
            <?php foreach ($data AS $i => $d): ?>
            <?php if ($_SESSION['username'] == $d['users_username']): ?>
            <div class="show-users">
                <h2><?= $_SESSION['username'] ?> profile info</h2>
                <ul class="responsive-table">
                    <li class="table-header">
                        <div class="col col-1">User Id</div>
                        <div class="col col-2">Username</div>
                        <div class="col col-3">Password</div>
                        <div class="col col-4">Joined</div>
                    </li>
                    <li class="table-row">
                        <div class="col col-1" data-label="User Id"><?= $d['users_id'] ?></div>
                        <div class="col col-2" data-label="Username"><?= $d['users_username'] ?></div>
                        <div class="col col-3" data-label="Password"><?= $d['users_password'] ?></div>
                        <div class="col col-4" data-label="Joined"><?= $d['users_date'] ?></div>
                    </li>
                </ul>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <button class="logout-btn">
                <a href="<?= FILE_LOGIN ?>&action=logout">Logout</a>
            </button>
            <button class="change-password">
                <a href="<?= FILE_UPDATE ?>">Change password</a>
            </button><br><br>
            <button class="logout-btn">
                <a href="<?= FILE_PROFILE ?>&action=delete">Delete account</a>
            </button>
        </page-profile-body>
<!--    prikaz svih korisnickih profila za admin nalog-->
        <?php if (is_admin()): ?>
        <div class="show-users">
            <h2>List of all users</h2>
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">User Id</div>
                    <div class="col col-2">Username</div>
                    <div class="col col-3">Password</div>
                    <div class="col col-4">Joined</div>
                </li>
                <?php foreach ($data AS $i => $d): ?>
                <li class="table-row">
                    <div class="col col-1" data-label="User Id"><?= $d['users_id'] ?></div>
                    <div class="col col-2" data-label="Username"><?= $d['users_username'] ?></div>
                    <div class="col col-3" data-label="Password"><?= $d['users_password'] ?></div>
                    <div class="col col-4" data-label="Joined"><?= $d['users_date'] ?></div>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
            </ul>
        </div>
    <?php else: ?>
<!--    ako status nije ulogovan, prikaz opcija za prijavu ili registraciju-->
        <login-part>
            <button class="login-part-btn">
                <a href="<?= FILE_LOGIN ?>">Login</a>
            </button>
        </login-part>
        <signup-part>
            <button class="signup-part-btn">
                <a href="<?= FILE_USERS ?>&action=create">Sign Up</a>
            </button>
        </signup-part>
    <?php endif; ?>
</page-profile>