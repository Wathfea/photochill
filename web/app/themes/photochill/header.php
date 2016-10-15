<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <meta name="description"
          content="Sári Zsolt - Photochill">
    <meta name="author" content="photochill.com">
    <meta name="keywords"
          content="Photochill, Sári Zsolt, Fotográfus, Esküvői fotó, Szeged, Fotós, Fotózás, Családi, Love, Wedding, Couples, Family">
    <meta property="og:title" content="Photochill.com"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://photochill.com/"/>
    <meta property="og:image" content="<?php echo bloginfo('template_url'); ?>/images/logo.png"/>
    <meta property="og:description" content="Sári Zsolt fotográfus"/>
    <meta property="og:locale" content="en_GB"/>
    <meta property="og:locale:alternate" content="es_ES"/>
    <meta property="og:locale:alternate" content="hu_HU"/>


    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!--wordpress head-->
    <?php wp_head(); ?>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script
        type="text/javascript"
        async defer
        src="//assets.pinterest.com/js/pinit.js"
    ></script>
    <![endif]-->
</head>
<body <?php body_class('index'); ?> id="page-top">

<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->
<header>
    <!-- Navigation -->
   <div class="container-fluid">
        <section class="navbar-photochill no-padding">
            <div class="row">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            <a id="navbar-brand" class="col-lg-1 page-scroll" href="<?php echo home_url(); ?>">
                                <span>Photochill</span>
                            </a>
                        </div>

                        <?php
                        wp_nav_menu([
                                'menu'            => 'Main Menu',
                                'theme_location'  => 'primary',
                                'depth'           => 2,
                                'container'       => 'div',
                                'container_class' => 'collapse navbar-collapse navbar-exl-collapse',
                                'container_id'    => 'navbar-collapse-1',
                                'menu_class'      => 'nav navbar-nav navbar-screen navbar-right',
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new PCMyWalkerNavMenu()]
                        );
                        ?>
                    </div>
                </nav>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
</header>
<div class="content">
