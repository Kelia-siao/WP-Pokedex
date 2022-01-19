

<?php get_header()?>

<style><?php include "style/reset.css"?></style>
<style><?php include "style/front-page.css"?></style>


    <section class="hero">  
        <div class="block-txt-hero">
            <h3 class="white f-size-18 m-15">Bienvenue chez Pokédex</h3>
            <h1 class="white f-size-60 f-f-2 m-25">Obtiens les pokémons que tu as toujours rêvé d’avoir</h1> 
            <h2 class="white f-size-20 m-35">Et deviens invincible en créant une team  inédite facilement...</h2>
            <button class="border-w  bg-w"> <a href="http://localhost:8888/wordpress/createteam/">En savoir plus</a></button>
        </div>
        <div class="block-img-hero">
            <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/img_hero_section-1.png" alt="">
        </div>
    </section>
    
    <section class="card_pokemon">
        <h2 class="pokedex-title m-l-45 m-t-b-50">Le Pokédex </h2>

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
            <section class="pokemon">
                <h1 class=" f-f-2 m-l-45 f-size-36 red">Les Pokémons du moment </h1>
                <div class="flex p-45 gap-20">
                    <div class="flex-c">
                        <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/Capture-décran-2022-01-17-à-10.41-1.png" alt="">
                        <span>Gendar</span>
                    </div>
                    <div class="flex-c">
                        <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/Capture-décran-2022-01-17-à-10.35-1.png">
                        <span>Snorlax</span>
                    </div>
                    <div class="flex-c">
                        <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/Capture-décran-2022-01-17-à-10.37-1.png" alt="">
                        <span>Mimikyu</span>
                    </div>
                    <div class="flex-c">
                        <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/Capture-décran-2022-01-17-à-10.32-2.png" alt="">
                        <span>Eevee</span>
                    </div>
                    <div class="flex-c">
                        <img src=http://localhost:8888/wordpress/wp-content/uploads/2022/01/Capture-décran-2022-01-17-à-10.32-3.png>
                        <span>Piplup </span>
                    </div>
                    <div class="flex-c">
                        <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/Capture-décran-2022-01-17-à-10.32-1.png" alt="">
                        <span>Pikachu</span>
                    </div>
                </div>
            </section>


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
            <div class="button-actu">
                <button class="bg-opacity border-w"><a class="white" href="http://localhost:8888/wordpress/actualites/">En savoir plus</a></button>
            </div>
            
        </section>
    <?php endif; ?>
    <section class="partenaire">
            <h2 class="f-f-2 red f-size-36">Nos partenaires</h2>
            <div>
                <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/image-59.png" alt="pokemon-logo">
                <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/image-61.png" alt="niantic-logo">
                <img src="http://localhost:8888/wordpress/wp-content/uploads/2022/01/image-60.png" alt="nitendo">
            </div>



    </section>


<?php get_footer() ?>