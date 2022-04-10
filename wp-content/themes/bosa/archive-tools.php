<?php

  get_header();?>

  <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/app/public/wp-content/themes/bosa/assets/images/media/event_banner.jpg')?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">  All Our Tools</h1>  
            <div class="page-banner__intro">
                <p>Don&rsquo;t miss the chance to look at our premium tools!</p>
                <p>Get your Garden Tools Today!</p>
            </div>
        </div>  
  </div>
  <div class="container container--narrow page-section">
  <?php 
    while(have_posts()){
       the_post();?>

        <div class="tool-summary">
        <a class="tool-summary__name t-center" href="#">
                <span class="tool-summary__name">
                  <?php 
                    $toolName = new tool(get_field('tool_name'));
                    echo $toolName;
                ?></span>
              </a>
              <div class="tool-summary__content">
                <h5 class="tool-summary__title headline headline--tiny">
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