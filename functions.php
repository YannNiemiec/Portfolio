<?php

/* Flush rewrite rules for custom post types. */
add_action('after_switch_theme', 'flush_rewrite_rules');

add_action('wp_enqueue_scripts', 'portfolio_stylesheets');

function portfolio_stylesheets()
{
    wp_enqueue_style('core', get_template_directory_uri() . '/style.css');
}

add_action('after_setup_theme', 'portfolio_themesupport');

function portfolio_themesupport()
{
    add_theme_support('post-thumbnails'); //Activer les images à la une
    add_image_size('banner', 600, 250); //Ajouter un nouveau format d'image
    add_theme_support('html5'); //Activer le html5
    add_theme_support('title-tag'); //Afficher le titre de la page dans la balise title
    add_theme_support('custom-logo', [
        'height' => 150,
        'flex-width' => true
    ]);
    add_theme_support('custom-header'); //Définir une couleur ou image dans le header
    add_theme_support('custom-background'); //Définir une couleur de fond sur le site
}

add_action('after_setup_theme', 'portfolio_menu');

function portfolio_menu()
{
    register_nav_menu('main-menu', 'Menu principal');
    register_nav_menu('footer-menu', 'Menu secondaire');
}

add_action('widgets_init', 'portfolio_sidebar');

function portfolio_sidebar()
{
    register_sidebar([
        'id' => 'footer-sidebar',
        'name' => 'Zone de widget footer',
        'before_widget' => '<article id="%1$s" class="widget %2$s">',
        'after_widget' => '</article>',
    ]);
}

//Créer un type de contenu "Projet"
add_action('init', 'create_project_cpt');

function create_project_cpt()
{
    register_post_type('project', [
        "labels" => [
            'name' => "Projets",
            'singular_name' => "Projet",
            'menu_name' => "Projets",
            'name_admin_bar' => "Projet",
            'add_new' => "Ajouter projet",
            'add_new_item' => "Ajouter nouveau projet",
            'new_item' => "Nouveau projet",
            'edit_item' => "Modifier projet",
            'view_item' => "Voir projet",
            'all_items' => "Tous les projets",
            'search_items' => "Rechercher projets",
            'parent_item_colon' => "Projets parents",
            'not_found' => "Aucun projet trouvé",
            'not_found_in_trash' => "Aucun projet trouvé dans la corbeille"
        ],
        'description' => "Gestion des projets",
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'projet'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt']
    ]);

    //Création de la taxonomie "field" liée au CPT "project"
    register_taxonomy('field', ['project'], [
        'labels' => [
            'name' => 'Domaines',
            'singular_name' => 'Domaine',
            'search_items' => 'Rechercher domaine',
            'all_items' => 'Tous les domaines',
            'parent_item' => 'Domaine parent',
            'parent_item_colon' => 'Domaine parent : ',
            'edit_item' => 'Modifier domaine',
            'update_item' => 'Mettre à jour domaine',
            'add_new_item' => 'Ajouter nouveau domaine',
            'new_item_name' => 'Nom du nouveau domaine',
            'menu_name' => 'Domaine',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'domaine'],
    ]);

    //Création de la taxonomie "skill" liée au CPT "project"
    register_taxonomy('skill', ['project'], [
        'labels' => [
            'name' => 'Compétences',
            'singular_name' => 'Compétence',
            'search_items' => 'Rechercher compétence',
            'all_items' => 'Tous les compétences',
            'parent_item' => 'Compétence parent',
            'parent_item_colon' => 'Compétence parent : ',
            'edit_item' => 'Modifier compétence',
            'update_item' => 'Mettre à jour compétence',
            'add_new_item' => 'Ajouter nouveau compétence',
            'new_item_name' => 'Nom du nouveau compétence',
            'menu_name' => 'Compétence',
        ],
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'domaine'],
    ]);

    // Créer un groupe de champs personnalisés affiché sur la page de création / modification d'un projet
    if (function_exists('acf_add_local_field_group')) {

        acf_add_local_field_group([
            'key' => 'group_project',
            'title' => 'Groupe projet',
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'project',
                    ],
                ],
            ],
            'fields' => [
                [
                    'key' => 'date_start',
                    'label' => 'Date de début',
                    'name' => 'date_start',
                    'type' => 'date_picker',
                ],
                [
                    'key' => 'date_end',
                    'label' => 'Date de fin',
                    'name' => 'date_end',
                    'type' => 'date_picker',
                ],
                [
                    'key' => 'gallery',
                    'label' => 'Galerie',
                    'name' => 'gallery',
                    'type' => 'gallery',
                ],
                [
                    'key' => 'project_customer',
                    'label' => 'Client associé',
                    'name' => 'project_customer',
                    'type' => 'relationship',
                    'max' => 1
                ],
            ],
        ]);
    }
}

//Créer un type de contenu "Client"
add_action('init', 'create_customer_cpt');

function create_customer_cpt()
{
    register_post_type('customer', [
        "labels" => [
            'name' => "Clients",
            'singular_name' => "Clients",
            'menu_name' => "Clients",
            'name_admin_bar' => "Client",
            'add_new' => "Ajouter client",
            'add_new_item' => "Ajouter nouveau client",
            'new_item' => "Nouveau client",
            'edit_item' => "Modifier client",
            'view_item' => "Voir client",
            'all_items' => "Tous les clients",
            'search_items' => "Rechercher clients",
            'parent_item_colon' => "Clients parents",
            'not_found' => "Aucun client trouvé",
            'not_found_in_trash' => "Aucun client trouvé dans la corbeille"
        ],
        'description' => "Gestion des clients",
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'client'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt']
    ]);

    // Créer un groupe de champs personnalisés affiché sur la page de création / modification d'un client
    if (function_exists('acf_add_local_field_group')) {

        acf_add_local_field_group([
            'key' => 'group_customer',
            'title' => 'Groupe client',
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'customer',
                    ],
                ],
            ],
            'fields' => [
                [
                    'key' => 'nom',
                    'label' => 'Nom du client',
                    'name' => 'nom',
                    'type' => 'text',
                ],
                [
                    'key' => 'logo',
                    'label' => 'Logo du client',
                    'name' => 'logo',
                    'type' => 'image',
                ],
                [
                    'key' => 'url',
                    'label' => 'Site du client',
                    'name' => 'url',
                    'type' => 'url',
                ],
            ],
        ]);

        acf_add_local_field_group([
            'key' => 'contact-page',
            'title' => 'Page Contact',
            'location' => [
                [
                    [
                        'param' => 'post_template',
                        'operation' => '==',
                        'value' => 'page-contact.php'
                    ]
                ]
            ],
            'fields' => [
                [
                    'key' => 'telephone',
                    'label' => 'Téléphone',
                    'name' => 'telephone',
                    'type' => 'text'
                ],
                [
                    'key' => 'adresse',
                    'label' => 'Adresse',
                    'name' => 'adresse',
                    'type' => 'text'
                ],
                [
                    'key' => 'mail',
                    'label' => 'E-mail',
                    'name' => 'mail',
                    'type' => 'email'
                ]
            ]
        ]);
    }
}
//////////////////////////////////////////////////////////////////











































