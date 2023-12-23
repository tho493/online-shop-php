<?php
include "session.php";
include "../database/account_class.php";
$user_id = $_REQUEST['user_id'];

$account = new account();

$account->setUser_id($user_id);
$result = $account->getAccount();

if (isset($_POST['btn_save'])) {

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $user_password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];

  $account->setValues($first_name, $last_name, $email, $user_password, $mobile, $address1, $address2);
  $account->updateAccount();

  header("location: manageuser.php");
  mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h5 class="title">Edit User</h5>
        </div>
        <form action="edituser.php" name="form" method="post" enctype="multipart/form-data">
          <div class="card-body">

            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" disabled />
            <div class="col-md-12 ">
              <div class="form-group">
                <label>First name</label>
                <input type="text" id="first_name" name="first_name" class="form-control"
                  value="<?php echo $result['first_name']; ?>">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" id="last_name" name="last_name" class="form-control"
                  value="<?php echo $result['last_name']; ?>">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" id="email" name="email" class="form-control"
                  value="<?php echo $result['email']; ?>">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input type="number" id="mobile" name="mobile" class="form-control"
                  value="<?php echo $result['mobile']; ?>">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" id="password" class="form-control"
                  value="<?php echo $result['password']; ?>">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address1" id="address" class="form-control"
                  value="<?php echo $result['address1']; ?>">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label>City</label>
                <input type="text" name="address2" id="address2" class="form-control"
                  value="<?php echo $result['address2']; ?>">
              </div>
            </div>

          </div>
          <div class="card-footer">
            <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>


  </div>
</div>
<?php
include "footer.php";
?>