<?php include "includes/admin_header.php";  ?>

<?php  

if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];

  $query = "SELECT * FROM users WHERE user_name = '$username' ";
  $select_user_profile = mysqli_query($connection,$query);

  if(!$select_user_profile){
    die("query failed " . mysqli_error($connection));
  }

  while($row = mysqli_fetch_array($select_user_profile)){
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  }
}

 ?>

    <div id="wrapper">

        <!-- Navigation -->
 <?php include 'includes/admin_navigation.php'; ?>

<?php
    if(isset($_POST['edit_user'])){

      $user_firstname = ($_POST['user_firstname']);
      $user_lastname = ($_POST['user_lastname']);
      $user_role = ($_POST['user_role']);
      $user_name = ($_POST['user_name']);
      $user_email = ($_POST['user_email']);
      $user_password = ($_POST['user_password']);  

      $query = "UPDATE USERS SET ";
           
      $query .= "user_name = '$user_name', "; 
      $query .= "user_firstname = '$user_firstname', "; 
      $query .= "user_lastname = '$user_lastname', "; 
      $query .= "user_email = '$user_email', "; 
      $query .= "user_password = '$user_password', "; 
      $query .= "user_role = '$user_role' "; 
      $query .= "WHERE user_id = $user_id"; 

           
      $update_user_query = mysqli_query($connection, $query);  
        
      confirm($update_user_query); 
  }

?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

<form action="" method="post" enctype="multipart/form-data">

      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
      </div>

       <div class="form-group">
         <label for="post_status">Lastname</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
      </div>
     
     
         <div class="form-group">
       
       <select name="user_role" id="" >
        <option value="subscriber"><?php echo $user_role ?></option>

        <?php
        if($user_role == "admin"){
           echo "<option value='subscriber'>subscriber</option>";
        }
        if($user_role == "subscriber"){
            echo "<option value='admin'>admin</option>";
        }
        ?>
        
       </select>
      </div>
      
<!--
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
-->

      <div class="form-group">
         <label for="post_tags">Username</label>
          <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
      </div>
      
      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>>
      </div>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update profile">
      </div>

</form>
    

                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php";  ?>
