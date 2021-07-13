<?php

/**
 *
 * Template Name: Home
 *
 */

get_header();
global $post;
$page_ID = $post->ID;
// get page ID
?>
<?php
$banner = get_field('home_banner_image', $page_ID)
?>

<section class="main" style="background-image: url('<?php echo $banner; ?>')">
  <article class="container">
    <div class="row d-flex flex-column justify-content-between h-100">
      <div class="col-12">
        <h1 class="main__title ">
          <?php the_field('home_banner_title', false, false); ?>
        </h1>
        <p class="main__text col-11 p-0 my-3 col-lg-6">
          <?php the_field('home_banner_text'); ?>
        </p>
        <?php $home_banner_button = get_field('home_banner_button'); ?>
        <?php if ($home_banner_button) : ?>
          <a href="<?php echo esc_url($home_banner_button['url']); ?>" target="<?php echo esc_attr($home_banner_button['target']); ?>">
            <div class="btn btn-primary">
              <?php echo esc_html($home_banner_button['title']); ?>
            </div>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </article>
  <div class="trending d-none d-lg-block">
    <div class="container d-flex justify-content-between">
      <h3>
        <?php the_field('trending_title', false, false); ?>
      </h3>
      <?php if (have_rows('trending_text')) : ?>
        <?php while (have_rows('trending_text')) : the_row(); ?>
          <div class="trending__line"></div>
          <p class="col-3">
            <?php the_sub_field('trending_text_item'); ?>
          </p>
        <?php endwhile; ?>
      <?php else : ?>
        <?php // no rows found 
        ?>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php get_template_part('templates/global/template-part', 'cards'); ?>

<section class="about-us">
  <article class="container">
    <div class="row">
      <div class="col-12 d-flex flex-column flex-lg-row">
        <?php if (get_field('aboutus_image')) : ?>
          <img src="<?php the_field('aboutus_image'); ?>" class="img-fluid about-us__img" alt="" />
        <?php endif ?>
        <article class="mt-4 mt-lg-0 mx-lg-3">
          <h2 class="about-us__title mb-3 mb-lg-0">
            <?php the_field('aboutus_title'); ?>
          </h2>
          <p class="about-us__text col-12 p-0">
            <?php the_field('aboutus_text', false, false); ?>
          </p>
        </article>

      </div>
    </div>
  </article>


</section>

<?php get_footer(); ?>