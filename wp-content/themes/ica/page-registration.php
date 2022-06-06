<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content" style="text-align: center;">
            <a id="cventRegPortal" class="btn btn-primary" href="<?php echo get_field('cvent_reg_url', 'option'); ?>" target="_blank">Click here to open our registration portal</a>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>