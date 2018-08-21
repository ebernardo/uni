<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Uni
 */
?>
<!-- Footer Section -->
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <?php if ( get_theme_mod( 'uni_logo' ) ) : ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( get_theme_mod( 'uni_logo' ) ); ?>" class="mr-2" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' width="100">
                </a>
            <?php endif; ?>
                <div class="collapse navbar-collapse d-none d-md-block" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Início</a>
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
    </footer>
    <!-- / Footer Section -->
    <!-- JavaScript Dependencies -->
    <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/3034811a-e5bf-4fe0-b0db-019c319df007-loader.js" ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php wp_footer(); ?>
</body>
</html>
