<form method="post" action="<?php echo admin_url('admin-ajax.php');?>" id="contactform">
    <input type="hidden" name="action" value="themecode_submit_contact" />
    <ul>
        <li><input type="text" name="name" placeholder="Your Name" class="txt" /></li>
        <li><input type="text" name="email" placeholder="Email Address" class="txt" /></li>
        <li><input type="text" name="phone" placeholder="Phone Number" class="txt" /></li>
        <li><textarea name="message" rows="5" cols="30" placeholder="Your Message" class="txt"></textarea></li>
        <li><input type="submit" value="SEND" class="btn" /></li>
    </ul>
</form>