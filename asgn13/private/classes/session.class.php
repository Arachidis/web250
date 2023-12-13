<?php 

class Session {

  private $member_id;
  private $member_level;
  public $username;
  private $last_login;

  public const MAX_LOGIN_AGE = 60*60*24;

  public function __construct() {
    session_start(); 
    $this->check_stored_login();
  }

  public function login($member) {
    if($member) {
      // Prevents session fixation attacks.
      session_regenerate_id();
      $_SESSION['member_id'] = $member->id;
      $_SESSION['member_level'] = $member->user_level;
      $this->member_id = $member->id;
      $this->member_level = $member->user_level;

      $this->username =$_SESSION['username'] = $member->username;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function is_logged_in() {
    //return isset($this->member_id);
    return isset($this->member_id) && $this->last_login_is_recent();
  }

  public function logged_in_level($dir) {
    //
    if ($this->is_logged_in()) {
      $this->member_level = $_SESSION['member_level'];
      if ($this->member_level != "") {
        foreach (Member::USER_LEVEL[$this->member_level] as $lvl) {
          if (strpos($dir, $lvl) !== false) {
            return true;
          }
      }
      }
      return false;
    }
  }

  public function logout() {
    unset($_SESSION['member_id']);
    unset($_SESSION['username']);
    unset($_SESSION['member_level']);
    unset($_SESSION['last_login']);
    unset($this->member_id);
    unset($this->member_level);
    unset($this->username);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login() {
    if (isset($_SESSION['member_id'])) {
      $this->member_id = $_SESSION['member_id'];
      $this->username = $_SESSION['username'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    }
    elseif($this->last_login + self::MAX_LOGIN_AGE < time()) {
      return false;
    }
    return true;
  }

  public function message($msg="") {
    if(!empty($msg)) {
      // The this is a "set" message.
      $_SESSION['message'] = $msg;
      return true;
    }
    else {
      // Then this is a "get" message.
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message() {
    unset($_SESSION['message']);
  }

 }

?>