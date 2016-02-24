<?php
/*
Template Name: Classes
*/




get_header(); ?>

    <div class="container classes-type-page" id="<?php echo $post->post_name; ?>">
      <!--Page Contents-->
        <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="primary-classes-content">
                    <h1 id="first-header"><?php the_title();?></h1>
                    <?php the_content(); ?>
                </div>

                
            <?php endwhile; ?>

        <?php endif; ?>
        <?php wp_reset_query(); ?>

                <!-- Classes -->


                    <?php if ( have_posts() ) : ?>
                        <?php 

                        query_posts(array(
                            'orderby' => 'menu_order',
                            'post_type' => 'classes', //You can insert any category name
                            )); 

                            ?>
                        <!---Start the Loop-->
                        <div class="row classes-single-listing">
                        <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                    $banner_image = get_field('banner_image');
                                    $class_start_date = get_field('class_start_date');
                                    $class_end_date = get_field('class_end_date');
                                    $registration_end_date = get_field('registration_end_date');
                                    $class_tuition = get_field('class_tuition');
                                    $class_end_date_formatting = '&nbsp;-&nbsp;';
                                    $class_end_date_format = $class_end_date_formatting + $class_end_date;
                                ?>

                                <div class="col-md-6 classes-single-listing-col">
                                    <?php the_post_thumbnail(); ?>
                                    <h1><?php the_title(); ?></h1>
                                    <h3><?php echo $class_start_date?><?php if ($class_end_date){ echo $class_end_date ; }?></h3>
                                    <h6>(Registration Ends <?php echo $registration_end_date ?>)</h6>
                                    <h4><?php echo $class_tuition ?></h4>
                                    <p><?php echo get_classes_excerpt(225); ?></p>
                                    <a class="btn-primary btn-classes" href="<?php the_permalink(); ?>">Learn More</a>
                                </div>

                        <?php endwhile; ?>


                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>

                <hr class="section-spacer">

                <!-- Testimonials -->

                <div>

                    <?php if ( have_posts() ) : ?>
                        <?php 


                        $term_list = wp_get_post_terms($post->ID, 'testimonial_category', array("fields" => "names"));
                        $term_list_single = $term_list[0];

                        query_posts( 

                            array(
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
            <!---Start the Loop
            <?php while ( have_posts() ) : the_post(); ?>

                Classes and More 

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
        <?php endif; ?> -->
</div>


        <!-- #post-## -->
    <!-- End Page Contents-->

    

<?php get_footer(); ?>

