<?php
//Get post featured category
    $args = array( 
        'orderby' => 'date',
        'order' => 'DESC',
        'cat' => 'artigos',
        'posts_per_page' => 1,
    );
    
    // the query
    $theme_query = new WP_Query( $args );
    
    $count_all = $theme_query->post_count;
    
    if ($theme_query->have_posts()) : while ($theme_query->have_posts()) : $theme_query->the_post();
?>

<?php 
    if ( has_post_thumbnail() ) {
        echo "<style>
            .shards-landing-page--1 .welcome {
                position: relative;
                height: 50vh !important;
                min-height: 600px;
                background: url(";
                echo the_post_thumbnail_url();
        echo ") no-repeat center center fixed;
                background-size: cover;
            }
        </style>";
    }else{
        echo "
            <style>
                .shards-landing-page--1 .welcome {
                    position: relative;
                    height: 50vh !important;
                    min-height: 600px;
                    background: url(".get_stylesheet_directory_uri()."/images/blog.jpg) no-repeat center center fixed;
                    background-size: cover;
                    margin-top: 0px !important;
                }
            </style>";
        } 
?>
    <!-- Welcome Section -->
    <div class="welcome d-flex justify-content-center flex-column">
        <div class="container">

        </div>
        <!-- .container -->

        <!-- Inner Wrapper -->
        <div class="inner-wrapper mt-auto mb-auto container featured">
            <div class="row">
                <div class="col-md-8">

                   	<a href="<?php the_permalink(); ?>" class="link-featured">
                    	<h1 class="welcome-heading display-4 text-white"><?php the_title(); ?></h1>
					</a>

                    <!--<a class="badge badge-light cat-blog-card" href="<?php //echo esc_url( $category_link ); ?>"><?php //the_category(); ?></a>-->
                    <p class="text-white d-none d-md-block"><?php echo get_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-outline-white align-self-center">Ler artigo completo</a>
                </div>
            </div>
        </div>
        <!-- / Inner Wrapper -->
    </div>
    <!-- / Welcome Section -->
   
<?php
    endwhile; endif;
        
    wp_reset_postdata();  
?>