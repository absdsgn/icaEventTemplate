            </div>
            <footer id="footer" class="ica-footer">
                <div class="container-fluid ica-footer-bar">
                    <a href="<?php echo get_field('cvent_reg_url', 'option'); ?>" target="_blank">Click here to get your registration started!</a>
                </div>
                <div class="ica-footer-wrapper">
                    <div class="container-fluid ica-footer-content">
                        <div class="row justify-content-end">
                            <div class="col ica-footer-content--left">
                                <a href="http://www.chiropractic.org/" target="_blank"><img src="<?php echo site_url();?>/wp-content/uploads/2019/05/2019-05-24-1.png" /></a>
                                <a href="https://www.facebook.com/InternationalChiropractorsAssociation/" target="_blank">Like us on Facebook<i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.twitter.com/search?vertical=default&q=international%20chiropractors%20association&src=typd" target="_blank">Stay connected on Twitter<i class="fab fa-twitter"></i></a>
                            </div>
                            <div class="col-3 ica-footer-content--center">
                                <h4>Navigation</h4>
                                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                            </div>
                            <div class="col-3 ica-footer-content--right">
                                <h4>Contact Us</h4>
                                <a href="mailto:<?php echo get_field('contact_email_address', 'option'); ?>"><?php echo get_field('contact_email_address', 'option'); ?></a>
                                <a href="tel:1-<?php echo get_field('contact_phone_number', 'option'); ?><"><?php echo get_field('contact_phone_number', 'option'); ?></a>
                                <p>6400 Arlington Boulevard</p>
                                <p>Suite 800</p>
                                <p>Falls Church, VA 22042</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="copyright" class="ica-footer-copyright">
                    <div class="container">
                        <p>&copy; <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?> International Chiropractors Association. All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
        <script type="text/javascript" src="<?php echo site_url() . '/wp-content/themes/ica/js/index.js'; ?>"></script>
    </body>
</html>