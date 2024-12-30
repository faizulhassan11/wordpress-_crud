<?php 
  global $wpdb;
  $table_name = $wpdb->prefix . "ems_form_data";
  $employees = $wpdb->get_results("SELECT * FROM $table_name",ARRAY_A);

  // print_r($employees);
?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-10">
        <h2>List Employees</h2>

        <div class="panel-heading">List Employee</div>
        <div class="panel-body">
          <table class="table table-dark table-striped" id="tbl-employee">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone No</th>
                <th>Designation</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(count($employees)>0){
                foreach($employees as $employee){
               ?>
              <tr>
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td><?php echo $employee['gender']; ?></td>
                <td><?php echo $employee['phone_no']; ?></td>
                <td><?php echo $employee['designation']; ?></td>
                <td>
                  <a href="admin.php?page=employee-system&action=edit&empId=<?php echo $employee['id']?>" class="btn btn-warning">Edit</a>
                  <a href="admin.php?page=ems-list-employee&action=delete&empId=<?php echo $employee['id']?>" class="btn btn-danger">Delete</a>
                  <a href="admin.php?page=employee-system&action=view&empId=<?php echo $employee['id']?>" class="btn btn-info">View</a>
                </td>
              </tr>
              <?php 
              }}
              ?>
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
