<?php get_header(); ?>
<main class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include('layouts/page-header.php'); ?>
        <div class="entry-content ica-wrapper">
            <div class="ica-wrapper">
                <h2 class="ica-wrapper-title"><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
            <div class="ica-contact">
            <?php   
            if($_POST) :
                session_start();

                $_SESSION['first_name'] = "";
                $_SESSION['last_name'] = "";
                $_SESSION['email'] = "";
                $_SESSION['phone'] = "";
                $_SESSION['message'] = "";
                $_SESSION['company'] = "";
                
                if(isset($_POST['first_name'])) {
                    $_SESSION['first_name'] = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
                }
            
                if(isset($_POST['last_name'])) {
                    $_SESSION['last_name'] = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
                }
                
                if(isset($_POST['email'])) {
                    $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
                    $_SESSION['email'] = filter_var($email, FILTER_VALIDATE_EMAIL);
                }
            
                if(isset($_POST['phone'])) {
                    $_SESSION['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
                }

                if(isset($_POST['company'])) {
                    $_SESSION['company'] = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
                }
            
                if(isset($_POST['message'])) {
                    $eventName = get_field('event_name', 'option');
                    $_SESSION['message'] = $_POST['message'];
                    $cleanMessage = htmlspecialchars($_POST['message']);
                    $message  = '<html><body>';
                    $message .= "<p>You've recieved a new inquiry from the <strong>" . $eventName . "</strong> website.</p>";
                    $message .= '<br>';
                    $message .= '<p><strong>Name: </strong>' . $first_name . ' ' . $last_name . '</p>';
                    $message .= '<p><strong>Email: </strong>' . $email . '</p>';
                    if ( !empty($phone) ) :
                        $message .= '<p><strong>Phone: </strong>' . $phone . '</p>';
                    endif;
                    if ( !empty($company) ) :
                        $message .= '<p><strong>Company or Organization: </strong>' . $company . '</p>';
                    endif;
                    $message .= '<p><strong>Message: </strong></p><br>';
                    $message .= '<p>' . $cleanMessage . '</p>';
                    $message .= '</body></html>';
                }

                $recipient = get_field('contact_email_address', 'option');

                $subject = 'New ICA Events Inquiry';

                $domain =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);

                $sender = "wordpress@" . $domain;
                                            
                $headers  = 'MIME-Version: 1.0' . "\r\n"
                .'Content-type: text/html; charset=utf-8' . "\r\n"
                .'From: ' . $sender . "\r\nReply-to: $email";
                
                if(mail($recipient, $subject, $message, $headers)) { 
                    
                    echo "<p id='contactFeedback' class='ica-contact-feedback ica-contact-feedback--thankyou'><i class='fas fa-check-circle'></i>Thank you for contacting us, we'll get back to you shortly.</p>";

                } else {

                    echo "<p id='contactFeedback' class='ica-contact-feedback ica-contact-feedback--error'><i class='fas fa-exclamation-circle'></i><b>Sorry, something went wrong.</b> Please check your entries and try again. If the problem continues, you can reach us directly at <a href='mailto:$recipient'>$recipient</a>.</p>";

                }
                
            endif;     
            ?>
                <form name="contactForm" method="post" action="">
                    <div class="form-row ica-contact--name">
                        <div class="form-group col-6">
                            <label for="first_name">First Name *</label>
                            <input type="text" name="first_name" id="contactFirstName" maxlength="50" class="form-control" required validate>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Last Name *</label>
                            <input type="text" name="last_name" id="contactLastName" maxlength="50" class="form-control" required validate>
                        </div>
                    </div>
                    <div class="form-row ica-contact--contact">
                        <div class="form-group col-6">
                            <label for="email">Email *</label>
                            <input type="email" name="email" id="contactEmail" class="form-control" required validate>
                        </div>
                        <div class="form-group col-6">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="contactPhone" placeholder="Optional" class="form-control" validate>
                        </div>
                    </div>
                    <div class="form-row ica-contact--message">
                        <div class="form-group col">
                            <label for="message">Message *</label>
                            <textarea type="text" name="message" id="contactMessage" minlength="20" rows="5" class="form-control" required ></textarea>
                        </div>
                    </div>
                    <div class="form-row ica-contact--company">
                        <div class="form-group col">
                            <label for="company">Company/Organization</label>
                            <input type="text" name="company" id="contactCompany" placeholder="Optional" class="form-control" >
                        </div>
                    </div>
                    <div class="form-row  ica-contact--submit">
                        <div class="form-group col" style="text-align: center;">
                            <button type="submit" class="btn btn--primary" value="Submit">Submit</button>
                        </div>
                    </div>
                </form>

                <script type="text/javascript"> 
                    var feedback    = $('#contactFeedback');
                    var error       = 'ica-contact-feedback--error';
                    var firstName   = "<?php echo $_SESSION['first_name']; ?>";
                    var lastName    = "<?php echo $_SESSION['last_name']; ?>";
                    var email       = "<?php echo $_SESSION['email']; ?>";
                    var phone       = "<?php echo $_SESSION['phone']; ?>";
                    var message     = "<?php echo $_SESSION['message']; ?>";
                    var company     = "<?php echo $_SESSION['company']; ?>";

                    if ( feedback.hasClass(error) ) {
                        $('#contactFirstName').val(firstName);
                        $('#contactLastName').val(lastName);
                        $('#contactEmail').val(email);
                        $('#contactPhone').val(phone);
                        $('#contactMessage').val(message);
                        $('#contactCompany').val(company);
                    }

                </script>
            </div>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>