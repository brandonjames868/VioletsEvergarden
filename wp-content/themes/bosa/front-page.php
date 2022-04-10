<?php  
    get_header(); // pulls the content from header.php

 ?>

 
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/media/homepage_banner.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">Welcome to Violet Evergarden!!</h1>
      <h2 class="headline headline--medium">We have the best selection of exotic plants, flowers and gardening tools!</h2>
    </div>
  </div>

  <div class="full-width-split group">
    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
        <?php 
           
          $homepageEvents = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key'=> 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
              )
            )
          ));
          while($homepageEvents->have_posts()){
            $homepageEvents->the_post();?>
            <div class="event-summary">
              <a class="event-summary__date t-center" href="#">
                <span class="event-summary__month">
                  <?php 
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('M');
                ?></span>
                  <span class="event-summary__day">
                    <?php 
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('d');
                ?></span>  
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny">
                   <a href="<?php the_permalink();  ?>"><?php the_title(); ?></a>
                </h5>
                <p><?php 
                      if(has_excerpt()) echo get_the_excerpt(); 
                      else echo wp_trim_words(get_the_content(),18);
                    ?> 
                    <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
              </div>
            </div>
          <?php }
        ?>

        <p class="t-center no-margin">
          <a href="<?php echo get_post_type_archive_link('event');?>" class="btn btn--blue">View All Events</a>
        </p>

      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">From Our Tip Blogs</h2>
      
      <?php


          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 2
          ));

          while($homepagePosts->have_posts()){ // tied to the default query used on the url
              $homepagePosts->the_post();?>
              <div class="event-summary">
                  <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                    <span class="event-summary__month"><?php the_time('M'); ?></span>
                    <span class="event-summary__day"><?php the_time('d'); ?></span>  
                  </a>
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>
                    <p><?php 
                      if(has_excerpt()) echo get_the_excerpt(); 
                      else echo wp_trim_words(get_the_content(),18);
                    ?> 
                    <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                  </div>
              </div>
          <?php } wp_reset_postdata();
      ?>


<?php
    get_footer(); // pulls content from footer.php
?>