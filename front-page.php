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

<section class="section__container skill__container" id="a-propos">
  <div class="skill__content">
    <h2 class="section__header">
      À propos
    </h2>
    <p class="section__description">
      Diplômé en informatique, je suis passionné par les nouvelles technologies et l’optimisation des performances. Curieux et rigoureux, j’aime relever des défis techniques et améliorer continuellement mes compétences pour proposer des solutions efficaces et adaptées.
    </p>
  </div>

  <div class="about-col-2">
    <div class="tab-titles">
      <p class="tab-links active-link" onclick="opentab('skills', event)">Compétences</p>
      <p class="tab-links" onclick="opentab('experience', event)">Expérience</p>
      <p class="tab-links" onclick="opentab('education', event)">Éducation</p>
    </div>
    <div class="tab-contents active-tab" id="skills">
      <ul>
        <li><span>UI/UX</span><br>Designing Web/App interfaces</li>
        <li><span>Web Development</span><br>Building Web Applications</li>
        <li><span>Graphic Design</span><br>Creating Visual Content</li>
      </ul>
    </div>
    <div class="tab-contents" id="experience">
      <ul>
        <li><span>Internship</span><br>Worked at XYZ Company</li>
        <li><span>Freelancing</span><br>Worked on multiple projects</li>
        <li><span>UI/UX</span><br>Designing Web/App interfaces</li>
      </ul>
    </div>
    <div class="tab-contents" id="education">
      <ul>
        <li><span>2022 - 2025</span><br>DEC en Techniques de l'Informatique</li>
      </ul>
    </div>
  </div>
</section>

<?php get_footer(); ?>