<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header id="header" class="header d-flex flex-column justify-content-center header--home">
            <div class="container">
                <h4 class="entry-pretitle">Join us for the</h4>
                <h3 class="entry-title"><?php echo get_field('event_name', 'option'); ?></h3>
                    <?php
                        $startDate = get_field('event_start_date', 'option');
                        $startDateShort = substr($startDate, 0, strpos($startDate, ","));
                    ?>
                <h5 class="entry-subtitle"><?php echo $startDateShort . '-' . get_field('event_end_date', 'option') . '&nbsp;&nbsp;&bull;&nbsp;&nbsp;' . get_field('event_location', 'option'); ?></h5>
                <a href="<?php echo get_field('cvent_reg_url', 'option'); ?>" class="btn btn--home-header" target="_blank"><?php echo get_field('registration_button_text'); ?></a><br>
                <a href="#" onClick="smoothScroll('#header')" class="btn btn--home-header btn--home-header--outline">Learn more</a>
            </div>
        </header>
        <div class="entry-content ica-wrapper">
            <div class="container ica-countdown-wrapper">
                <div class="row ica-countdown-text">
                    <div class="col">
                        <p><?php echo get_field('countdown_text'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col ica-countdown-number">
                        <h2 id="countdownDays" class="ica-countdown-number--title">
                            <div class="spinner-grow text-light" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </h2>
                        <p class="ica-countdown-number--subtitle">days</p>
                    </div>
                    <div class="col ica-countdown-number">
                        <h2 id="countdownHours" class="ica-countdown-number--title">
                            <div class="spinner-grow text-light" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </h2>
                        <p class="ica-countdown-number--subtitle">hours</p>
                    </div>
                    <div class="col ica-countdown-number">
                        <h2 id="countdownMinutes" class="ica-countdown-number--title">
                            <div class="spinner-grow text-light" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </h2>
                        <p class="ica-countdown-number--subtitle">minutes</p>
                    </div>
                    <div class="col ica-countdown-number">
                        <h2 id="countdownSeconds" class="ica-countdown-number--title">
                            <div class="spinner-grow text-light" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </h2>
                        <p class="ica-countdown-number--subtitle">seconds</p>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var startDate = new Date("<?php echo $startDate ?>").getTime();
                var x = setInterval(function() {
                // Set some variables
                var todayDate     = new Date().getTime();
                var timeRemaining = startDate - todayDate;
                var days          = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                var hours         = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes       = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds       = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                var daysID        = $('#countdownDays');
                var hoursID       = $('#countdownHours');
                var minutesID     = $('#countdownMinutes');
                var secondsID     = $('#countdownSeconds');

                if ( timeRemaining < 0 ) {
                    $('.ica-countdown-wrapper').hide();
                    $('.btn--home-header').css('margin-top', '1rem');
                } else {
                    // Render the data change
                    daysID.html(days);
                    hoursID.html(hours);
                    minutesID.html(minutes);
                    secondsID.html(seconds);
                }

                // Render the data change
                daysID.html(days);
                hoursID.html(hours);
                minutesID.html(minutes);
                secondsID.html(seconds);
                
                }, 1000);

            </script>
            <?php if ( !empty( get_field('event_description') ) ) { ?>
                <div class="ica-home--description">
                    <?php echo get_field('event_description'); ?>
                </div>
            <?php } ?>
            <div class="container-fluid ica-home--location">
                <div id="icaLocationCarousel" class="carousel slide ica-home--location-carousel" data-ride="carousel">
                    <div class="carousel-inner ica-home--location-carousel--wrapper">
                        <?php $photos = get_field('location_photos');
                        $i = 0;
                        foreach( $photos as $photo ) : 
                        $i++; ?>

                            <div class="carousel-item ica-home--location-carousel--photo <?php if ( $i == '1' ): echo 'active'; endif;?>" style="background-image: url('<?php echo $photo['photo']; ?>');" >
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="ica-home--location--content">
                    <h2><?php echo get_field('location_title');?></h2>
                    <p><?php echo get_field('location_subtitle');?></p>
                    <div class="ica-home--location--content-buttons">
                        <?php $buttons = get_field('location_buttons'); 
                        $i = 0;
                        foreach( $buttons as $button ) : 
                        $i++; ?>

                                <a href="<?php echo $button['button_url']; ?>" <?php if ( $button['button_pou'] == 'URL' ) : echo 'target="_blank"'; endif; ?> class="btn btn--body"><?php echo $button['button_text']; ?><i class="fas fa-chevron-right"></i></a><br>
                        
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php $speakers = get_field('speakers', 'option');
            if ( !empty( $speakers ) ) : ?>
            <div class="container-fluid ica-home--speakers">
                <div class="ica-home--speakers--content">
                    <h2>Speakers</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <?php 
                        $i = 0;
                        foreach( $speakers as $speaker ) :
                            if ( !empty( $speaker['featured_toggle'] ) ) : ?>
                                <div class="col-12 col-lg-4 col-md-6">
                                    <a href="<?php bloginfo('url'); ?>/speakers" class="ica-home--speakers-card-link">
                                        <div class="card ica-home--speakers-card">
                                            <div class="ica-home--speakers-card--photo" style="background-image: url('<?php echo $speaker['speaker_photo']; ?>');"></div>
                                            <div class="card-body ica-home--speakers-card--body">
                                                <h5 class="card-title ica-home--speakers-card--title"><?php echo $speaker['speaker_name']; ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="ica-home--speakers--content">
                        <a href="<?php bloginfo('url'); ?>/speakers" class="btn btn--primary">Meet all of the speakers</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="container-fluid ica-home--details">
                <div class="ica-home--details--content">
                    <h2>Event Details</h2>
                </div>
                <div class="row justify-content-between">
                    <div class="col-6 ica-home--details-col">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <?php 
                                    $address =  get_field('event_address', 'option');
                                    $urlAddress =  rawurlencode( $address ); ?>
                                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $urlAddress; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{margin:0 auto;position:relative;text-align:right;height:500px;width:600px;max-width: 100%;background:#eee;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;max-width:100%;}</style>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ica-home--details-col">
                        <h5>Location</h5>
                        <p><?php echo get_field('event_location', 'option'); ?></p>
                        <p><?php echo $address; ?></p>
                        <a href="https://www.google.com/maps/place/<?php echo $urlAddress; ?>" target="_blank">Map it</a>
                        <?php 
                        $addressLength = strlen($address);
                        $newAddressLength = $addressLength - 5;
                        $addressZip = substr($address , $newAddressLength);
                        ?>
                        <a href="https://weather.com/weather/5day/l/<?php echo $addressZip; ?>" target="_blank">View the weather</a>
                        <h5>Dates</h5>
                        <p><?php echo get_field('event_start_date', 'option') . ' - ' . get_field('event_end_date', 'option'); ?></p>
                        <a href="<?php echo site_url(); ?>/schedule" >View the schedule</a>
                        <h5>Information</h5>
                        <a href="<?php echo site_url(); ?>/speakers" >Meet the speakers</a>
                        <a href="<?php echo site_url(); ?>/hotel" >Learn about the hotel</a>
                        <a href="<?php echo site_url(); ?>/faq" >Check the FAQs</a>
                        <a href="<?php echo site_url(); ?>/contact-us" >Contact us</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid ica-home--sponsors">
                <div class="ica-home--sponsors--content">
                    <h2>Our Sponsors</h2>
                    <p style="font-style: italic;">We'd like extend a special thank you to all of our sponsors and exhibitors.</p>

                    <?php $sponsorshipLevels = get_field('sponsorship_level', 'option');
                    foreach( $sponsorshipLevels as $sponsorshipLevel ) : ?>
                        <?php
                        $levelHasSponsors = false;
                        $sponsorId = str_replace(' ', '-', $sponsorshipLevel['title']);
                        $sponsorId = htmlspecialchars($sponsorId);
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
            </div>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
