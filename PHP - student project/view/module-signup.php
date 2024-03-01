<!--prikaz, forma za registraciju-->
<page-login>
    <registration-container>
        <form method="post" action="create">
            <h2>Registration</h2>
            <input-container>
                <input type="text" name="username" placeholder="Username">
            </input-container>
            <input-container>
                <input type="password" name="password" placeholder="Password">
            </input-container>
            <input-container>
                <input type="password" name="confirm-password" placeholder="Confirm password">
            </input-container>
            <login-btn-wrap>
                <button class="login-btn" >
                    <a href="<?= FILE_SIGNUP ?>&action=create">Submit</a>
                </button>
            </login-btn-wrap>
        </form>
    </registration-container>
</page-login>