<?php

// Load Bootstrap CSS
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_css');

// Load jQuery and Bootstrap JS
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

// Enqueue main theme stylesheet and jQuery for smooth scroll
function custom_theme_enqueue_styles()
{
    wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_styles');

// Register Custom Post Type for Articles
function cgcustom_register_articles_post_type()
{
    $labels = array(
        'name'               => _x('Articles', 'post type general name'),
        'singular_name'      => _x('Article', 'post type singular name'),
        'menu_name'          => _x('Articles', 'admin menu'),
        'name_admin_bar'     => _x('Article', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'article'),
        'add_new_item'       => __('Add New Article'),
        'new_item'           => __('New Article'),
        'edit_item'          => __('Edit Article'),
        'view_item'          => __('View Article'),
        'all_items'          => __('All Articles'),
        'search_items'       => __('Search Articles'),
        'parent_item_colon'  => __('Parent Articles:'),
        'not_found'          => __('No articles found.'),
        'not_found_in_trash' => __('No articles found in Trash.')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'article'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies'         => array('color', 'season')
    );

    register_post_type('article', $args);
}
add_action('init', 'cgcustom_register_articles_post_type');

// Register a custom taxonomy called "Colors" for articles
function cgcustom_register_colors_taxonomy()
{
    $labels = array(
        'name'              => _x('Colors', 'taxonomy general name'),
        'singular_name'     => _x('Color', 'taxonomy singular name'),
        'search_items'      => __('Search Colors'),
        'all_items'         => __('All Colors'),
        'edit_item'         => __('Edit Color'),
        'update_item'       => __('Update Color'),
        'add_new_item'      => __('Add New Color'),
        'new_item_name'     => __('New Color Name'),
    );

    $args = array(
        'hierarchical'      => true,  // Taxonomy behaves like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'color'),
    );

    register_taxonomy('color', array('article'), $args);
}
add_action('init', 'cgcustom_register_colors_taxonomy');

// Register a custom taxonomy called "Seasons" for articles
function cgcustom_register_seasons_taxonomy()
{
    $labels = array(
        'name'              => _x('Seasons', 'taxonomy general name'),
        'singular_name'     => _x('Season', 'taxonomy singular name'),
        'search_items'      => __('Search Seasons'),
        'all_items'         => __('All Seasons'),
        'edit_item'         => __('Edit Season'),
        'update_item'       => __('Update Season'),
        'add_new_item'      => __('Add New Season'),
        'new_item_name'     => __('New Season Name'),
    );

    $args = array(
        'hierarchical'      => true,  // Taxonomy behaves like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'season'),
    );

    register_taxonomy('season', array('article'), $args);
}
add_action('init', 'cgcustom_register_seasons_taxonomy');

// Automatically add terms to "Colors" and "Seasons" taxonomies
function cgcustom_add_taxonomy_terms()
{
    $colors = array('Green', 'Blue', 'Black');
    foreach ($colors as $color) {
        if (!term_exists($color, 'color')) {
            wp_insert_term($color, 'color');
        }
    }

    $seasons = array('Summer', 'Fall', 'Spring');
    foreach ($seasons as $season) {
        if (!term_exists($season, 'season')) {
            wp_insert_term($season, 'season');
        }
    }
}
add_action('init', 'cgcustom_add_taxonomy_terms');


// Register Custom Taxonomy for Article Categories
function cgcustom_register_article_category_taxonomy()
{
    $labels = array(
        'name' => _x('Article Categories', 'Taxonomy General Name', 'cgcustom'),
        'singular_name' => _x('Article Category', 'Taxonomy Singular Name', 'cgcustom'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // Makes it behave like categories and not tags
        'public' => true,
    );
    register_taxonomy('article_category', array('article'), $args);
}
add_action('init', 'cgcustom_register_article_category_taxonomy', 0);

function cgcustom_fetch_filtered_article_image()
{
    $colors = isset($_POST['colors']) ? $_POST['colors'] : array();
    $search_query = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    // Base query arguments
    $args = array(
        'post_type' => 'article',
        'posts_per_page' => 6, // set to 6 as per the instructions
        's' => $search_query
    );

    // Add tax_query only if there are colors or seasons to filter by
    if (!empty($colors)) {
        $tax_queries = array('relation' => 'AND');

        if (!empty($colors)) {
            $tax_queries[] = array(
                'taxonomy' => 'color',
                'field'    => 'term_id',
                'terms'    => $colors,
                'operator' => 'IN'
            );
        }

        $args['tax_query'] = $tax_queries;
    }

    // Execute the query
    $articles = new WP_Query($args);

    if ($articles->have_posts()) {
        while ($articles->have_posts()) {
            $articles->the_post();
            get_template_part('template-parts/article', 'image');
        }
        wp_reset_postdata();
    } else {
        echo "No articles found.";
    }

    die();
}
// Fetch articles based on filter criteria using AJAX
function cgcustom_fetch_filtered_articles()
{
    // Capture the data from the AJAX request
    $colors = isset($_POST['colors']) ? $_POST['colors'] : array();
    $seasons = isset($_POST['seasons']) ? $_POST['seasons'] : array();
    $search_query = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    // Base query arguments
    $args = array(
        'post_type' => 'article',
        'posts_per_page' => 6, // set to 6 as per the instructions
        's' => $search_query
    );

    // Add tax_query only if there are colors or seasons to filter by
    if (!empty($colors) || !empty($seasons)) {
        $tax_queries = array('relation' => 'AND');

        if (!empty($colors)) {
            $tax_queries[] = array(
                'taxonomy' => 'color',
                'field'    => 'term_id',
                'terms'    => $colors,
                'operator' => 'IN'
            );
        }

        if (!empty($seasons)) {
            $tax_queries[] = array(
                'taxonomy' => 'season',
                'field'    => 'term_id',
                'terms'    => $seasons,
                'operator' => 'IN'
            );
        }

        $args['tax_query'] = $tax_queries;
    }

    // Execute the query
    $articles = new WP_Query($args);

    if ($articles->have_posts()) {
        while ($articles->have_posts()) {
            $articles->the_post();
            get_template_part('template-parts/article', 'card');
        }
        wp_reset_postdata();
    } else {
        echo "No articles found.";
    }

    die();
}

add_action('wp_ajax_fetch_filtered_articles_image', 'cgcustom_fetch_filtered_article_image');
add_action('wp_ajax_fetch_filtered_articles', 'cgcustom_fetch_filtered_articles'); // for logged-in users
add_action('wp_ajax_nopriv_fetch_filtered_articles', 'cgcustom_fetch_filtered_articles'); // for non-logged-in users

// Enqueue AJAX scripts
function cgcustom_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('cgcustom-ajax', get_template_directory_uri() . '/assets/js/queries.js', array('jquery'), null, true);
    wp_localize_script('cgcustom-ajax', 'cgcustom_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'cgcustom_enqueue_scripts');

add_theme_support('post-thumbnails'); // to add cover image


//Enforces a rule where an article can only be associated with either a "color" or a "season" taxonomy term, but not both.
function enforce_single_taxonomy_rule($post_id)
{
    // If it's not an article, exit
    if (get_post_type($post_id) !== 'article') {
        return;
    }

    $colors = get_the_terms($post_id, 'color');
    $seasons = get_the_terms($post_id, 'season');

    // If both color and season are set, remove the terms from one of the taxonomies
    if ($colors && $seasons) {
        // Choosing to remove 'season', but can be adjusted as needed
        wp_set_object_terms($post_id, array(), 'season');
    }
}
add_action('save_post', 'enforce_single_taxonomy_rule');
