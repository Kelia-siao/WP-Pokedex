<?php

/**
* Plugin Name:     Site Pokémon
* Description:     Ajoute tous les pokémons existants pour le Pokesite. La première activation peut prendre jusqu'à 5 minutes.
*/

//trouvé sur internet 
function generate_featured_image( $image_url, $post_id ){
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = explode('.', basename($image_url));
    $filename = bin2hex(random_bytes(16)) . '.' . end($filename);
    
    if(wp_mkdir_p($upload_dir['path']))
    $file = $upload_dir['path'] . '/' . $filename;
    else
    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);
    
    $wp_filetype = wp_check_filetype($filename);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}

//trouvé sur internet https://gist.github.com/tallesairan/3ad2f37a73ae1a1f5a2d704e98c9556c
//permet de resoudre le bug qui fait que seulement 100 pokemon sont importés
function post_exists_by_slug( $post_slug, $type = 'post') {
    $args_posts = array(
        'post_type'      => $type,
        'name'           => $post_slug,
        'posts_per_page' => 1,
    );
    $loop_posts = new WP_Query( $args_posts );
    if ( ! $loop_posts->have_posts() ) {
        return false;
    } else {
        return true;
    }
}


function pokesite_init() {
    set_time_limit(0); // outrepasser la durée maximale d'éxecution avant qu'une erreur apparaise
    // pour les tests en dev :
    // delete_option('pokesite_en_cours');
    
    // eviter que le code soit appelé plusieurs fois : https://isabelcastillo.com/run-once-wp
    if( get_option('pokesite_en_cours') === 'termine' ) {
        return;
    }

    $content = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=-1');
    $content = json_decode($content);
    
    $statistics = array(
        'hp' => 'field_61e176cbccc32',
        'attack' => 'field_61e176ebccc33',
        'defense' => 'field_61e1abc0055ab',
        'special-attack' => 'field_61e1771fccc34',
        'special-defense' => 'field_61e1772bccc35',
        'speed' => 'field_61e17736ccc36'
    );
    
    for ($i=0; $i < sizeof($content->results); $i++) { 
        $pokemon = $content->results;
        $pokemon = $pokemon[$i];
        
        // vérifier que le pokemon n'existe pas deja
        if( post_exists_by_slug($pokemon->name, 'pokemon') === false ) {
            $currentPokemon = file_get_contents($pokemon->url); //aller chercher l'url 
            $currentPokemon = json_decode($currentPokemon);
            
            $postId = wp_insert_post(array( // créer nouvelle publication
                'post_status' => 'publish',
                'post_type'   => 'pokemon',
                'post_title'   => ucfirst(join(' ', explode('-', $currentPokemon->name) ) ),
                'post_name'  => $currentPokemon->name
            ));
            
            foreach( $currentPokemon->stats as $valeur){
                update_field(
                    $statistics[$valeur->stat->name],
                    $valeur->base_stat,
                    $postId
                ); 
            }
            
            $cleImage = 'official-artwork';
            
            if ($currentPokemon->sprites->other->$cleImage->front_default != false) {
                generate_featured_image( $currentPokemon->sprites->other->$cleImage->front_default, $postId );
            }
            
            foreach ($currentPokemon->types as $nature){
                $term = get_terms(array(
                    'taxonomy' => 'nature',
                    'name__like' => $nature->type->name
                ));
                
                if ($term) {
                    wp_set_object_terms($postId, $term[0]->term_id, 'nature');
                } else {
                    // echo '<pre>' . $nature->type->name . '</pre>';
                    $natureId = wp_insert_term($nature->type->name, 'nature');

                    if(gettype($natureId) !== 'object') {
                        wp_set_object_terms($postId, $natureId, 'nature');
                    }

                }
                
            } // foreach
            
        } // if
        
    } //for 
    
    update_option('pokesite_en_cours', 'termine');
} // function

register_activation_hook( __FILE__, 'pokesite_init');
