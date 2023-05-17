<?php get_header(); ?>

<h1 class="site__heading"><?php post_type_archive_title(); ?></h1>

<main class="site__portfolio">
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    	<div class="project">
        	<h2 class="project__title">
                <a href="<?php the_permalink(); ?>">
                	<?php the_title(); ?>
                </a>
            </h2>
         	<?php the_post_thumbnail();
            the_terms( get_the_ID() , 'type-projet', 'Type de projet :', ', ', '' );
    	echo '</div>';
    endwhile; endif;
    echo '</main>';

    the_posts_pagination();
    get_footer();