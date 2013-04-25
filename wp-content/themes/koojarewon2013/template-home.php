<?php
/**
 * Template Name: Homepage Template
 */
get_header();?>

    <?php if (have_posts()) : ?>
    
        <?php
            while (have_posts()) :
                the_post();
                $postID = get_the_ID();
        ?>
            <?php $Koojarewon->getSlider($postID); ?>
            
            <div id="main">
                <div class="inner">
                    <div id="content" class="left">
                        <div id="primary_col" class="left">
                            <div class="format"><?php the_content();?></div>
                        </div>
                        <div id="secondary_col" class="right">
                            <?php dynamic_sidebar('homepage-widgets');?>
                        </div>
                        <div class="clear"></div>
                    </div><!-- #content -->
                    <div id="sidebar" class="right">
                        <?php dynamic_sidebar('homepage-sidebar')?>
                    </div><!-- #sidebar -->
                    <div class="clear"></div>
                </div>
            </div><!-- #main -->
        <?php endwhile; ?>
        
    <?php else : ?>
    
        <h1 id="pagetitle" class="inner">Page Not Found</h1>
    
    <?php endif; ?>

<?php get_footer();?>