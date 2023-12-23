<?php
session_start();
include "database/account_class.php";

// initializing variables
$username = "";
$email = "";
$errors = array();

$account = new account();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // check empty fields
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // check database for existing user
  $user = $account->checkRegisterUser($email, $password_1);

  if ($user) { // if user exists
    if ($user['Name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    // $password = md5($password_1);

    $account->registerUser($username, $email, $password_1);
    $_SESSION['Name'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}


if (isset($_POST['login_user'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];

  if (empty($username)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    // $password = md5($password);
    $result = $account->checkLoginUser($username, $password);
    if ($result == 1) {
      $_SESSION['email'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>