<?php

$message = "";
$status = "";
$action = "";
$empId = "";

// View Employee Details

if (isset($_GET['action']) && $_GET['empId']) {
  global $wpdb;
  if ($_GET['action'] == "edit") {
    $action = "edit";
    $empId = $_GET['empId'];
  }
  if ($_GET['action'] == "view") {
    $action = "view";
    $empId = $_GET['empId'];
  }

  // single employee information
  $employee = $wpdb->get_row(
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ems_form_data WHERE id = %d", $empId),
    ARRAY_A
  );
}

// Save Employee Details
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn-submit'])) {
  global $wpdb;
  $name = sanitize_text_field($_POST['name']);
  $email = sanitize_text_field($_POST['email']);
  $phone_no = sanitize_text_field($_POST['phone_no']);
  $gender = sanitize_text_field($_POST['gender']);
  $designation = sanitize_text_field($_POST['designation']);

  $wpdb->insert("{$wpdb->prefix}ems_form_data", array(
    'name' => $name,
    'email' => $email,
    'phone_no' => $phone_no,
    'gender' => $gender,
    'designation' => $designation
  ));
  $last_inserted_id = $wpdb->insert_id;
  if ($last_inserted_id) {
    $message = "Employee Data inserted successfully";
    $status = "success";
  } else {
    $message = "Failed to inserting Employee Data";
    $status = "error";
  }
}
?>
<div class="container">
<div class="row">
  <div class="col-sm-8">
    <h2><?php if($action == "view"){echo "View Employee";}
    else if($action == "edit"){echo "Edit Employee";}
    else{echo "Add Employee";}?></h2>
    <!-- <img src="<?php echo EMS_PLUGIN_URL ?>images/mobile.jpg" style="width: 80px; "/> -->
    <div class="panel panel-primary">
      <div class="panel-heading"><?php if($action == "view"){echo "View Employee";}
    else if($action == "edit"){echo "Edit Employee";}
    else{echo "Add Employee";}?></div>
      <div class="panel-body">
        <?php if (!empty($message)) {
          if ($status == 1) {
            echo '<div class="alert alert-success">' . $message . '</div>';
          } else {
            echo '<div class="alert alert-danger">' . $message . '</div>';
          }
        } ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?page=employee-system" method="POST"
          id="ems-frm-add-employee">
          <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name"
              value="<?php echo htmlspecialchars($employee['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
              <?php if (isset($action) && $action == "view") {echo 'disabled';} ?> required>
          </div>

          <br>
          <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
              value="<?php echo htmlspecialchars($employee['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
              <?php if (isset($action) && $action == "view") {echo 'disabled';} ?> required>
          </div>
          <br>
          <div class="mb-3 mt-3">
            <label for="phone_no">Phone No:</label>
            <input type="text" class="form-control" id="phone_no" placeholder="Enter Phone No" name="phone_no"
              value="<?php echo htmlspecialchars($employee['phone_no'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
              <?php if (isset($action) && $action == "view") {echo 'disabled';} ?> required>
          </div>
          <br>
          <div class="mb-3 mt-3">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" <?php if (isset($action) && $action == "view") {echo 'disabled';} ?> required>
              <option value="">Select Gender</option>
              <option value="male" <?php if (isset($employee['gender']) && $employee['gender'] == "male") {echo 'selected';} ?>>Male</option>
              <option value="female" <?php if (isset($employee['gender']) && $employee['gender'] == "female") {echo 'selected';} ?>>Female</option>
              <option value="other" <?php if (isset($employee['gender']) && $employee['gender'] == "other") {echo 'selected';} ?>>Other</option>
            </select>
          </div>
          <br>
          <div class="mb-3 mt-3">
            <label for="designation">Designation:</label>
            <input type="text" class="form-control" id="designation" placeholder="Enter Designation"
              name="designation" value="<?php echo htmlspecialchars($employee['designation'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
              <?php if (isset($action) && $action == "view") {echo 'disabled';} ?> required>
          </div>
          <br>
          <div class="mb-3 mt-3">

          <?php 
          if($action == "view"){
            
          }
         else if($action == "edit"){
          echo '<button type="submit" name="btn-submit" class="btn btn-primary" <?php if (isset($action) && $action == "view") {echo "disabled";} ?>Edit</button>';
         }
        else{
          echo '<button type="submit" name="btn-submit" class="btn btn-primary" <?php if (isset($action) && $action == "view") {echo "disabled";} ?>Submit</button>';
        }?>
            
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>
