<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
            <?php echo get_field('registration_introduction'); ?>
            <?php $deadlines = get_field('deadlines', 'option');
            if ( !empty($deadlines) ) : ?>
            <div class="ica-registration--wrapper">
                <div class="container-fluid ica-wrapper ica-registration">
                    <div class="row ica-registration--header">
                        <div class="col-4">
                        </div>
                        <?php
                        foreach( $deadlines as $deadline ) : 
                            $title = get_field($deadline . '_title', 'option'); 
                            $startDate = get_field($deadline . '_start', 'option'); 
                            $endDate = get_field($deadline . '_end', 'option'); ?>

                            <div class="col">
                                <h4><?php echo $title; ?></h4>
                                <p style="font-size: .8rem; font-style: italic;">(<?php echo $startDate . '-' . $endDate; ?>)</p>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <?php $rates = get_field('rates', 'option' );
                    foreach( $rates as $rate ) : ?>

                    <div class="row ica-registration--row">
                        <div class="col-4">
                                <h5><?php echo $rate['title']; ?></h5>
                            </div>
                            <?php if ( !empty($rate['early bird_rate'] ) ) :?>
                                <div class="col">
                                    <p>$<?php echo $rate['early bird_rate']; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ( !empty($rate['normal_rate'] ) ) :?>
                                <div class="col">
                                    <p>$<?php echo $rate['normal_rate']; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ( !empty($rate['late_rate'] ) ) :?>
                                <div class="col">
                                    <p>$<?php echo $rate['late_rate']; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ( !empty($rate['on-site_rate'] ) ) :?>
                                <div class="col">
                                    <p>$<?php echo $rate['on-site_rate']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="ica-registration--subtext">
                    <p>Scroll to side for more information <i class="fas fa-chevron-right"></i></p>
                </div>
            </div>
            <?php endif; ?>
            <div class="container-fluid ica-wrapper">
                <?php echo get_field('addon_introduction'); ?>
            </div>
            <?php $addons = get_field('addon_rates', 'option' );
            if ( !empty($addons) ) : ?>
            <div class="ica-registration--wrapper">
                <?php
                foreach( $addons as $addon ) : ?>

                    <div class="container-fluid ica-wrapper ica-registration ica-registration--addon">
                        <div class="row ica-registration--header--addon ica-registration--header">
                            <div class="col">
                                <h4><?php echo $addon['title']; ?></h4>
                            </div>
                        </div>
                        <?php $addonRates = $addon['rate'];
                        foreach( $addonRates as $addonRate ) : ?>

                            <div class="row ica-registration--row">
                                <div class="col">
                                    <h5><?php echo $addonRate['type']; ?></h5>
                                </div>
                                <div class="col">
                                    <p>$<?php echo $addonRate['cost']; ?></p>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>
            </div>  
            <?php endif; ?>
            <div class="container-fluid ica-wrapper">
                <?php echo get_field('ce_introduction'); ?>
            </div>
            <?php $states = get_field('state_approval', 'option');
            if ( !empty($states) ) : ?>
            <div class="ica-registration--wrapper">
                <div class="container-fluid ica-wrapper ica-registration">
                    <div class="row ica-registration--header">
                        <div class="col-4">
                            <h4>State</h4>
                        </div>
                        <div class="col-4">
                            <h4>CE Status</h4>
                        </div>
                        <div class="col-4">
                            <h4>Notes</h4>
                        </div>
                    </div>   
                    <?php 
                    foreach( $states as $state ) : 
                    $status = $state['state_status'];
                    ?>

                        <div class="row ica-registration<?php if ( $status == 'Approved' ) : echo '--approved'; endif; if ( $status == 'Not Approved' ) : echo '--not-approved'; endif; if ( $status == 'Pending' ) : echo '--pending'; endif; ?> ica-registration--row">
                            <div class="col-4">
                                <h5><?php echo $state['state_name']; ?></h5>
                            </div>
                            <div class="col-4">
                                <p><?php echo $state['state_status']; ?></p>
                            </div>
                            <div class="col-4">
                                <p><?php echo $state['state_notes']; ?></p>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="ica-registration--subtext">
                    <p>Scroll to side for more information <i class="fas fa-chevron-right"></i></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>