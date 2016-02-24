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
    <div class="container classes-single">

      <!--Page Contents-->
        <?php if ( have_posts() ) : ?>
            <!---Start the Loop-->
            <?php while ( have_posts() ) : the_post(); ?>

            	<?php
            		$banner_image = get_field('banner_image');
            		$class_start_date = get_field('class_start_date');
            		$class_end_date = get_field('class_end_date');
            		$registration_end_date = get_field('registration_end_date');
            		$class_tuition = get_field('class_tuition');
            		$class_end_date_formatting = '&#8195;-&nbsp;';

            		$class_end_date_format = $class_end_date_formatting + $class_end_date;
                ?>

                <h1><?php the_title(); ?></h1>
                
                <?php echo wp_get_attachment_image( $banner_image );?>
                <h2><?php echo $class_start_date?><?php if ($class_end_date){ echo $class_end_date ; }?></h2>
                <h3 class="class-registration">Registration Ends <?php echo $registration_end_date ?></h3>
                <h4 class="class-tuition">Tuition: <?php echo $class_tuition ?></h4>

                <?php the_content(); ?>

            <?php endwhile; ?>


        <?php endif; ?>

        <!-- Recent Blog Posts -->
    <div class="recent-blog-posts-wrapper">
        <h1>More Classes</h1>
            <div class="row">
                <?php query_posts('posts_per_page=3&post_type=classes&orderby=rand'); ?> 
                    <?php while (have_posts()) : the_post(); ?>

                    	<?php
		            		$banner_image = get_field('banner_image');
		            		$class_start_date = get_field('class_start_date');
		            		$class_end_date = get_field('class_end_date');
		            		$registration_end_date = get_field('registration_end_date');
		            		$class_tuition = get_field('class_tuition');
		            		$class_end_date_formatting = '&#8195;-&nbsp;';

		            		$class_end_date_format = $class_end_date_formatting + $class_end_date;
		                ?>

                        <article id="post-<?php the_ID(); ?>" class="more-classes col-md-4">
                                <?php if (has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" >
                                    <h2><?php the_title(); ?></h2>
                                    <h4><?php echo $class_start_date?><?php if ($class_end_date){ echo $class_end_date ; }?></h4>
                                </a>
                            <!-- .entry-content -->
                        </article>
                    <?php endwhile;?>
            </div>
    </div>
    <!-- End Page Contents-->

    

<?php get_footer(); ?>

