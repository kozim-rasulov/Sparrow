<?
/*
Template Name: Портфолио
Template Post Type: portfolio
*/
?>


<?php get_header(); ?>

<!-- Page Title
   ================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
            <h1>Our Amazing Works<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
   ================================================== -->
<div class="content-outer">

    <div id="page-content" class="row portfolio">

        <section class="entry cf">

            <div id="secondary" class="four columns entry-details">

                <h1><?php the_title(); ?></h1>

                <div class="entry-description">

                    <?php the_content(); ?>

                </div>

                <ul class="portfolio-meta-list">
                    <li><span>Date: </span><?php the_field('date'); ?></li>
                    <li><span>Client </span><?php the_field('client'); ?></li>
                    <li><span>Skills: </span><?php the_field('skills'); ?></li>
                </ul>

                <a class="button" href="<?php the_field('link'); ?>">View project</a>

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

                <div class="entry-media">

                    <?php the_post_thumbnail(); ?>

                </div>

                <div class="entry-excerpt">

                    <?php the_excerpt(); ?>

                </div>

            </div> <!-- primary end-->

        </section> <!-- end section -->

        <ul class="post-nav cf">
            <li class="prev">
                <?php next_post_link("%link", "<strong>Previous Entry</strong> %title"); ?>
            </li>
            <li class="next">
                <?php previous_post_link("%link", "<strong>Next Entry</strong> %title"); ?>
            </li>
        </ul>

    </div>

</div> <!-- content End-->

<?php get_footer($name, $args); ?>