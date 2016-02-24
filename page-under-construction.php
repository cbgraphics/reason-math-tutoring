<!--Under Construction Page - set as front page for emergencies and major updates -->


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    <?php wp_head(); ?>
  </head>

  <body>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name') ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="under-construction-nav">
            <img id="header-logo" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/oneroomschoolhouse/imgs/reason-math-tutoring-logo.png" />
      </a>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

    
    

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

<footer>
    <p>&copy; 2015 Reason Math Tutoring. All Rights Reserved.</p>
</footer>

</div> <!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/npm.js"></script>

  </body>
</html>