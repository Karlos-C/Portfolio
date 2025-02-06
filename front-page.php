<?php
/* 
Template Name: Page d'accueil
*/

get_header(); 
?>

<?php
function get_page_url_or_redirect($slug) {
  $page = get_page_by_path($slug);
  if ($page) {
      return get_permalink($page->ID);
  }
  return null;
}
?>

<header class="section__container header__container" id="about">
    <div class="header__image">
      <img src="<?php echo esc_url(wp_get_attachment_url(77)); ?>" alt="header" />
    </div>
    <div class="header__content">
        <h1>Bonjour, je suis<span> Karl-William</span></h1>
        <p class="section__description">
          Bienvenue dans mon portfolio ! Passionné par le développement web, je crée des sites modernes, rapides et intuitifs. Que ce soit pour un nouveau projet ou une mise à niveau, je vous aide à obtenir un site performant et bien conçu.
        </p>
        <div class="header__btns">
          <button class="btn" onclick="window.location.href='<?php echo esc_url(get_page_url_or_redirect('contact')); ?>'">
            Me Contacter
          </button>
          <a href="<?php echo esc_url(get_page_url_or_redirect('portfolio')); ?>">
            Mon Portfolio
            <span><i class="ri-arrow-right-up-line"></i></span>
          </a>
        </div>
    </div>
</header>

<?php get_footer(); ?>