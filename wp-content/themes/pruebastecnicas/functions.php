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

// Function to register taxonomies
function registrar_taxonomias() {
    // Taxonomía de Género para Películas y Series
    register_taxonomy('genero', array('peliculas', 'series'), array(
        'labels' => array(
            'name' => __('Géneros', 'prueba_tecnica'),
            'singular_name' => __('Género', 'prueba_tecnica'),
        ),
        'public' => true,
        'hierarchical' => true,
    ));

    // Taxonomía de Año para Películas y Series
    register_taxonomy('ano', array('peliculas', 'series'), array(
        'labels' => array(
            'name' => __('Años de Lanzamiento', 'prueba_tecnica'),
            'singular_name' => __('Año de Lanzamiento', 'prueba_tecnica'),
        ),
        'public' => true,
        'hierarchical' => false,
    ));
}

// Hooking up our functions to theme setup
add_action('init', 'registrar_cpt');
add_action('init', 'registrar_taxonomias');

function registrar_menus() {
    register_nav_menus(
        array(
            'primary' => __('Menú Principal', 'prueba_tecnica')
        )
    );
}
add_action('init', 'registrar_menus');


?>
