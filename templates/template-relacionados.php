<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage IndexDC
 * @since 1.0
 * @version 1.0
 */
?>
<!-- /////////  BLOG  \\\\\\\\\ -->
<?php
$do_not_duplicate = array();
$do_not_duplicate[] = get_the_ID();
?>
        <section>
            <div class="section-home-page-blog section-home-blog-bg">
                <div class="section-home-title">
                    <h2 class="section-home-h2" data-kui-anim="fadeInLeft">Posts Relacionados</h2>
                    <hr class="section-home-hr">
                </div>
                <div class="container">
                    <div class="section-home-blog space-1-5">
                        <div class="row">
                            <div class="card-deck">

                                <!-- Blog Posts -->
                                <?php 
                                    query_posts( 'category_name=blog&showposts=3' );
                                    while (have_posts()) : the_post();
                                        if ( !in_array( $post->ID, $do_not_duplicate ) ) {
                                    ?>

                                                <div class="col-md-12 col-lg-4">
                                                    <a class="cad-link" href="<?php the_permalink(); ?>">
                                                        <div class="card mb-6-5">
                                                            <?php if(has_post_thumbnail( )): ?>
                                                                <?php the_post_thumbnail('small', array('class' => 'card-img-top')); ?>
                                                            <?php else: ?>
                                                                <img class="card-img-top" src="assets/img/blog/mkt.jpg" alt="Imagem do Card do Blog">
                                                            <?php endif; ?>
                                                            <div class="card-body">
                                                                <h5 class="card-type"><?php the_time('F jS, Y') ?></h5>
                                                                <h2 class="card-title"><?php the_title(); ?></h2>
                                                                <p class="card-text"><?php echo get_excerpt(); ?></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                <?php } endwhile; wp_reset_postdata();?>
                                <!-- Blog Posts -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /////////  BLOG  \\\\\\\\\ -->