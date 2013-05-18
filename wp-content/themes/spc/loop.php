<div class="eight columns">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="row">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>

                <?php if( get_post_type() == 'page' ): ?>
                    <h1><?php the_title(); ?></h1>
                <?php elseif (get_post_type() == 'post'): ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="info">By: <?php the_author_posts_link(); ?> at <?php the_time('M d, Y h:i a') ?></p>
                <?php endif ?>

                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <?php if (function_exists('wp_pagination')):
            wp_pagination($additional_loop->max_num_pages);
        endif; ?>

    <?php else : ?>
        <article class="row">
            <h1>Not Found</h1>
            
            <div class="entry">
                <?php  
                if ( is_category() ) { 
                    printf("<p>Sorry, but there aren't any posts in the %s category yet.</p>", single_cat_title('',false));
                } else if ( is_date() ) {
                    echo("<p>Sorry, but there aren't any posts with this date.</p>");
                } else if ( is_author() ) {
                    $userdata = get_userdatabylogin(get_query_var('author_name'));
                    printf("<p>Sorry, but there aren't any posts by %s yet.</p>", $userdata->display_name);
                } else if ( is_search() ) {
                    echo("<p>No posts found. Try a different search?</p>");
                } else {
                    echo("<p>No posts found.</p>");
                }
                get_search_form(); 
                ?>
            </div>
        </article>
    <?php endif; ?>
</div>
