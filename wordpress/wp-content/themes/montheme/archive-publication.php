
<?php
    get_header();
    echo "<h1>Liste des publications</h1>";

    if(have_posts()){
        while(have_posts())
        {
            the_post();
        ?>
        <article>
            <header>
            <h1 id="post-<?php the_ID(); ?>">
                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>
 
                <aside>
                    <span><?php the_author(); ?></span>
                    <span><?php the_date(); ?></span> 
                </aside>
            </header>
            <section>
                <?php the_content(); ?>
            </section>
            <footer>
                <p class="postmetadata">Dans la catégorie: <?php the_category(); ?> | Les tags: <?php the_tags(); ?> | <a href="<?php comments_link(); ?>" title="Leave a comment">Commentaires</a></p>
            </footer>
        </article>
        <?php
        }
    }
    get_footer();

