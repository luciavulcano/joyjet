<section class="cards mt-3">
  <article class="container">
    <div class="cards-slick">
      <?php
      $args = array("posts_per_page" => -1, "post_type" => "cards");
      $posts_array = get_posts($args);
      foreach ($posts_array as $post) { ?>
        <div class="card m-3">
          <?php if (get_field('card_image')) : ?>
            <img src="<?php the_field('card_image'); ?>" class="card-img-top img-fluid" alt="" />
          <?php endif ?>
          <div class="card-body">
            <h5 class="card-title mb-3">
              <?php the_field('card_title'); ?>
            </h5>
            <p class="card-text">
              <?php the_field('card_text'); ?>
            </p>

          </div>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php } ?>

    </div>


  </article>
</section>