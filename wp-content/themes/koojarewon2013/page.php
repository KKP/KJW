<?php get_header();?>

    <?php if (have_posts()) : ?>
    
        <?php
            while (have_posts()) :
                the_post();
        ?>
            <h1 id="pagetitle" class="inner"><?php the_title()?></h1>
            <div id="main" class="side">
                <div class="inner">
                    <div id="content" class="left">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="posthumb"><?php the_post_thumbnail('kjw_660x'); ?></div>
                    <?php endif; ?>
                        <div class="format"><?php the_content();?></div>
                    </div><!-- #content -->
                    <div id="sidebar" class="right">
                        <?php dynamic_sidebar('default-sidebar')?>
                    </div><!-- #sidebar -->
                    <div class="clear"></div>
                </div>
            </div><!-- #main -->
        <?php endwhile; ?>
        
    <?php else : ?>
    
        <h1 id="pagetitle" class="inner">Page Not Found</h1>
    
    <?php endif; ?>

<?php get_footer();?>