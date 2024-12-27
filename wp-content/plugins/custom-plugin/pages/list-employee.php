<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

</head>

<body>

  <div class="container mt-3">
    <div class="row">
      <div class="col-md-8">
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
                <th>Designation</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Jhon</td>
                <td>july@example.com</td>
                <td>Male</td>
                <td>PHP Developer</td>
                <td>
                  <a href="javascript:void(0)" class="btn btn-warning">Edit</a>
                  <a href="javascript:void(0)" class="btn btn-danger">Delete</a>
                  <a href="javascript:void(0)" class="btn btn-info">View</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

  <script>
    $(function () {
      new DataTable('#tbl-employee');
    })
  </script>

</body>

</html>