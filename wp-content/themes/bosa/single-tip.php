<?php    
    get_header();
    while(have_posts()){  // WordPress function that returns the number of posts
        the_post();       // keeps track of which post we are working with and repalces the count variable
        ?>
    <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/media/homepage_banner.jpg')?> );"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"> <?php the_title();?></h1>  <!-- hollow -->
                <div class="page-banner__intro">
                    <p> Keep up with our latest Tips</p>
                </div>
            </div>  
    </div>
    <div class="container container--narrow page-section">
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('tip'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Tip Listing</a> 
            <span class="metabox__main"><?php the_title(); ?> </span></p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        <?php 
            $relatedEvents = get_field('related_events');// array of post objects
            if($relatedEvents){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Related event(s)</h2>';
                echo '<ul class="link-list min-list">';
                foreach($relatedEvents as $event){ //for each a post object
                ?>
                <li><a href="<?php echo get_the_permalink($event);?>">
                        <?php echo get_the_title($event);?>
                    </a>
                </li>   
        <?php }

            }
            echo '</ul>';
        ?>
        <?php 
            $relatedPlants = get_field('related_plants');// array of post objects
            if($relatedPlants){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Related plant(s)</h2>';
                echo '<ul class="link-list min-list">';
                foreach($relatedPlants as $plant){ //for each a post object
                ?>
                <li><a href="<?php echo get_the_permalink($plant);?>">
                        <?php echo get_the_title($plant);?>
                    </a>
                </li>   
        <?php }

            }
            echo '</ul>';
        ?>
        <?php 
            $relatedTools = get_field('related_tools');// array of post objects
            if($relatedTools){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Related tool(s)</h2>';
                echo '<ul class="link-list min-list">';
                foreach($relatedTools as $tool){ //for each a post object
                ?>
                <li><a href="<?php echo get_the_permalink($tool);?>">
                        <?php echo get_the_title($tool);?>
                    </a>
                </li>   
        <?php }

            }
            echo '</ul>';
        ?>
           

    <php }
    ?>
    </div>

    <?php
    }
    get_footer();
?>