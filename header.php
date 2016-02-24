
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

  <nav class="navbar navbar-default navbar-fixed-right">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name') ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img id="header-logo" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/oneroomschoolhouse/imgs/reason-math-tutoring-logo.png" />
      </a>
      <ul class="nav navbar-nav">
        <li class="nav-math-tutoring"><a href="<?php echo esc_url( home_url( '/' ) ); ?>math-tutoring"><i class="fa fa-superscript fa-4x"></i><br>Math Tutoring</a></li>
        <li class="nav-test-prep"><a href="<?php echo esc_url( home_url( '/' ) ); ?>test-prep"><i class="fa fa-pencil fa-4x"></i><br>Test Prep</a></li>
        <li class="nav-home-schooling"><a href="<?php echo esc_url( home_url( '/' ) ); ?>home-school"><i class="fa fa-home fa-4x"></i><br>Home Schooling</a></li>
        <li class="nav-classes"><a href="<?php echo esc_url( home_url( '/' ) ); ?>classes"><i class="fa fa-users fa-4x"></i><br>Classes</a></li>
        <li class="nav-calendar"><a href="<?php echo esc_url( home_url( '/' ) ); ?>calendar"><i class="fa fa-calendar fa-4x"></i><br>Calendar</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

    
    