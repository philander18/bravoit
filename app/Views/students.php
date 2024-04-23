
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <?php if (!empty($message) && isset($message)): ?>
               <?php echo $message; ?>
            <?php endif; ?>
            <br>
            <a class="btn btn-success" href="<?php echo site_url('students/newstudent'); ?>">New User</a>
            <h1>All Students</h1>
            <table class="table">
               <th>ID</th>
               <th>Name</th>
               <th>Subject</th>
               <th>Date</th>
               <th>Edit</th>
               <th>Delete</th>
               
            </table>
         </div>
      </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js')?>"><</script>
</body>
</html>