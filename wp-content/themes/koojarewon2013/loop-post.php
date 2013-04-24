<?php if (have_posts()) : ?>
    
    <div class="posts">
    
    <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
            <?php the_excerpt();?>
        </div>
    <?php endwhile; ?>
    
    </div>
        
    <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="pagination">
    		<div class="left"><?php next_posts_link( __( '&larr; Older posts' ) ); ?></div>
    		<div class="right"><?php previous_posts_link( __( 'Newer posts &rarr;' ) ); ?></div>
    		<div class="clear"></div>
    	</div>
    <?php endif; ?>

<?php else : ?>

    <h3>No posts found.</h3>

<?php endif; ?>