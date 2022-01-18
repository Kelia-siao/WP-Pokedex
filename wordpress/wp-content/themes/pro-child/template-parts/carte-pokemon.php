<?php
    $pokemon = $args['pokemon'];
?>

<div class="pokedex-seul">
    <svg class="icone-add" width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="29.5" cy="29.5" r="29.5" fill="#A82424"/>
        <path d="M40.8228 32.3H32.1498V40.875H26.9068V32.3H18.2338V27.4H26.9068V18.825H32.1498V27.4H40.8228V32.3Z" fill="white"/>
    </svg>    

    <?php echo get_the_post_thumbnail($pokemon); ?>

    <h3><?php echo $pokemon->post_title; ?></H3>
    <div class="all-stat">

        <div class="stat">
            <span class="name-stat">
                PV
            </span>
            <span class="num-stat">
                <?php the_field('pv', $pokemon->ID); ?>
            </span>
        </div>
        <div class="stat">
            <span class="name-stat">
                ATK
            </span>
            <span class="num-stat">
                <?php the_field('attaque', $pokemon->ID); ?>
            </span>
        </div>
        <div class="stat">
            <span class="name-stat">
                DEF
            </span>
            <span class="num-stat">
                <?php the_field('defense', $pokemon->ID); ?>
            </span>
        </div>
        <div class="stat">
            <span class="name-stat">
                SP
            </span>
            <span class="num-stat">
                <?php the_field('vitesse', $pokemon->ID); ?>
            </span>
        </div>

    </div>
    <div class="type">
        <?php
            $types = wp_get_post_terms($pokemon->ID, 'nature');
            foreach($types as $type):
                echo '<div class="pokemon-type type-' . $type->slug . '">';
                    echo '<span class="name-type">';
                        echo $type->name;
                    echo '</span>';
                echo '</div>';
            endforeach;
        ?>

    </div>
</div>