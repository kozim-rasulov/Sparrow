<?php get_header(); ?>
<!-- Page Title
   ================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
            <h1>Search<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
   ================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <h2>Вы искали: <i><?php the_search_query(); ?></i></h2>

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
                    <article class="post">

                        <div class="entry-header cf">

                            <h1>
                                <a href="<?php the_permalink(); ?>" title="">
                                    <?php the_title(); ?>
                                </a>
                            </h1>

                            <p class="post-meta">

                                <time class="date" datetime="2014-01-14T11:24"><?php the_time('M j, Y'); ?></time>
                                /
                                <span class="categories">
                                    <?php the_category(' / '); ?>
                                </span>

                            </p>

                        </div>

                        <div class="post-thumb">
                            <a href="<?php the_permalink(); ?>" title="">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </div>

                        <div class="post-content">

                            <?php the_excerpt(); ?>

                        </div>

                    </article> <!-- post end -->

                <? endwhile; ?>
            <? else : ?>

                <h3>По вашему запросу ничего не найдено</h3>

            <? endif; ?>

            <!-- Pagination -->
            <nav class="col full pagination">
                <? the_posts_pagination([
                    'prev_text'    => 'Prev',
                    'next_text'    => 'Next',
                ]); ?>
            </nav>

        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end">

            <?php get_sidebar(); ?>

        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<?php get_footer($name, $args); ?>