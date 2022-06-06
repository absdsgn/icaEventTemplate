<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>