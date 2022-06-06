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

                    <?php $sponsorshipLevels = get_field('sponsorship_level', 'option');
                    foreach( $sponsorshipLevels as $sponsorshipLevel ) : ?>
                        <?php
                        $levelHasSponsors = false;
                        $sponsorId = str_replace(' ', '-', $sponsorshipLevel['title']);
                        ?>

                        <h4 id="sponsor-<?php echo $sponsorId; ?>"><span style="display: inline-block; padding-right: .5rem; color: <?php echo $sponsorshipLevel['color'];?>;"><?php echo $sponsorshipLevel['icon'];?></span><?php echo $sponsorshipLevel['title']; ?></h4>
                        <div class="container-fluid">
                            <div class="row justify-content-around">
                                <?php $sponsors = get_field('sponsors', 'option');          
                                
                                foreach( $sponsors as $sponsor ) : ?>

                                    <?php if ( $sponsor['sponsor_level'] == $sponsorshipLevel['title'] ) : ?>
                                        <?php $levelHasSponsors = true; ?>

                                        <div class="col-4 mb-4 ica-home--sponsors-item">

                                            <?php if ( !empty( $sponsor['sponsor_logo'] ) ) { ?>
                                                <img src="<?php echo $sponsor['sponsor_logo']; ?>" class="ica-home--sponsors-item--logo" />
                                                <?php if ( !empty( $sponsor['sponsor_website'] ) ) : ?>
                                                    <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank">Visit <?php echo $sponsor['sponsor_name']; ?></a>
                                                <?php endif; ?>
                                            <?php } else { ?>
                                                <h3 class="ica-home--sponsors--name"><?php echo $sponsor['sponsor_name']; ?></h3>
                                                <a href="<?php echo $sponsor['sponsor_website']; ?>" target="_blank"><?php echo $sponsor['sponsor_website']; ?></a>
                                                <p><?php echo $sponsor['sponsor_email']; ?></p>
                                                <p><?php echo $sponsor['sponsor_phone']; ?></p>
                                                <p><?php echo $sponsor['sponsor_address']; ?></p>
                                                <p><?php echo $sponsor['sponsor_city']; ?></p>
                                            <?php } ?>
        
                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div>
                        </div>

                        <?php if (!$levelHasSponsors) : ?>
                            <script type="text/javascript">
                                $('#sponsor-<?php echo $sponsorId; ?>').hide();
                            </script>
                        <?php endif; ?>

                    <?php endforeach; ?>
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