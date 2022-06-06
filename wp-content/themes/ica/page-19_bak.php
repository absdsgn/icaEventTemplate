<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
            <?php echo get_field('exhibit_introduction'); ?>
            <div class="ica-exhibit--content">
                <div class="ica-exhibit--sponsors">
                    <h4 id="platinum"><i style="color: #c0c0c0; padding-right: .5rem;" class="fas fa-medal"></i>Platinum Level</h4>
                    <div class="container-fluid">
                        <div class="row justify-content-around">
                            <?php $sponsors = get_field('sponsors', 'option');
                            $platinum = 0;

                            foreach( $sponsors as $sponsor ) :
                                if ( $sponsor['sponsorship_level'] == 'Platinum' ) : 
                                    $platinum++; ?>

                                    <div class="col-4 ica-home--sponsors-item">
                                        <?php if ( !empty( $sponsor['sponsor_logo'] ) ) { ?>
                                            <img src="<?php echo $sponsor['sponsor_logo']; ?>" class="ica-home--sponsors-item--logo" />
                                            <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank">Visit <?php echo $sponsor['sponsor_name']; ?></a>
                                        <?php } else { ?>
                                            <h3 class="ica-home--sponsors--name"><?php echo $sponsor['sponsor_name']; ?></h3>
                                            <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank"><?php echo $sponsor['sponsor_website']; ?></a>
                                            <p><?php echo $sponsor['sponsor_email']; ?></p>
                                            <p><?php echo $sponsor['sponsor_phone']; ?></p>
                                            <p><?php echo $sponsor['sponsor_address']; ?></p>
                                            <p><?php echo $sponsor['sponsor_city']; ?></p>
                                        <?php } ?>

                                    </div>
                            
                                <?php endif;
                            endforeach;
                        if ( $platinum == 0 ) :?>
                            <script type="text/javascript">
                                $('#platinum').hide();
                            </script>
                        <?php endif; ?>
                        </div>
                    </div>
                    <h4 id="gold"><i style="color: gold; padding-right: .5rem;" class="fas fa-medal"></i>Gold Level</h4>
                    <div class="container-fluid">
                        <div class="row justify-content-around">
                            <?php $sponsors = get_field('sponsors', 'option');
                            $gold = 0;

                            foreach( $sponsors as $sponsor ) :
                                if ( $sponsor['sponsorship_level'] == 'Gold' ) : 
                                    $gold++; ?>

                                    <div class="col-3 ica-home--sponsors-item">
                                        <?php if ( !empty( $sponsor['sponsor_logo'] ) ) { ?>
                                            <img src="<?php echo $sponsor['sponsor_logo']; ?>" class="ica-home--sponsors-item--logo" />
                                            <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank">Visit <?php echo $sponsor['sponsor_name']; ?></a>
                                        <?php } else { ?>
                                            <h3 class="ica-home--sponsors--name"><?php echo $sponsor['sponsor_name']; ?></h3>
                                            <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank"><?php echo $sponsor['sponsor_website']; ?></a>
                                            <p><?php echo $sponsor['sponsor_email']; ?></p>
                                            <p><?php echo $sponsor['sponsor_phone']; ?></p>
                                            <p><?php echo $sponsor['sponsor_address']; ?></p>
                                            <p><?php echo $sponsor['sponsor_city']; ?></p>
                                        <?php } ?>

                                    </div>
                            
                                <?php endif;
                            endforeach;
                            if ( $gold == 0 ) :?>
                                <script type="text/javascript">
                                    $('#gold').hide();
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h4 id="silver"><i style="color: #c0c0c0; padding-right: .5rem;" class="fas fa-medal"></i>Silver Level</h4>
                    <div class="container-fluid">
                        <div class="row justify-content-around">
                            <?php $sponsors = get_field('sponsors', 'option');
                            $silver = 0;

                            foreach( $sponsors as $sponsor ) :
                                if ( $sponsor['sponsorship_level'] == 'Silver' ) : 
                                    $silver++; ?>

                                    <div class="col-2 ica-home--sponsors-item">
                                        <?php if ( !empty( $sponsor['sponsor_logo'] ) ) { ?>
                                            <img src="<?php echo $sponsor['sponsor_logo']; ?>" class="ica-home--sponsors-item--logo" />
                                            <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank">Visit <?php echo $sponsor['sponsor_name']; ?></a>
                                        <?php } else { ?>
                                            <h3 class="ica-home--sponsors--name"><?php echo $sponsor['sponsor_name']; ?></h3>
                                            <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank"><?php echo $sponsor['sponsor_website']; ?></a>
                                            <p><?php echo $sponsor['sponsor_email']; ?></p>
                                            <p><?php echo $sponsor['sponsor_phone']; ?></p>
                                            <p><?php echo $sponsor['sponsor_address']; ?></p>
                                            <p><?php echo $sponsor['sponsor_city']; ?></p>
                                        <?php } ?>

                                    </div>
                            
                                <?php endif;
                            endforeach;
                            if ( $silver == 0 ) :?>
                                <script type="text/javascript">
                                    $('#silver').hide();
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="container-fluid ica-exhibit--info">
                    <?php
                    $prospectus = get_field('exhibitor_prospectus');
                    if ( !empty($prospectus) ) : ?>
                        <a href="<?php echo $prospectus; ?>" target="_blank" class="btn btn--primary">View the Exhibitor Prospectus</a>
                    <?php endif;
                    $floorplan = get_field('exhibitor_floorplan');
                    if ( !empty($floorplan) ) : ?>
                        <a href="<?php echo $floorplan; ?>" target="_blank" class="btn btn--primary">View the Exhibitor Floorplan</a>
                    <?php endif; ?>
                </div>
                <div class="container-fluid ica-wrapper mt-5 ica-exhibit--levels">
                    <div class="mb-5">
                        <?php echo get_field('sponsorship_intro'); ?>
                    </div>
                    <?php $sponsorLevels = get_field('sponsorship_level', 'option');
                    foreach( $sponsorLevels as $sponsorLevel ) : ?>

                        <div class="row ica-exhibit--levels--title">
                            <div class="col">
                                <h3 style="border-bottom: 4px solid <?php echo $sponsorLevel['color']; ?>; padding-bottom: .5rem;"><span style="font-size: inherit; padding-right: 1rem; color: <?php echo $sponsorLevel['color']; ?>;"><?php echo $sponsorLevel['icon']; ?></span><?php echo $sponsorLevel['title']; ?> - $<?php echo $sponsorLevel['cost']; ?></h3>
                            </div>
                        </div>
                        <div class="row ica-exhibit--levels--description">
                            <div class="col">
                                <?php echo $sponsorLevel['description']; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="container-fluid ica-exhibit--disclaimer">
                    <?php echo get_field('exhibitor_disclaimer'); ?>
                </div>
            </div>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>