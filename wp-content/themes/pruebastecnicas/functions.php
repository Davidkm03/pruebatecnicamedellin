<?php
/*
* Functions file for Prueba Técnica theme
* Author: Juan David Valor
*/

// Function to register custom post types
function prueba_tecnica_registrar_cpt() {
    // CPT for Movies
    register_post_type('prueba_tecnica_peliculas',
        array(
            'labels'      => array(
                'name'          => __('Películas', 'prueba_tecnica'),
                'singular_name' => __('Película', 'prueba_tecnica'),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'peliculas'),
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
    // CPT for Series
    register_post_type('prueba_tecnica_series',
        array(
            'labels'      => array(
                'name'          => __('Series', 'prueba_tecnica'),
                'singular_name' => __('Serie', 'prueba_tecnica'),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'series'),
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}

add_action('init', 'prueba_tecnica_registrar_cpt');

function prueba_tecnica_registrar_taxonomias() {
    // Taxonomía de Género para Películas y Series
    register_taxonomy('prueba_tecnica_genero', array('prueba_tecnica_peliculas', 'prueba_tecnica_series'), array(
        'labels' => array(
            'name' => __('Géneros', 'prueba_tecnica'),
            'singular_name' => __('Género', 'prueba_tecnica'),
        ),
        'public' => true,
        'hierarchical' => true,
    ));

    // Taxonomía de Año para Películas y Series
    register_taxonomy('prueba_tecnica_ano', array('prueba_tecnica_peliculas', 'prueba_tecnica_series'), array(
        'labels' => array(
            'name' => __('Años de Lanzamiento', 'prueba_tecnica'),
            'singular_name' => __('Año de Lanzamiento', 'prueba_tecnica'),
        ),
        'public' => true,
        'hierarchical' => false,
    ));
}

add_action('init', 'prueba_tecnica_registrar_taxonomias');

?>
