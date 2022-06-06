<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
            <?php echo get_field('speaker_introduction'); ?>
            <div class="ica-speakers">
                <?php $speakers = get_field('speakers', 'option'); 
                $i = 0;
                foreach( $speakers as $speaker ) :
                    $i++;
                    if ( !empty( $speaker['show_toggle'] ) ) : ?>

                        <div class="card mb-3 ica-card">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <img src="<?php echo $speaker['speaker_photo']; ?>" class="card-img ica-card-img">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $speaker['speaker_name']; ?></h3>
                                        <p class="card-text"><?php echo $speaker['speaker_bio']; ?></p>
                                        <?php 
                                        $speakerNotes = $speaker['speaker_notes'];
                                        if ( !empty($speakerNotes) ) :
                                            foreach( $speakerNotes as $speakerNote ) : ?>
                                                <p class="card-text"><a href="<?php echo $speakerNote['note']; ?>" aria-label="View Speaker Note" title="View Speaker Note" target="_blank"><?php echo 'View ' . $speakerNote['title']; ?></a></p>
                                            <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>