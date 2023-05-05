<?php
echo '<section>';
get_header();
if(have_posts()) :
    while(have_posts()) :
        the_post();
        ?>
            <article>
                <h1><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h1>
                <div>
                    <?php the_excerpt(); ?>
                </div>
                <footer>
                    <?php the_date(); ?>
                    <?php the_category(); ?>
                </footer>
            </article>
        <?php
    endwhile;
endif;
echo '<aside>';
dynamic_sidebar('blog-widget');
echo '</aside>';
echo '</section>';

get_footer();