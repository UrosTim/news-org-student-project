<!--prikaz, obrzac za prijavu-->
<page-login>
    <login-container>
        <form method="post">
            <h2>Login</h2>
            <input-container>
                <input type="text" name="username" value="<?= $username ?? '' ?>" placeholder="Username">
            </input-container>
            <input-container>
                <input type="password" name="password" placeholder="Password">
            </input-container>
            <login-btn-wrap>
                <button class="login-btn">Login</button>
            </login-btn-wrap>
        </form>
    </login-container>
</page-login>