<?php get_header() ?>
<main>
    <section class="crm-section">
    <div class="post">            
            <h1><a href = "<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <article>
                <?php the_content(); ?>
            </article>
            <aside>            
                <span>Dans <?= get_the_category()[0]->name ?></span>            
                <span>Par <?php the_author_link() ?></span>
                <span>le <?php the_time('j F'); 
                echo " à ";
                the_time(); ?>
                </span>
                <span><?php the_tags() ?></span>
            </aside>
        </div>
    <aside class="crm-aside">
        <?php dynamic_sidebar( 'crm-sidebar' ); ?>
    </aside>
</main>
<?php get_footer() ?>