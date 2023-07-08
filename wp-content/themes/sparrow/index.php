<?php get_header(); ?>

<!-- Intro Section
   ================================================== -->
<section id="intro">

    <!-- Flexslider Start-->
    <div id="intro-slider" class="flexslider">

        <ul class="slides">

            <?
            $query = new WP_Query([
                "post_type" => "slider",
                "posts_per_page" => -1
            ]);

            // Цикл
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>
                    <!-- Slide -->
                    <li>
                        <div class="row">
                            <div class="twelve columns">
                                <div class="slider-text">
                                    <h1><?php the_title(); ?><span>.</span></h1>
                                    <?php the_content(); ?>
                                </div>
                                <div class="slider-image">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            </div>
                        </div>
                    </li>

            <?
                endwhile;
            endif;
            ?>

        </ul>

    </div> <!-- Flexslider End-->

</section> <!-- Intro Section End-->

<!-- Info Section
   ================================================== -->
<section id="info">

    <div class="row">

        <div class="bgrid-quarters s-bgrid-halves">

            <?php dynamic_sidebar("sidebar-index"); ?>

        </div>

    </div>

</section> <!-- Info Section End-->

<!-- Works Section
   ================================================== -->
<section id="works">

    <div class="row">

        <div class="twelve columns align-center">
            <h1>Some of our recent works.</h1>
        </div>

        <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

            <?
            $query = new WP_Query([
                "post_type" => "portfolio",
                "posts_per_page" => 4
            ]);

            // Цикл
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>
                    <div class="columns portfolio-item">
                        <div class="item-wrap">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                                <div class="overlay"></div>
                                <div class="link-icon"><i class="fa fa-link"></i></div>
                            </a>
                            <div class="portfolio-item-meta">
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php the_field('type'); ?></p>
                            </div>
                        </div>
                    </div>
            <?
                endwhile;
            endif;
            ?>

        </div>

    </div>

</section> <!-- Works Section End-->

<!-- Journal Section
   ================================================== -->
<section id="journal">

    <div class="row">
        <div class="twelve columns align-center">
            <h1>Our latest posts and rants.</h1>
        </div>
    </div>

    <div class="blog-entries">

        <?
        // параметры по умолчанию
        $my_posts = get_posts(array(
            'numberposts' => 3,
            'post_type'   => 'post',
        ));

        global $post;

        foreach ($my_posts as $post) :
            setup_postdata($post);

        ?>

            <!-- Entry -->
            <article class="row entry">

                <div class="entry-header">

                    <div class="permalink">
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                    </div>

                    <div class="ten columns entry-title pull-right">
                        <h3>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>

                    <div class="two columns post-meta end">
                        <p>
                            <time datetime="2014-01-31" class="post-date" pubdate=""><?php the_time('M j, Y'); ?></time>
                            <span class="dauthor"><?php the_author(); ?></span>
                        </p>
                    </div>

                </div>

                <div class="ten columns offset-2 post-content">
                    <?php the_excerpt(); ?>

                    <a class="more-link" href="<?php the_permalink(); ?>">Read More<i class="fa fa-arrow-circle-o-right"></i></a>
                </div>

            </article> <!-- Entry End -->

        <?
        endforeach;

        wp_reset_postdata(); // сброс

        ?>



    </div> <!-- Entries End -->

</section> <!-- Journal Section End-->




<?php get_footer($name, $args); ?>