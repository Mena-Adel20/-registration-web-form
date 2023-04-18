<?php require_once('header.php'); ?>

<h1>Register</h1>

<?php if (isset($error)) { ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style\styleWep.css">
    <script defer src="scripts\API_Ops.js"></script>
  </head>
  <body>
  <div class="form-container">
      <form action="DB_Ops.php" method="POST" enctype="multipart/form-data" id="form" onsubmit="return validateInputs()">
       <h1>Registration Form</h1>
       <div class="input-control">
       <input type="text" id="fullname" name="full_name" placeholder="enter full name"  class="box" >
                <div class="error"></div>
        </div>
        <div class="input-control">
        <input type="text" id="username" name="user_name" placeholder="enter user name" class="box" >
                <div class="error"></div>
        </div>
        <div class="input-control">
        <input type="email" id="email" name="email" placeholder="enter email" class="box" >
                <div class="error"></div>
        </div>
        <div class="input-control">
        <input type="password" id="password" name="password" placeholder="enter password" class="box" >
                <div class="error"></div>
        </div>
        <div class="input-control">
        <input type="password"  id="password2" name="confirm_password" placeholder="confirm password" class="box" >
                <div class="error"></div>
        </div>
        <div class="input-control">
        <input type="date" name="birthdate"  class="box" id="birthdate" >
                <div class="error"></div>
        </div>
        <button onclick="getActors()" type = "button">Get Actors</button>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script.js"></script>
       
        <div class="input-control">
        <input type="tel" id="phone" name="phone" placeholder="enter phone" class="box" >
                <div class="error"></div>
        </div>
        <div class="input-control">
        <textarea name="address" id="address" placeholder="enter address" class="box" ></textarea>
                <div class="error"></div>
        </div>
        <div class="input-control">
        <input type="file"  id="file" name="user_image"  accept="image/*"  class="box" >
                <div class="error"></div>
        </div>

        <button type="submit" name="submit" class="btn">Register</button>
      </form>
      
    </div>
    <div class="actorscontainer">
    <ul id="actors" ></ul>
    </div>

  </body>
</html>

<?php require_once('footer.php'); ?>


       

