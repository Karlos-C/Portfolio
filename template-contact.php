<?php
/* 
Template Name: Page de contact
*/

get_header(); 
?>

<section class="section__container contact__container">
    <h2 class="section__header">Discutons de votre <span>Projet</span></h2>
    <p class="section__description">
        Que vous ayez besoin d'un nouveau site Web, d'une refonte ou de fonctionnalités personnalisées, collaborons pour créer votre vision.
    </p>
    <form action="/">
        <input type="text" placeholder="Nom et prénom" />
        <input type="text" placeholder="Votre adresse courriel" />
        <input type="text" placeholder="Numéro de téléphone" />
        <textarea placeholder="Message"></textarea>
        <button class="btn">Envoyer</button>
    </form>
</section>

<?php get_footer(); ?>