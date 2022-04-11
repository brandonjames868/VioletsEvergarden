<?php

  get_header();?>

  <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('  ')?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">  All Our Plants</h1>  
            <div class="page-banner__intro">
                <p>Check out our wide selection of Botanical Plants!</p>
                <p>Get your Beautiful Plants And Flowerss Today!</p>
            </div>
        </div>  
  </div>
  <div class="container container--narrow page-section">
  <?php 
    while(have_posts()){
       the_post();?>

        <div class="plant-summary">
              <a class="plant-summary__name t-center" href="#">
                <span class="plant-summary__name">
                  <?php 
                    $plantName = new plant(get_field('plant_name'));
                    echo $plantName;
                ?></span>
              </a>
              <div class="plant-summary__content">
                <h5 class="tip-summary__title headline headline--tiny">
                   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
                <p><?php echo wp_trim_words(get_the_content(),18); ?>
                  <a href="<?php the_permalink();?>" class="nu gray">Learn more</a>
                </p>
              </div>
        </div>
   <?php }
    echo paginate_links();
   ?>
  </div>


<?php  get_footer();
?>