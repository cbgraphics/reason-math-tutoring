<?php 

/*
Template Name: Contact Page
*/


get_header(); ?>
    <div class="container">

      <!--Page Contents-->
        <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                $first_column_icon = get_field('first_column_icon');
                $first_column_text = get_field('first_column_text');
                $second_column_icon = get_field('second_column_icon');
                $second_column_text = get_field('second_column_text');
                $third_column_icon = get_field('third_column_icon');
                $third_column_text = get_field('third_column_text');
                ?>

                <h1 style="margin-bottom: 75px;"><?php the_title(); ?></h1>
                
                <div class="row three-column-wrapper">
                    <div class="col-md-4">
                        <i class="fa <?php echo $first_column_icon; ?> fa-2x three-column-icon"></i>
                        <br />
                        <?php echo $first_column_text; ?>
                    </div>

                    <div class="col-md-4">
                        <i class="fa <?php echo $second_column_icon; ?> fa-2x three-column-icon"></i>
                        <br />
                        <?php echo $second_column_text; ?>
                    </div>
                    
                    <div class="col-md-4">
                        <i class="fa <?php echo $third_column_icon; ?> fa-2x three-column-icon"></i>
                        <br />
                        <?php echo $third_column_text; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <?php the_content(); ?>
                    </div>
                </div>


            <?php endwhile; ?>


        <?php endif; ?>
    <!-- End Page Contents-->

    

<?php get_footer(); ?>

