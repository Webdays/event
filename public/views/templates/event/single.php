<?php get_header(); ?>

  <div id="primary" class="content-area all-100">
    <div id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">
        </div><!-- .entry-meta -->
      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->

      <footer class="entry-footer">
      </footer><!-- .entry-footer -->
    </article><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

    </div><!-- #main -->
  </div><!-- #primary -->
<?php get_footer(); ?>