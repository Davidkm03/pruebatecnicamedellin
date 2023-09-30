<?php
/*
* Functions file for Prueba Técnica theme
* Author: Juan David Valor
*/

// Function to register custom post types
function registrar_cpt() {
    // CPT for Movies
    register_post_type('peliculas',
        array(
            'labels'      => array(
                'name'          => __('Películas', 'prueba_tecnica'),
                'singular_name' => __('Película', 'prueba_tecnica'),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'peliculas'),
        )
    );
    // CPT for Series
    register_post_type('series',
        array(
            'labels'      => array(
                'name'          => __('Series', 'prueba_tecnica'),
                'singular_name' => __('Serie', 'prueba_tecnica'),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'series'),
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'registrar_cpt');

function registrar_taxonomias() {
    // Taxonomía para Películas
    register_taxonomy('genero-pelicula', 'peliculas', array(
        'labels' => array(
            'name' => __('Géneros de Películas', 'prueba_tecnica'),
            'singular_name' => __('Género de Película', 'prueba_tecnica'),
        ),
        'public' => true,
        'hierarchical' => true,
    ));
    // Taxonomía para Series
    register_taxonomy('genero-serie', 'series', array(
        'labels' => array(
            'name' => __('Géneros de Series', 'prueba_tecnica'),
            'singular_name' => __('Género de Serie', 'prueba_tecnica'),
        ),
        'public' => true,
        'hierarchical' => true,
    ));
}

add_action('init', 'registrar_taxonomias');



?>
