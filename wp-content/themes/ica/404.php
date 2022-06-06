<?php get_header(); ?>
<main class="content">
    <article id="post-0" class="post">
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <h2 class="ica-wrapper-title">Oh no!</h2>
            <p style="margin-bottom: 2rem;">We're sorry, we couldn't find the page you were looking for.</p>
            <a href="<?php echo get_bloginfo('url'); ?>" class="btn btn--primary">Return Home</a>
        </div>
    </article>
</main>
<?php get_footer(); ?>