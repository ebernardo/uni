<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Uni
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="theme-color" content="#007bff" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="HandheldFriendly" content="True" />
<meta name="MobileOptimized" content="320" />
<meta name="author" content="Bernardo | https://www.linkedin.com/in/eduardomatheus/" />
<meta name="og:title" content="Unigran Net"/>
<meta name="og:type" content="Faculdade a Distância"/>
<meta name="og:url" content="http://blogunigranet.com/"/>
<meta name="og:image" content=""/>
<meta name="og:site_name" content="Blog Unigran Net"/>
<meta name="og:description" content="Explore o universo dos cursos de graduação, pós-graduação, mercado de trabalho, e ainda aproveite dicas de ouro no Blog da Unigran Net."/>
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/shards.min.css?version=2.0.1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/shards-extras.min.css?version=2.0.1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/posts.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
<?php wp_head(); ?>
</head>

<body class="shards-landing-page--1">

<!-- Navigation -->
    <nav class="navbar navbar-expand-lg px-0 navbar-fixed-top navbar-light bg-light fixed-top">
        <div class="container px-4">
            <?php if ( get_theme_mod( 'uni_logo' ) ) : ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( get_theme_mod( 'uni_logo' ) ); ?>" class="mr-2" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' width="100">
                </a>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-none d-md-block">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( get_theme_mod( 'uni_social_twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( get_theme_mod( 'uni_social_facebook') ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( get_theme_mod( 'uni_social_instagram') ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( get_theme_mod( 'uni_social_linkedin') ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( get_theme_mod( 'uni_social_website') ); ?>" target="_blank"><i class="fa fa-graduation-cap"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( home_url( '/artigos' ) ); ?>">Artigos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( home_url( '/quem-somos' ) ); ?>">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url( home_url( '/contato' ) ); ?>">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- / Navigation -->