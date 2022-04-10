<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bosa
 */

get_header();
?>
<?php 
if( !get_theme_mod( 'disable_transparent_header_post', true ) && get_theme_mod( 'header_layout', 'header_one' ) == 'header_two' ){
	bosa_post_transparent_banner();
} ?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page">
			<?php if( get_theme_mod( 'disable_transparent_header_post', true ) || get_theme_mod( 'header_layout', 'header_one' ) != 'header_two' ){
				if( get_theme_mod( 'post_title_position', 'above_feature_image' ) == 'above_feature_image' ){
				bosa_single_page_title();
				}		
				if( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
					bosa_breadcrumb_wrap();
				}
			} ?>
			<div class="row">
				<?php
					$sidebarClass = 'col-lg-8';
					$sidebarColumnClass = 'col-lg-4';
					if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){
						if( !is_active_sidebar( 'right-sidebar') ){
							$sidebarClass = "col-12";
						}	
					}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){
						if( !is_active_sidebar( 'left-sidebar') ){
							$sidebarClass = "col-12";
						}	
					}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
						$sidebarClass = 'col-lg-6';
						$sidebarColumnClass = 'col-lg-3';
						if( !is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
							$sidebarClass = "col-12";
						}
					}
					if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'disable_sidebar_single_post', false ) ){
						$sidebarClass = 'col-12';
					}
					if( !get_theme_mod( 'disable_sidebar_single_post', false ) ){
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){ 
							if( is_active_sidebar( 'left-sidebar') ){ ?>
								<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
									<?php dynamic_sidebar( 'left-sidebar' ); ?>
								</div>
							<?php }
							}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
								if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'left-sidebar' ); ?>
									</div>
								<?php
								}
							}
					} ?>
				<div id="primary" class="content-area <?php echo esc_attr( $sidebarClass ); ?>">
					<main id="main" class="site-main">
						<?php if( get_theme_mod( 'disable_transparent_header_post', true ) || get_theme_mod( 'header_layout', 'header_one' ) != 'header_two' ){
							if( has_post_thumbnail() ){
								if( get_theme_mod( 'single_feature_image', 'show_in_all_pages' ) == 'show_in_all_pages' ){ ?>
								    <figure class="feature-image single-feature-image">
		    						    <?php bosa_image_size( 'bosa-1370-550' ); ?>
		    						</figure>
								<?php }else{
									// will disable in all pages
									echo '';
								}
							}
						 	if( get_theme_mod( 'post_title_position', 'above_feature_image' ) == 'below_feature_image' ){
							bosa_single_page_title();
							} 
						} ?>
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'single' );
								
								if ( is_single() && !get_theme_mod( 'hide_single_post_author', false ) ){
									?>
										<div class="author-info">
											<div class="section-title-wrap">
												<h3 class="section-title">
													<?php echo esc_html(get_theme_mod( 'single_post_author_title', 'About the Author' )); ?>
												</h3>
											</div>
											<?php
												# Print author.
											    get_template_part( 'template-parts/content', 'author' );
											?>
										</div>
									<?php
								}

								the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
					if( !get_theme_mod( 'disable_sidebar_single_post', false ) ){
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){ 
							if( is_active_sidebar( 'right-sidebar') ){ ?>
								<div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
									<?php dynamic_sidebar( 'right-sidebar' ); ?>
								</div>
							<?php }
						}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
							if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
								<div id="secondary-sidebar" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
									<?php dynamic_sidebar( 'right-sidebar' ); ?>
								</div>
							<?php
							}
						}
					}
				?>
			</div>
		</section>

		<!-- Related Posts -->
		<?php if ( !get_theme_mod( 'hide_related_posts', false ) ){ ?>
			<section class="section-ralated-post">
				<div class="section-title-wrap">
					<h2 class="section-title">
						<?php echo esc_html(get_theme_mod( 'related_posts_title', esc_html__( 'You may also like these', 'bosa' ) )); ?>
					</h2>
				</div>
				<div class="wrap-ralated-posts">
					<div class="row">
						<?php
							# Print related posts randomly.
						    get_template_part( 'template-parts/content', 'related-posts' );
						?>
					</div>
				</div>
			</section>

            <section class="section-related-plants">
                <div class="section-title-wrap">
                    <h2 class="section-title">
                        Related Plants
                    </h2>
                </div>
                <div class="wrap-ralated-posts">
					<div class="row">
                    <?php 
                        $relatedPlants = get_field('related_plants');// array of post objects
                        if($relatedPlants){
                            echo '<ul class="link-list min-list">';
                            foreach($relatedPlants as $plant){ //for each a post object
                    ?>
                            <li>
                                <a href="
                                    <?php echo get_the_permalink($plant);?>">       
                                    <?php echo get_the_title($plant);?>
                                </a>
                            </li>   
                    <?php }

                        }else{
                        echo 'No Related Plants to Display';
                        }
                        echo '</ul>';
                    ?>
					</div>
            </section>

            <section class="section-related-tools">
                <div class="section-title-wrap">
                    <h2 class="section-title">
                        Related Tools
                    </h2>
                </div>
                <div class="wrap-ralated-posts">
					<div class="row">
                    <?php 
                        $relatedTools = get_field('related_tools');// array of post objects
                        if($relatedTools){
                            echo '<ul class="link-list min-list">';
                            foreach($relatedTools as $tool){ //for each a post object
                    ?>
                            <li>
                                <a href="
                                    <?php echo get_the_permalink($tool);?>">       
                                    <?php echo get_the_title($tool);?>
                                </a>
                            </li>   
                    <?php }

                        }else{
                        echo 'No Related Tools to Display', '<br>';
                        }
                        echo '</ul>';
                    ?>
					</div>
            </section>

            <section class="section-related-tips">
                <div class="section-title-wrap">
                    <h2 class="section-title">
                        Related Tips
                    </h2>
                </div>
                <div class="wrap-ralated-posts">
					<div class="row">
                    <?php 
                        $relatedTips = get_field('related_tips');// array of post objects
                        if($relatedTips){
                            echo '<ul class="link-list min-list">';
                            foreach($relatedTips as $tip){ //for each a post object
                    ?>
                            <li>
                                <a href="
                                    <?php echo get_the_permalink($tip);?>">       
                                    <?php echo get_the_title($tip);?>
                                </a>
                            </li>   
                    <?php }

                        }else{
                        echo 'No Related Tips to Display', '<br>';
                        }
                        echo '</ul>';
                    ?>
					</div>
            </section>
		<?php } ?>
	</div><!-- #container -->
</div><!-- #content -->
<?php
get_footer();
