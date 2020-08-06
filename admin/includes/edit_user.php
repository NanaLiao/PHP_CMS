<?php

    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];

        $query ="SELECT * FROM users WHERE user_id = $the_user_id";
        $user_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($user_query)){
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_name = $row['user_name'];
            $user_role = $row['user_role'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
        }
    }

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
        $query .= "WHERE user_id = $the_user_id"; 

             
        $update_user_query = mysqli_query($connection, $query);  
          
        confirm($update_user_query); 


    }
?>



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
          <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
      </div>

</form>
    