<?php
get_header()
?>
<style><?php include "style/reset.css"?></style>
<style><?php include "style/page-gere.css"?></style>

<h1 class="f-size-36 red">Gérer mon équipe</h1>

<!-- <form name="x" action="page.php" method="post"> -->
<!-- <input type="submit" value="Francis Huster"> -->
<!-- </form> -->

<div>
    <div class="all-joueur">
    
        <div class="nom-equipe f-f-1 f-size-28">
            <span class="joueur-seul white">
                Pokepoka
            </span>
        </div>
        <a href="http://localhost:8888/wordpress/gerer-equipe-2/">
        <div class="nom-equipe-1 red f-f-1 f-size-28">
            <span class="joueur-seul">
                Francis Huster
            </span></a>
        </div>        
        <a href="http://localhost:8888/wordpress/gerer-equipe-3/">
        <div class="nom-equipe-1 red f-f-1 f-size-28">
            <span class="joueur-seul">
                Team rocket
            </span>
        </div></a>
        
    </div>

        <div class="equipe f-size-28 f-f-1 black ">
                    #1 Pokepoka - 30
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_199_1385)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6015 1.5H4.5324V3.0465H-0.0117188V10.3005C-0.0117188 13.104 3.05593 15.411 6.06622 15.651C7.05446 16.731 8.79269 17.5155 10.3398 17.85V19.746C8.86034 20.2095 6.21769 21.2985 6.06622 22.485H16.2192C16.0662 21.2985 13.1545 20.208 11.6721 19.746V17.85C13.225 17.5155 15.0412 16.731 16.0309 15.651C19.0398 15.411 21.9721 13.104 21.9721 10.3005V3.0465H17.6015V1.5ZM1.38387 4.4205H4.42652V10.6695C4.42652 11.9025 4.73828 13.0755 5.28681 14.1315C3.01034 13.392 1.38387 11.487 1.38387 9.258V4.4205ZM13.3015 12.042L11.0309 10.7655L8.7574 12.042L9.19122 9.342L7.35299 7.431L9.89269 7.0365L11.0309 4.5825L12.1662 7.0365L14.7059 7.431L12.8677 9.342L13.3015 12.042ZM16.6765 14.331C17.228 13.227 17.5442 12.006 17.5442 10.7145V4.461H20.5942V9.24C20.5942 11.5695 18.9603 13.5585 16.6765 14.331Z" fill="black"/>
                            </g>
                                <defs>
                                <clipPath id="clip0_199_1385">
                                <rect width="25" height="24" fill="white"/>
                                </clipPath>
                        </defs>
                    </svg>
        </div>
    
    <div class="pokedex pas-de-plus avoir-moins responsive">
            <?php 
                $pokemons = get_posts(array(
                    'numberposts' => 6,
                    'post_type'   => 'pokemon',
                    'order' => 'ASC'
                ));
                foreach($pokemons as $pokemon):
                    get_template_part('template-parts/carte-pokemon', 'carte-pokemon', array('pokemon' => $pokemon));
                endforeach;
            ?>
        </div>

</div>

<?php get_footer()?>