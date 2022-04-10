<?php    
    get_header();
    while(have_posts()){  // WordPress function that returns the number of posts
        the_post();       // keeps track of which post we are working with and repalces the count variable
        pageBanner();
        ?>
    <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/app/public/wp-content/themes/bosa/assets/images/media/homepage_banner.jpg')?> );"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"> <?php the_title();?></h1>  <!-- hollow -->
                <div class="page-banner__intro">
                    <p> Keep up with our latest Tips.</p> 
                </div>
            </div>  
    </div>
    <div class="container container--narrow page-section">
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('tip'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Tips Home</a> 
            <span class="metabox__main"><?php the_title(); ?> </span></p>
        </div>
        <div class="generic-content">
            <?php the_post_thumbnail(); the_content(); 
                the_post();?>
        </div>

        <?php 
           
           $tipPageTips = new WP_Query(array(
             'posts_per_page' => -1,
             'post_type' => 'tip',
             'meta_key' => 'tip_name',
             'order' => 'ASC',
           ));
           while($tipPageTips->have_posts()){
             $tipPageTips->the_post();?>
             <div class="tip-summary">
               <a class="tip-summary__name t-center" href="#">
                 <span class="tip-summary__name">
                   <?php 
                     $tips = new tips(get_field('tip_name'));
                     echo $tips;
                 ?></span>
               </a>
               <div class="tip-summary__content">
                 <h5 class="tip-summary__title headline headline--tiny">
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
           <a href="<?php echo get_post_type_archive_link('tip');?>" class="btn btn--blue">View All Tips</a>
         </p>


    <php }
    ?>
    </div>

    <?php
    }
    get_footer();
?>