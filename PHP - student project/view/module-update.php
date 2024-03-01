<!--prikaz, forma za promenu sifre-->
<?php  if (!empty($_message)): ?>
    <br>
    <a href="<?= FILE_PROFILE ?>" style="font-size: 2em"
       onmouseover="this.style.color = '#9dd7cf'"
       onmouseout="this.style.color = '#00008bd9'">Back to profile</a>
<?php   else:   ?>
<update-profile>
    <div class="update-container">
        <h2>Change your password</h2>
        <form method="post">
            <input type="password" placeholder="Enter your password" name="password">
            <input type="password" placeholder="Enter new password" name="new_password">
            <input type="password" placeholder="Confirm new password" name="confirm_new_password">
            <button class="submit-change-btn">Submit</button>
        </form>
    </div>
</update-profile>
<?php   endif;     ?>