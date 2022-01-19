
<style><?php include "style/reset.css"?></style>
<style><?php include "style/page-actualites.css"?></style>
<?php


get_header();

?>

<div class="video1">
    <iframe  src="https://www.youtube.com/embed/MlqTV4FQ3WI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

   <!-- Query actualité  -->
   <?php
    $arguments = [
            'post_type' => 'pokemon-actu',
            'posts_per_page' => '3',
    ];
    $infos = new WP_Query($arguments); 
    ?> 

        <!-- Actualité -->
        <?php if ($infos->have_posts()) : ?>
            <section class="actu-block bg-b">
            <h1 class="white">3 Actualités Pokémon </h1>
            <?php while ($infos->have_posts()) : ?>
            <?php $infos->the_post(); ?>     
            <div class="card">
                <img src="<?= the_field("image2"); ?>" alt="">      
                <div class="infos-card">
                <h2 ><?php echo get_the_date(); ?></h2>
                    <h1 class="f-f-2 f-size-36 red "><?php echo get_the_title(); ?></h1>
                    <h3 class="f-size-24 "><?= the_field("titre2"); ?></h3>
                    <p class="f-size-18 black"><?php echo get_the_content(); ?></p>
                    <button class=""><a href=""> POKEMON TV </a></button>

                </div>
            </div>       

            <?php endwhile; ?>
          
        </section>
    <?php endif; ?>

<?php
get_footer();


?>