<?php

/*
Template Name:  Contact Form Page Template

*/

?>

<?php

//response generation function
$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message)
{

    global $response;

    if ($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

    //response messages
    $not_human       = "Human verification incorrect.";
    $missing_content = "Please supply all information.";
    $email_invalid   = "Email Address Invalid.";
    $message_unsent  = "Message was not sent. Try Again.";
    $message_sent    = "Thanks! Your message has been sent.";

    //user posted variables
    $name = $_POST['message_name'];
    $email = $_POST['message_email'];
    $message = $_POST['message_text'];
    $human = $_POST['message_human'];

    //php mailer variables
    $to = get_option('admin_email');
    $subject = "Someone sent a message from " . get_bloginfo('name');
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n";

    if (!$human == 0) {
        if ($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
        else {

            //validate email
            //validate presence of name and message
            //send email
        }
    } else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);
}


?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="sm:px-8 mt-16 sm:mt-32">
            <div class="mx-auto w-full max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <header class="max-w-2xl">
                            <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
                                <?php the_title(); ?>
                            </h1>

                        </header>

                        <div class="mt-16 sm:mt-20">
                            <div class="prose dark:prose-invert max-w-2xl">
                                <?php the_content(); ?>

                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cstyle%20type%3D%22text%2Fcss%22%3E%0A%20%20.error%7B%0A%20%20%20%20padding%3A%205px%209px%3B%0A%20%20%20%20border%3A%201px%20solid%20red%3B%0A%20%20%20%20color%3A%20red%3B%0A%20%20%20%20border-radius%3A%203px%3B%0A%20%20%7D%0A%0A%20%20.success%7B%0A%20%20%20%20padding%3A%205px%209px%3B%0A%20%20%20%20border%3A%201px%20solid%20green%3B%0A%20%20%20%20color%3A%20green%3B%0A%20%20%20%20border-radius%3A%203px%3B%0A%20%20%7D%0A%0A%20%20form%20span%7B%0A%20%20%20%20color%3A%20red%3B%0A%20%20%7D%0A%3C%2Fstyle%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<style>" title="<style>" />

                                <div id="respond">
                                    <?php echo $response; ?>
                                    <form action="<?php the_permalink(); ?>" method="post">
                                        <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
                                        <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
                                        <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
                                        <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                                        <input type="hidden" name="submitted" value="1">
                                        <p><input type="submit"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>