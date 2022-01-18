<?php get_header()?>
<style><?php include "style/reset.css"?></style>
<style><?php include "style/page-pokedex.css"?></style>


<h1>Recherche un Pokémon !</h1>
<section class="section-search">
    <div>
        <img src="" alt="loupe">
    </div>
</section>
<h2>Le Pokédex - Attrapez les tous !  </h2>
<div
<section class="card_pokemon">
    <div class="pokedex">
            <?php 
                while (have_posts()): the_post();
                    get_template_part('template-parts/carte-pokemon', 'carte-pokemon', array('pokemon' => $post));
                endwhile;

            ?>
    </div>


    <div class="page">
        
        <div class="paginate">
            <?php
            echo paginate_links();

            ?>
        </div>


    </div>
    



</section>



<?php get_footer()?>