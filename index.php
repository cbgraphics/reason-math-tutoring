<?php 

/**
 * The main template file
 *
 * This is the most generic template file in the One Room Schoolhouse Theme
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 */


get_header(); ?>
    <div class="container">

      <!--Page Contents-->
        <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>

            <?php endwhile; ?>


        <?php endif; ?>
    <!-- End Page Contents-->

    

<?php get_footer(); ?>

