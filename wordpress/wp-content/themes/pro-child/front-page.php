

<?php get_header()?>

<style><?php include "style/reset.css"?></style>
<style><?php include "style/front-page.css"?></style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

    <section class="hero">  
        <div class="block-txt-hero">
            <h3 class="white f-size-18 m-15">Bienvenue chez Pokédex</h3>
            <h1 class="white f-size-60 f-f-2 m-25">Obtiens les pokémons que tu as toujours rêvé d’avoir</h1> 
            <h2 class="white f-size-20 m-35">Et deviens invincible en créant une team  inédite facilement...</h2>
            <button class="border-w white bg-b">En savoir plus</button>
        </div>
        <div class="block-img-hero">
            <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/img_hero_section-1.png" alt="">
        </div>
    </section>
    
    <section class="card_pokemon">
        <h2 class="pokedex-title">Le Pokédex </h2>

        <div class="pokedex">
            <?php 
                $pokemons = get_posts(array(
                    'numberposts' => 3,
                    'post_type'   => 'pokemon',
                    'order' => 'ASC'
                ));
                foreach($pokemons as $pokemon):
                    get_template_part('template-parts/carte-pokemon', 'carte-pokemon', array('pokemon' => $pokemon));
                endforeach;
            ?>
        </div>
    </section>

    <section class="team">
        <div class="p-90"> 
            <h1 class="white f-size-48 f-f-2 m-35">Créer ton équipe !</h1>
            <h2 class="white f-size-24 m-25">Deviens le meilleur dresseur de pokémons</h1>
            <h3 class="white f-size-18 m-15">Grâce à notre <span f-w-800> Pokédex</span> , découvre l’intégralité des pokémons et crée la meilleure équipe possible. </h1>
            <button class="border-w white bg-r">En savoir plus</button>
        </div>    
        <div>
            <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/img_team.png" alt="">
        </div>

    </section>

</html>

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
                <section class="actu bg-b">
                <h1 class="white f-f-2 f-size-48 p-90">Actualités du moment</h1>
                <div class="section-card">
            <?php while ($infos->have_posts()) : ?>
            <?php $infos->the_post(); ?>
                        <div class="card bg-w">
                                <img src="<?= the_field("image"); ?>" alt="">
                                <p class="black infos"> <?php echo get_the_title(); ?> </p>
                                <p class="f-f-2 black"> <?php echo get_the_date(); ?>  </p>
                            </div>
            <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>


<?php get_footer() ?>