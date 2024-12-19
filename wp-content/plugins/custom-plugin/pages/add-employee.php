
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h2>Add Employee</h2>
  <div class="panel panel-primary">
    <div class="panel-heading">Add Employee</div>
    <div class="panel-body">
    <form action="/action_page.php">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone_no">Phone No:</label>
      <input type="text" class="form-control" id="phone_no" placeholder="Enter Phone No" name="phone_no">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone_no">Gender:</label>
     <label for="male">Male <input type="radio" class="form-control" id="male" value="male" name="gender"></label>
      <label for="female">Female <input type="radio" class="form-control" id="female" value="female" name="gender"></label>
    </div>
    <div class="mb-3 mt-3">
      <label for="designation">Designation:</label>
      <input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation">
    </div>
    
    <div class="mb-3 mt-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


    </div>
  </div>
</div>

</body>
</html>

