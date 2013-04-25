<form method="post" action="<?php echo admin_url('admin-ajax.php');?>" class="kjwcontactform">
    <input type="hidden" name="action" value="kjw_submit_contact" />
    <ul>
        <li><input type="text" name="name" class="txt" value="Your Name" onfocus="if(this.value=='Your Name')this.value='';" onblur="if(this.value=='')this.value='Your Name';"/></li>
        <li><input type="text" name="email" class="txt" value="Your Email Address" onfocus="if(this.value=='Your Email Address')this.value='';" onblur="if(this.value=='')this.value='Your Email Address';"/></li>
        <li><textarea name="message" rows="5" cols="30" class="txt" onfocus="if(this.value=='Your Message')this.value='';" onblur="if(this.value=='')this.value='Your Message';">Your Message</textarea></li>
        <li><input type="submit" value="Submit" class="btn" /></li>
    </ul>
</form>