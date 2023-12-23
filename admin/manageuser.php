<?php
include "session.php";
include "../database/account_class.php";
$account = new account();

// die($_GET["user_id"] . " " . $_GET["action"]);
if (!empty($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $user_id = $_GET['user_id'];

  $account->setUser_id($user_id);
  $account->deleteAccount();
  header('Location: manageuser.php');
}

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Quản lý người dùng</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table tablesorter table-hover" id="">
              <thead class=" text-primary">
                <tr>
                  <th>Email</th>
                  <th>Password</th>
                  <th><a href="adduser.php" class="btn btn-success">Add New</a></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $account->getAllAccounts();

                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['email'] ?>
                    </td>
                    <td>
                      <?php echo $row['password'] ?>
                    </td>

                    <td>
                      <a href='edituser.php?user_id=<?php echo $row['user_id'] ?>' type='button' rel=' tooltip' title=''
                        class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                        <i class='material-icons'>edit</i>
                        <div class='ripple-container'></div>
                      </a>
                      <a href='manageuser.php?user_id=<?php echo $row['user_id'] ?>&action=delete' type='button'
                        rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                        <i class='material-icons'>close</i>
                        <div class='ripple-container'></div>
                      </a>
                    </td>
                  </tr>
                <?php }
                ?>
              </tbody>
            </table>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
include "footer.php";
?>