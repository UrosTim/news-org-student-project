<!--prikaz, forma za registraciju-->
<?php  if (!empty($_message)): ?>
    <br>
    <a href="<?= FILE_LOGIN ?>" style="font-size: 2em"
       onmouseover="this.style.color = '#9dd7cf'"
       onmouseout="this.style.color = '#00008bd9'">Proceed to log in</a>
<?php   else:   ?>
<page-login>
    <registration-container>
        <form method="post">
            <h2>Registration</h2>
            <input-container>
                <input type="text" name="username" value="<?= $username ?? '' ?>" placeholder="Username">
            </input-container>
            <input-container>
                <input type="password" name="password" placeholder="Password">
            </input-container>
            <input-container>
                <input type="password" name="confirm_password" placeholder="Confirm password">
            </input-container>
            <login-btn-wrap>
                <button class="login-btn" >Submit</a></button>
            </login-btn-wrap>
        </form>
    </registration-container>
</page-login>
<?php   endif;     ?>