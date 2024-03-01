<!--link za povratak na home-->
<?php  if (!empty($_message)): ?>
    <br>
    <a href="<?= FILE_INDEX ?>">Back to home page.</a>
<?php   else:   ?>
<!--prikaz forme-->
<div class="contact-main">
        <div class="contact-container">
            <div class="contact-box">
                <p>Contact us</p>
                <form id="contact-form" method="post">
                    <div class="input-row">
                        <div class="input-group">
                            <label>Full name</label>
                            <input type="text" placeholder="John Smith" name="name" value="<?= $_POST['name'] ?? '' ?>">
                        </div>
                        <div class="input-group">
                            <label>Phone numb.</label>
                            <input type="text" placeholder="060/1234-567" name="phone" value="<?= $_POST['phone'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" placeholder="example@gmail.com" name="email" value="<?= $_POST['email'] ?? '' ?>">
                        </div>
                        <div class="input-group">
                            <label for="subject">Subject</label>
                            <input type="text" placeholder="Article review" name="subject" value="<?= $_POST['subject'] ?? '' ?>">
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea rows="5" placeholder="Your message" name="message"><?= $_POST['message'] ?? '' ?></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
</div>
<?php   endif;     ?>