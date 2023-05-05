<?php
    get_header();
?>
<h1> Page article payant </h1>
<?php

    if(have_posts()): 
        /*if ( have_posts() ) { while ( have_posts() ) { the_post(); // // Post Content here // } // end while} // end if*/
    ?>
    <!-- les fonction s ci-dessous sont des templates tags, elles permettent de récuper le contenu d'une page, d'une publication, etc....-->
    <h1> 
        <?php the_title(); ?>
    </h1>
    <?php the_content(); ?>
    <p>prix:
        <?php the_field('prix');?> 
        €
    </p> 
    <p>
        <label>Durée de lecture : </label>
            <?php the_field('jour_de_lecture') ?>
            jours de lecture
        </p>
        <p>
            <label>Date de diffusion : </label>
            <?php the_field('date_de_diffusion') ?>
        <!--function ACF qui permet d'afficher les champs personnalisés--> 
        <!-- get_field('lien_bibliographique') lien qui permet de récupérer les champs personnalisés. 
        <?php endif; 
    // mets fin à la boucle // endif met fin à la condition 
?>
<?php get_footer() ?>