<?php get_header();

echo "<h1>page.php</h1>";
if(have_posts()):
    while (have_posts()) : the_post(); ?>
    <article>                
        <header>                
            <h1>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>                    
            <aside>                        
                <span><?php the_date(); ?></span>                        
                <span><?php the_author(); ?> </span>                    
            </aside>                
        </header>                
        <section>
            <?php ?>       
            <?php the_content(); ?> 
           
        </section>            
        
    </article>
    <?php
    endwhile;
endif;
get_footer();
