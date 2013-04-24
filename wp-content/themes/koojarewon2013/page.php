<?php get_header();?>

    <?php if (have_posts()) : ?>
    
        <?php
            while (have_posts()) :
                the_post();
        ?>
            <h1><?php the_title()?></h1>
            <div class="format"><?php the_content();?></div>
        <?php endwhile; ?>
        
    <?php else : ?>
    
        <h3>No page found.</h3>
    
    <?php endif; ?>

<?php get_footer();?>