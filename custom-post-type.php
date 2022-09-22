<?php function cptui_register_my_cpts() {
/**
 * Post Type: Equipe.
 */

$labels = array(
    "name" => __( "Equipe", "" ),
    "singular_name" => __( "membre", "" ),
    "menu_name" => __( "Equipe", "" ),
    "all_items" => __( "Tous les membres", "" ),
    "add_new" => __( "Ajouter un membre", "" ),
    "add_new_item" => __( "Ajouter un nouveau membre", "" ),
    "edit_item" => __( "Modifier un membre", "" ),
    "new_item" => __( "Nouveau membre", "" ),
    "view_item" => __( "Voir le membre", "" ),
    "view_items" => __( "Voir les membres", "" ),
    "search_items" => __( "Chercher un membre", "" ),
    "not_found" => __( "Aucun membre trouvé", "" ),
    "not_found_in_trash" => __( "Aucun membre dans la corbeille", "" ),
    "featured_image" => __( "Image", "" ),
    "remove_featured_image" => __( "Retirer la photo du membre", "" ),
    "use_featured_image" => __( "Utiliser la photo du membre", "" ),
    "insert_into_item" => __( "Ajouter dans le membre", "" ),
);

$args = array(
    "label" => __( "Equipe", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "team", "with_front" => true ),
    "query_var" => true,
    "menu_icon" => "dashicons-groups",
    "supports" => array( "title", "thumbnail" ),
);

register_post_type( "team", $args );

/**
 * Post Type: Témoignages.
 */

$labels = array(
    "name" => __( "Témoignages", "" ),
    "singular_name" => __( "Témoignage", "" ),
    "menu_name" => __( "Témoignages", "" ),
    "all_items" => __( "Tous les témoignages", "" ),
    "add_new" => __( "Ajouter un témoignage", "" ),
    "add_new_item" => __( "Ajouter un nouveau témoignage", "" ),
    "edit_item" => __( "Modifier le témoignage", "" ),
    "new_item" => __( "Nouveau témoignage", "" ),
    "view_item" => __( "Voir le témoignage", "" ),
    "view_items" => __( "Voir les témoignages", "" ),
    "search_items" => __( "Chercher un témoignage", "" ),
    "not_found" => __( "Rien trouvé", "" ),
    "not_found_in_trash" => __( "Rien n'a été trouvé dans la corbeille", "" ),
);

$args = array(
    "label" => __( "Témoignages", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "testimonials", "with_front" => true ),
    "query_var" => true,
    "menu_icon" => "dashicons-format-quote",
    "supports" => array( "title", "thumbnail" ),
);

register_post_type( "testimonials", $args );

/**
 * Post Type: Projets.
 */

$labels = array(
    "name" => __( "Projets", "" ),
    "singular_name" => __( "Projet", "" ),
    "menu_name" => __( "Projet", "" ),
    "all_items" => __( "Tous les projets", "" ),
    "add_new" => __( "Ajouter un projet", "" ),
    "add_new_item" => __( "Ajouter un nouveau projet", "" ),
    "edit_item" => __( "Modifier un projet", "" ),
    "new_item" => __( "Nouveau projet", "" ),
    "view_item" => __( "Voir le projet", "" ),
    "view_items" => __( "Voir les projets", "" ),
    "search_items" => __( "Chercher un projet", "" ),
    "not_found" => __( "Rien trouvé", "" ),
    "not_found_in_trash" => __( "Rien n'a été trouvé dans la corbeille", "" ),
);

$args = array(
    "label" => __( "Projets", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "portfolio", "with_front" => true ),
    "query_var" => true,
    "menu_icon" => "dashicons-format-gallery",
    "supports" => array( "title", "editor", "thumbnail" ),
);

register_post_type( "portfolio", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

?>