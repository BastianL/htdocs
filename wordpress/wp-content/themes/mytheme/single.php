<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>  
  <div class="post">
    <h1 class="post__title"><?php the_title(); ?></h1>
    <div class="post__content">
      <?php the_content();
    echo "</div>";
    if( has_category( 'jeux-video' ) ): ?>
      <div class="review">
        <div class="review__score">Note : <?php the_field( 'note' ); ?> / 10</div>
        <div class="review__cols">
          <div class="review__pros">Les plus : <?php the_field( 'les_plus' ); ?></div>
          <div class="review__cons">Les moins : <?php the_field( 'les_moins' ); ?></div>
        </div>

        <div class="review__date">Sortie le <?php the_field( 'date_de_sortie' ); ?></div>

        <?php if( get_field( 'pochette' ) ): 
          $picture = get_field( 'pochette' ); ?>
          <div class="review__picture">
            <img 
              src="<?= $picture['sizes']['post-thumbnail']; ?>" 
              alt="Pochette de <?php $picture['title']; ?>"
            >
          </div>
        <?php endif;
      echo "</div>";
    endif;
    comments_template(); // Par ici les commentaires
  echo "</div>";
endwhile; endif;