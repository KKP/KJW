<?php if (is_active_sidebar('footer-widgets')) : ?>
    <div id="footer">
        <div class="inner">
            <?php dynamic_sidebar('footer-widgets'); ?>
            <div class="clear"></div>
        </div>
    </div><!-- #footer -->
<?php endif; ?>
    
<div id="btmbar">
    <div class="inner"><?php echo get_theme_mod('copyright_html')?></div>
</div><!-- #btmbar -->
<?php wp_footer();?>
</body>
</html>