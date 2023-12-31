<?php
/**
 * Template Name: Home Custom Page
 */
get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'tafri_travel_above_slider' ); ?>

  <?php if(get_theme_mod('tafri_travel_slider_display_option','Home page') == 'Home page' || get_theme_mod('tafri_travel_slider_display_option') == 'Both Home page & Blog Page'){ ?>

    <?php if( get_theme_mod( 'tafri_travel_slider_hide', false) != '' || get_theme_mod( 'tafri_travel_enable_disable_slider', false) != '') { ?>
      <section id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('tafri_travel_slider_speed', 3000)); ?>">
          <?php $tafri_travel_slider_pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'tafri_travel_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $tafri_travel_slider_pages[] = $mod;
              }
            }
            if( !empty($tafri_travel_slider_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $tafri_travel_slider_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                      the_post_thumbnail();
                    } else{?>
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if( get_theme_mod('tafri_travel_slider_title',true) != ''){ ?>
                      <h1 class="py-lg-3 py-0"><?php the_title(); ?></h1>
                      <hr class="my-0 mx-auto">
                    <?php } ?>
                    <?php if( get_theme_mod('tafri_travel_slider_content',true) != ''){ ?>
                      <p class="py-2"><?php $tafri_travel_excerpt = get_the_excerpt(); echo esc_html( tafri_travel_string_limit_words( $tafri_travel_excerpt, esc_attr(get_theme_mod('tafri_travel_slider_excerpt_number','15')))); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod( 'tafri_travel_slider_button',true) != '' || get_theme_mod( 'tafri_travel_show_hide_slider_button',true) != ''){ ?>
                      <?php if( get_theme_mod('tafri_travel_slider_button_text','View All Travels') != ''){ ?>
                        <div class="view-btn mt-3">
                          <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('tafri_travel_slider_button_text','View All Travels'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tafri_travel_slider_button_text','View All Travels'));?></span></a>
                        </div>
                      <?php } ?>
                    <?php }?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <div class="slider-nex-pre">
            <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
              <span class="screen-reader-text"><?php esc_html_e( 'Previous','tour-traveler' );?></span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
              <span class="screen-reader-text"><?php esc_html_e( 'Next','tour-traveler' );?></span>
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
      </section>
    <?php } ?>

  <?php }?>

  <?php do_action( 'tafri_travel_below_slider' ); ?>

  <?php if( get_theme_mod('tafri_travel_title') != '' || get_theme_mod( 'tafri_travel_desc' )!= ''|| get_theme_mod( 'tafri_travel_popular_destination' )!= ''){ ?>
    <section id="destination" class="text-center">
      <div class="container destination-content">
        <div class="row">
          <?php
          $tafri_travel_catData =  get_theme_mod('tafri_travel_popular_destination');
          if($tafri_travel_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($tafri_travel_catData,'tour-traveler')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                  <div class="des_box">
                    <div class="des_box_img">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    </div>
                    <div class="des_content py-5 px-3 text-center">
                      <h3 class="mb-2 p-0"><?php the_title(); ?></h3>
                      <p>
                        <?php $tafri_travel_excerpt = get_the_excerpt(); echo esc_html( tafri_travel_string_limit_words( $tafri_travel_excerpt,esc_attr(get_theme_mod('tafri_travel_category_excerpt_number','12')))); ?>
                      </p>
                      <div class="read-btn mt-4">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','tour-traveler'); ?><i class="fas fa-arrow-right ms-1"></i><span class="screen-reader-text"><?php esc_html_e( 'Read More','tour-traveler' );?></span>
                        </a>
                      </div>
                    </div>
                    <h3 class="title-btn"><?php the_title(); ?></h3>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
              }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'tafri_travel_below_destination_section' ); ?>

  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
