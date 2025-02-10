<?php
/*
Plugin Name: GitHub Feed
Description: GitHub Feed est un plugin WordPress qui permet d'afficher dynamiquement les derniers commits d’un projet GitHub directement sur les pages ou articles d'un site.
Author: Karl-William Couturier
Version: 1.1
*/
?>
<?php

function fetch_github_commits() {
    $user = sanitize_text_field($_POST['user']);
    $repo = sanitize_text_field($_POST['repo']);

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
}
?>