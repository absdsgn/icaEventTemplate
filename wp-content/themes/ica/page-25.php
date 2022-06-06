<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <div class="ica-wrapper">
                <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
                <?php echo get_field('faq_introduction'); ?>
            </div>

            <div class="accordion ica-accordion" id="faqAccordion">            
                <?php $faqs = get_field('faqs'); 
                $i = 0;
                foreach( $faqs as $faq ) :
                    $i++; ?>

                    <div class="card ica-accordion--card">
                        <div class="card-header ica-accordion--card-header" id="faq<?php echo $i; ?>">
                            <a class="ica-accordion--card-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                <?php echo $faq['question']; ?>
                            </a>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="faq<?php echo $i; ?>" data-parent="#faqAccordion">
                            <div class="card-body">
                                <?php echo $faq['answer']; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <script type="text/javascript">
            // $('#1-tab').trigger('click');
        </script>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>