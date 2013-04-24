<div class="wrap">
    <div class="icon32" id="icon-options-general"><br /></div>
    <h2>ThemeName Settings</h2>
    
<?php if ($saved) : ?>
    <div class="updated settings-error">
        <p><strong>Settings saved.</strong></p>
    </div>
<?php endif; ?>
    
    <form action="" method="post" id="themesettingsform">
        <input type="hidden" value="update_theme_settings" name="action" />
        <h3>Pages Options</h3>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="contact_thank_page_id">"Contact - Thank" Page:</label></th>
                <td>
                <?php wp_dropdown_pages(array(
                    'selected' => isset($themeMods['contact_thank_page_id']) ? $themeMods['contact_thank_page_id'] : 0,
                    'name' => 'theme_mods[contact_thank_page_id]',
                    'show_option_none' => '---'
                ));?>
                </td>
            </tr>
        </table>
        <h3>General Options</h3>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="copyright_html">Copyright HTML</label></th>
                <td>
                    <textarea name="theme_mods[copyright_html]" class="widefat" rows="3" id="copyright_html"><?php echo isset($themeMods['copyright_html']) ? $themeMods['copyright_html'] : ''?></textarea>
                </td>
            </tr>
        </table>
        <p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit" /></p>
    </form>
</div>