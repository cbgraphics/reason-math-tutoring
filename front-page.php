<!--Front Page of One Room School House Theme
Displays page contents, three most current events and staff profiles -->

<?php get_header(); ?>

<div class="container">
    
    <!--Page Contents-->
        <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>

            <?php endwhile; ?>


        <?php endif; ?>
        <?php wp_reset_query(); ?>
    <!-- End Page Contents-->

    <hr class="section-spacer">


    <!--Events, 3 most current-->
    <div class="front-page-events">
        <h1>Events</h1>
        <?php if ( have_posts() ) : ?>
            <?php query_posts('post_type=tribe_events&posts_per_page=3'); ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

               <div class="row events-front-page">

                    <div class="col-md-3">
                        <h1 class="events-front-page-date"><?php echo tribe_get_start_date($post->ID, true, $format = 'm/d'); ?></h1>
                    </div>
                    <div class="col-md-9">
                        <h1><?php the_title(); ?></h1>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn-primary btn-calendar">Learn More</a>
                    </div>
                </div>

            <?php endwhile; ?>


        <?php endif; ?>
        <?php wp_reset_query(); ?>

    </div>

    <hr class="section-spacer">

    <!--All Staff-->
    <div class="front-page-staff">
        <?php 

        $args_senior_staff = array(
            'post_type' => 'staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'staff_tag',
                    'field'    => 'slug',
                    'terms'    => 'senior-staff',
                ),
            ),
        );

        $args_all_staff = array(
            'post_type' => 'staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'staff_tag',
                    'field'    => 'slug',
                    'terms'    => 'senior-staff',
                    'operator' => 'NOT IN',
                ),
            ),
        );

        

        ?>

         <h1>About Us</h1>

        <?php if ( have_posts() ) : ?>
            <?php query_posts($args_senior_staff); ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <?php $staff_title = get_field('staff_title'); ?>
               
                <div class="staff-front-page senior-staff col-md-12">
                    <div class="col-md-6">
                        <?php the_post_thumbnail(); ?>
                    </div>

                    <div class="col-md-6">
                        <h1><?php the_title(); ?></h1>
                        <h2><?php echo $staff_title; ?></h2>
                        <?php the_content(); ?>
                    </div>


                </div>

            <?php endwhile; ?>


        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <?php if ( have_posts() ) : ?>
            <?php query_posts($args_all_staff); ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <?php $staff_title = get_field('staff_title'); ?>
               
                <div class="staff-front-page all-staff col-md-6">
                        <?php the_post_thumbnail(); ?>
                        <h1><?php the_title(); ?></h1>
                        <h2><?php echo $staff_title; ?></h2>
                        <?php the_content(); ?>


                </div>

            <?php endwhile; ?>


        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact" class="btn-primary">Contact Us</a>
        
    </div>

<?php get_footer(); ?>

