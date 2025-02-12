<?php  
/*
Plugin Name: GitHub Feed
Description: Plugin WordPress permettant d'afficher dynamiquement les derniers commits d’un projet GitHub via un shortcode.
Author: Karl-William Couturier
Version: 1.2
*/

function fetch_github_commits() {
    $user = sanitize_text_field($_POST['user']);
    $repo = sanitize_text_field($_POST['repo']);

    if (!$user || !$repo) {
        echo json_encode(array('error' => 'Utilisateur ou dépôt non défini.'));
        wp_die();
    }

    $url = "https://api.github.com/repos/$user/$repo/commits";
    $response = wp_remote_get($url, array(
        'headers' => array('User-Agent' => 'WordPress')
    ));

    if (is_wp_error($response)) {
        echo json_encode(array('error' => 'Erreur de récupération des commits.'));
    } else {
        echo wp_remote_retrieve_body($response);
    }
    wp_die();
}
add_action('wp_ajax_fetch_github_commits', 'fetch_github_commits');
add_action('wp_ajax_nopriv_fetch_github_commits', 'fetch_github_commits');

function github_feed_shortcode($atts) {
    $atts = shortcode_atts(array(
        'repo' => ''
    ), $atts);

    if (empty($atts['repo'])) {
        return '<p>Aucun dépôt GitHub spécifié.</p>';
    }

    return '<div id="github-feed" data-repo="' . esc_attr($atts['repo']) . '"></div>';
}
add_shortcode('github_feed', 'github_feed_shortcode');

function github_feed_enqueue_scripts() {
    wp_enqueue_script('github-feed-script', plugins_url('github-feed.js', __FILE__), array('jquery'), null, true);
    wp_localize_script('github-feed-script', 'githubFeed', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'github_feed_enqueue_scripts');