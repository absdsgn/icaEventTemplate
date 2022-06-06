<?php /* Template Name: Schedule */ ?>

<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
            <?php if ( !post_password_required() ) { ?>
            <?php echo get_field('schedule_introduction'); ?>
            <ul class="nav nav-tabs nav-fill ica-tab" id="icaTab" role="tablist">
                <?php $days = get_field('schedule'); 
                $i = 0;
                foreach( $days as $day ) :
                    $i++;
                    $thisDay = $day['day'];?>

                    <li class="nav-item">
                        <a class="nav-link" id="<?php echo $i; ?>-tab" data-toggle="tab" href="#tab<?php echo $i; ?>" role="tab" aria-controls="<?php echo $i; ?>" aria-selected="true"><?php echo $thisDay; ?></a>
                    </li>

                <?php endforeach; ?>
            </ul>
            <div class="tab-content ica-tab-content" id="icaTabContent">
                <?php
                $i = 0;
                foreach( $days as $day ) : 
                    $i++; ?>

                    <div class="tab-pane fade ica-tab-wrapper" id="tab<?php echo $i; ?>" role="tabpanel" aria-labelledby="<?php echo $i; ?>-tab">

                        <?php $sessions = $day['session'];

                        foreach( $sessions as $session ) : ?>

                            <div class="container-fluid ica-tab-container">
                                <div class="row">
                                    <div class="col">
                                        <p style="font-weight: 600;"><?php echo $session['start_time']; if ( !empty( $session['end_time'] ) ) : echo ' - ' . $session['end_time']; endif; ?></p>
                                        <?php if ( !empty( $session['ce_credit_eligibility'] ) ) : echo '<p style="font-size: .8rem;">' . $session['ce_credit_amount'] . 'hrs CE credit</p>'; endif; ?>
                                    </div>
                                    <div class="col-9">
                                        <h4><?php echo $session['title']; ?></h4>
                                        <?php if ( !empty( $session['session_speaker'] ) ) : echo '<p style="font-size: .8rem; padding-bottom: .5rem;">Speaker: ' . $session['session_speaker'] . '</p>'; endif; ?>
                                        <?php echo $session['description']; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                    
                <?php endforeach; ?>
            </div>
            <?php } else {
                echo '<style>';
                echo '.post-password-form { text-align: center; margin: 2rem auto; } .post-password-form p { margin: 1rem auto; font-weight: 600; } .post-password-form label { font-weight: 400; } .post-password-form input#pwbox-430 { padding: .25rem; } .post-password-form input[type="submit"] { padding: .25rem .55rem; }';
                echo '</style>';
                echo get_the_password_form();
            } ?>
        </div>
        <script type="text/javascript">
            $('#1-tab').trigger('click');
        </script>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>