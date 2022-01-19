<?php get_header()?>
<style><?php include "style/reset.css"?></style>
<style><?php include "style/page-pokedex.css"?></style>


<h1>Recherche un Pokémon !</h1>
<section class="section-search">
    <div>
        <form method="get" action="<?php echo home_url(); ?>">
        
            <input class="barre" type="text" name="s" value="<?php echo get_search_query(); ?>">
            <input class="barre" type="submit" name="submit">
       
        </form>
    </div>
</section> 
<!-- récupérer nom de la nature -->
<h2 class="pokedex-title">Tous les Pokémons de type <span class="pokedex-gris"><?php single_term_title(); ?></span> </h2>
<div>
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