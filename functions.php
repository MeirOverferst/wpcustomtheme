<?php

// calling css and js files

function gt_setup(){
    wp_enqueue_style("google-fonts","//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab");
    wp_enqueue_style("fontawesome","//use.fontawesome.com/releases/v5.1.0/css/all.css");
    wp_enqueue_style("style",get_stylesheet_uri(),NULL,microtime());
    wp_enqueue_script("main",get_theme_file_uri('./js/main.js'),NULL,microtime(),true);
}

add_action("wp_enqueue_scripts","gt_setup");

//adding theme support

function gt_init(){
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("html5");
    add_theme_support("comment-list","comment-form","search-form");

}

add_action("after_setup_theme","gt_init");

//projects post type

function gt_custom_post_type(){
    register_post_type("projects",
    array(
        "rewrtie"=>array("slug"=>"projects"),
    "labels"=>array(
        "name"=>"Projects",
        "singular_name"=>"Project",
        "add_new_item"=>"Add new Project",
        "edit_item"=>"Edit Project" 
    ),
    "menu-icon"=> "dashicons-clipboard",
    "public"=> true,
    "has_archive"=>true, 
     'supports'=> array(
         "title","thumbnail","editor","excerpt","comments"
     )
    )
     );
};

add_action("init","gt_custom_post_type");
