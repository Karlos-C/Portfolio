<?php
/*
Plugin Name: GitHub Feed
Description: GitHub Feed est un plugin WordPress qui affiche dynamiquement les derniers commits d’un projet GitHub sur les pages ou articles d'un site.
Author: Karl-William Couturier
Version: 1.1
*/

// Fonction pour récupérer les commits depuis l'API GitHub
function fetch_github_commits() {
    // Vérification de la présence des paramètres 'user' et 'repo' dans la requête POST
    if (isset($_POST['user']) && isset($_POST['repo'])) {
        // Sanitation des entrées utilisateur pour éviter les failles de sécurité
        $user = sanitize_text_field($_POST['user']);
        $repo = sanitize_text_field($_POST['repo']);

        // Vérification que les variables ne sont pas vides après la sanitation
        if (empty($user) || empty($repo)) {
            echo json_encode(array('error' => 'Utilisateur ou dépôt non défini.'));
            wp_die();
        }

        // Construction de l'URL de l'API GitHub pour récupérer les commits
        $url = "https://api.github.com/repos/$user/$repo/commits";

        // Configuration des arguments pour la requête HTTP
        $args = array(
            'headers' => array(
                'User-Agent' => 'WordPress', // GitHub nécessite un en-tête User-Agent valide
            ),
            'timeout' => 15, // Délai d'attente de 15 secondes pour la requête
        );

        // Exécution de la requête HTTP GET vers l'API GitHub
        $response = wp_remote_get($url, $args);

        // Vérification des erreurs de la requête HTTP
        if (is_wp_error($response)) {
            // Récupération du message d'erreur
            $error_message = $response->get_error_message();
            echo json_encode(array('error' => "Erreur de récupération des commits : $error_message"));
        } else {
            // Récupération du code de statut HTTP
            $status_code = wp_remote_retrieve_response_code($response);

            // Vérification si la requête a réussi (code 200)
            if ($status_code == 200) {
                // Récupération du corps de la réponse
                $body = wp_remote_retrieve_body($response);
                echo $body;
            } else {
                // Gestion des différents codes de statut HTTP
                switch ($status_code) {
                    case 404:
                        $error_message = 'Dépôt ou utilisateur non trouvé.';
                        break;
                    case 403:
                        $error_message = 'Accès refusé ou limite de taux atteinte.';
                        break;
                    default:
                        $error_message = "Erreur inattendue (Code : $status_code).";
                }
                echo json_encode(array('error' => "Erreur de récupération des commits : $error_message"));
            }
        }
    } else {
        echo json_encode(array('error' => 'Paramètres manquants.'));
    }
    wp_die();
}

// Enregistrement des actions AJAX pour les utilisateurs connectés et non connectés
add_action('wp_ajax_fetch_github_commits', 'fetch_github_commits');
add_action('wp_ajax_nopriv_fetch_github_commits', 'fetch_github_commits');
?>