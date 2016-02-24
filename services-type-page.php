<?php
/*
Template Name: Services Type Page
*/


get_header(); ?>
    <div class="container services-type-page" id="<?php echo $post->post_name; ?>">

      <!--Page Contents-->
        <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="primary-service-content">
                    <h1 id="first-header"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>

                <div class="get-started">

                    <?php
                    $get_started_title = get_field('get_started_title');
                    $get_started_body_copy = get_field('get_started_body_copy');
                    $get_started_phone_number = get_field('get_started_phone_number');
                    $get_started_email = get_field('get_started_email');

                    ?>

                    <h1><?php echo $get_started_title; ?></h1>
                    <p><?php echo $get_started_body_copy; ?></p>
                    <h4><a href="tel:<?php echo $get_started_phone_number; ?>"><?php echo $get_started_phone_number; ?></a>&#160;&#160;&#160;|&#160;&#160;&#160;<a href="mailto:<?php echo $get_started_email; ?>"><?php echo $get_started_email; ?></a></h4>

                </div>
            <?php endwhile; ?>

        <?php endif; ?>
        <?php wp_reset_query(); ?>

                <!-- Testimonials -->

                <div>

                    <?php if ( have_posts() ) : ?>
                        <?php 

                        $term_list = wp_get_post_terms($post->ID, 'testimonial_category', array("fields" => "names"));
                        $term_list_single = $term_list[0];

                        query_posts(array(
                            'showposts' => 1,
                            'orderby' => 'rand',
                            'post_type' => 'testimonials', //You can insert any category name
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'testimonial_category',
                                    'field'    => 'slug',
                                    'terms'    => $term_list_single,
                                ),
                            ),

                            )); 

                            ?>
                        <!---Start the Loop-->
                        <?php while ( have_posts() ) : the_post(); ?>

                           <div class="row testimonial">

                                <div class="col-md-3">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="col-md-9">
                                    <?php the_content(); ?>
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </div>

                        <?php endwhile; ?>


                    <?php endif; ?>
                    <?php wp_reset_query(); ?>


                <hr class="section-spacer">

                <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="what-you-get">

                    <?php
                    $what_you_get_title = get_field('what_you_get_title');
                    $oneonone_tutoring_rate = get_field('1on1_tutoring_rate');
                    $in_home_tutoring_rate = get_field('in_home_tutoring_rate');
                    $what_you_get_body_copy = get_field('what_you_get_body_copy');
                    ?>

                    <h1><?php echo $what_you_get_title; ?></h1>
                    
                    <div class="row">
                        <div class="tutoring-rates col-md-6">
                            <h2><?php echo $oneonone_tutoring_rate; ?></h2>
                            <h3>1-on-1 tutoring rate</h3>
                        </div>

                        <div class="tutoring-rates col-md-6">
                            <h2><?php echo $in_home_tutoring_rate; ?></h2>
                            <h3>in home rate</h3>
                        </div>
                    </div>

                    <p><?php echo $what_you_get_body_copy; ?></p>

                </div> <!--End "What You Get" Content -->

                <hr class="section-spacer">

                <!-- Classes and More -->

                <div class="more-services">

                    <?php
                    $other_services_title = get_field('other_services_title');
                    $other_services_copy = get_field('other_services_copy');

                    $first_service_text = get_field('first_service_text');
                    $first_service_symbol = get_field('first_service_symbol');
                    $first_service_color = get_field('first_service_color');
                    $first_service_link = get_field('first_service_link');

                    $second_service_text = get_field('second_service_text');
                    $second_service_symbol = get_field('second_service_symbol');
                    $second_service_color = get_field('second_service_color');
                    $second_service_link = get_field('second_service_link');

                    $third_service_text = get_field('third_service_text');
                    $third_service_symbol = get_field('third_service_symbol');
                    $third_service_color = get_field('third_service_color');
                    $third_service_link = get_field('third_service_link');
                    ?>

                    <h1><?php echo $other_services_title ?></h1>
                    <p><?php echo $other_services_copy ?></p>

                    <div class="other-services row">
                        <div class="col-md-4" style="background-color:<?php echo $first_service_color ?>;">
                            <a href="<?php echo $first_service_link ?>"><i class="fa <?php echo $first_service_symbol ?> fa-5x"></i><h4><?php echo $first_service_text ?></h4></a>
                        </div>

                        <div class="col-md-4" style="background-color:<?php echo $second_service_color ?>;">
                            <a href="<?php echo $second_service_link ?>"><i class="fa <?php echo $second_service_symbol ?> fa-5x"></i><h4><?php echo $second_service_text ?></h4></a>
                        </div>

                        <div class="col-md-4" style="background-color:<?php echo $third_service_color ?>;">
                            <a href="<?php echo $third_service_link ?>"><i class="fa <?php echo $third_service_symbol ?> fa-5x"></i><h4><?php echo $third_service_text ?></h4></a>
                        </div>
                    </div>

                    <a class="btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>contact">Contact</a>

                </div>


            <?php endwhile; ?>
        <?php endif; ?>



        <!-- #post-## -->
    <!-- End Page Contents-->

    

<?php get_footer(); ?>

