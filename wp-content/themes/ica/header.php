<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110729983-5"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-110729983-5');
        </script>


        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <link href="https://fonts.googleapis.com/css?family=Ibarra+Real+Nova:400,400i,600,600i,700,700i|Muli:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php wp_head(); ?>

        <style>
            :root {
                --ica-event-primary-color: <?php echo get_field('ica_event_primary_color', 'option'); ?>;
                --ica-event-secondary-color: <?php echo get_field('ica_event_secondary_color', 'option'); ?>;
                --ica-event-heading-font-family: <?php echo get_typography_field( 'ica_event_heading_font', 'font_family', 'option' ); ?>;
                --ica-event-heading-font-weight: <?php echo get_typography_field( 'ica_event_heading_font', 'font_weight', 'option' ); ?>;       
                --ica-event-body-font-family: <?php echo get_typography_field( 'ica_event_body_font', 'font_family', 'option' ); ?>;         
            }
        </style>

        <?php 
        $homeHeaderBG = get_field('header_background', 5);
        $homeHeaderBGmobile = get_field('mobile_header_background', 5);  
        if ( !empty( $homeHeaderBGmobile ) ) {
            $homeHeaderBGmobile = $homeHeaderBGmobile;
        } else {
            $homeHeaderBGmobile = $homeHeaderBG;
        };

        $headerBG = get_field('page_header_image', 'option');      
        $headerBGmobile = get_field('page_header_image', 'option');        
        if ( !empty( $headerBGmobile ) ) {
            $headerBGmobile = $headerBGmobile;
        } else {
            $headerBGmobile = $headerBG;
        };
        ?>
        <style>
            .header {
                background-image: url('<?php echo $headerBG; ?>');
            }
            .header--home {
                background-image: url('<?php echo $homeHeaderBG; ?>');
            }
            @media (max-width: 480px) {
                .header {
                background-image: url('<?php echo $headerBGmobile; ?>');
                }
                .header--home {
                    background-image: url('<?php echo $homeHeaderBGmobile; ?>');
                }
            }
        </style>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <header class="ica-nav">
                <div class="ica-nav__topbar">
                    <div class="ica-nav__wrapper ica-nav__wrapper--topbar">
                        <div class="ica-nav__topbar--left">
                            <a class="ica-nav__topbar__link ica-nav__topbar__link--phone" href="tel:1-<?php echo get_field('contact_email_address', 'option'); ?>"><i class="fas fa-phone"></i><?php echo get_field('contact_phone_number', 'option'); ?></a>
                            <a class="ica-nav__topbar__link ica-nav__topbar__link--email" href="mailto:<?php echo get_field('contact_email_address', 'option'); ?>"><i class="fas fa-envelope"></i><?php echo get_field('contact_email_address', 'option'); ?></a>
                        </div>
                        <div class="ica-nav__topbar--right">
                            <p>Already registered? <a class="ica-nav__topbar__link ica-nav__topbar__link--login" href="<?php echo get_field('cvent_login_url', 'option'); ?>" target="_blank">Login</a></p>
                        </div>
                    </div>
                </div>
                <div class="ica-nav__wrapper">
                    <div class="ica-nav__logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo get_field('ica_event_logo', 'option'); ?>" />
                        </a>
                    </div>
                    <nav id="menu" class="ica-nav__menu">
                        <div id="menuIcon" class="ica-nav__menu--icon">
                            <svg width="50" height="50">
                                <line class="line line--top" x1="5" y1="10" x2="45" y2="10"/>
                                <line class="line line--mid" x1="5" y1="25" x2="45" y2="25"/>
                                <line class="line line--bottom" x1="5" y1="40" x2="45" y2="40"/>
                            </svg>
                        </div>
                        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    </nav>
                    <script type="text/javascript">
                        var cventUrl = '<?php echo get_field('cvent_reg_url', 'option'); ?>';
                        $('#menu-main-navigation li:last-child a').attr({
                            'href': cventUrl,
                            'target': '_blank',
                        });
                    </script>
                </div>  
            </header>   
            <div class="ica_container">