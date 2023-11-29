<?php

require_once('../private/initialize.php');

/* 
  Use the bicycles/staff/new.php file as a guide 
  so your file mimics the same functionality.
  Be sure to include the display_errors() function.
*/


if(is_post_request()) {

  $secretKey = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";

  // Verify reCAPTCHA
  $response = $_POST['g-recaptcha-response'];
  $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$response}";
    $verification = json_decode(file_get_contents($verifyUrl));


  if ($verification->success) {

    // Create record using post parameters
    $args = $_POST['member'];
    $member = new Member($args);
    $result = $member->save();
    $password = $args['password'];
    
    if($result === true) {
      $new_id = $member->id;
      $session->message('Welcome to WNC Birds!');
      // Log user in and redirect to the member area.
        if($member != false && $member->verify_password($password)) {
          // Mark member as logged in
          $session->login($member);
          redirect_to(url_for('/members/index.php'));
        } 
    } else {
      // show errors
    }
  } else {
    $session->message('An account could not be made at this time. Please try again later.');
  }
} else {
  // display the form
  $member = new Member();
}

?>

<?php $page_title = 'Create Account'; ?>
<?php include(SHARED_PATH . '/captcha_header.php'); ?>
  <a class="back-link" href="<?= url_for('/index.php') ?>">&laquo; Back to List</a>

    <h1>Create a New Account</h1>

  <?= display_errors($member->errors)?>
  <form action="<?= url_for('/create_user.php') ?>" method="post">

    <?php include('members/form_fields.php'); ?>
    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
    <input type="submit" value="Create member">

  </form>

<?php include(SHARED_PATH . '/member_footer.php'); ?>
