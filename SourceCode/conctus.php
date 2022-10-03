<!DOCTYPE html>
<html lang="en">

<?php include "./lib/Databaseconfig.php"; ?>

<head>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!--== Google Fonts ==-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" />

  <!--=== Bootstrap CSS ===-->
  <link href="assets/css/vendor/bootstrap.min.css" rel="stylesheet">
  <!--=== Font-Awesome CSS ===-->
  <link href="assets/css/vendor/font-awesome.css" rel="stylesheet">
  <!--=== Plugins CSS ===-->
  <link href="assets/css/plugins.css" rel="stylesheet">
  <!--=== Main Style CSS ===-->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Modernizer JS -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>






  <style>
    :root {
      --primary-color: #010712;
      --secondary-color: #818386;
      --bg-color: #FCFDFD;
      --button-color: #3B3636;
      --h1-color: #3F444C;
    }

    [data-theme="dark"] {
      --primary-color: #FCFDFD;
      --secondary-color: #818386;
      --bg-color: #010712;
      --button-color: #818386;
      --h1-color: #FCFDFD;
    }

    * {
      margin: 0;
      box-sizing: border-box;
      transition: all 0.3s ease-in-out;
    }

    .contact-container {
      display: flex;
      width: 100vw;
      height: 100vh;
      background: var(--bg-color);
    }

    .left-col {
      width: 45vw;
      height: 100%;
      background-image: url("https://sc04.alicdn.com/kf/H30c93eeaf5da4f00b63dcf3d0115fd2bO/257573663/H30c93eeaf5da4f00b63dcf3d0115fd2bO.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .logo {
      width: 10rem;
      padding: 1.5rem;
    }

    .right-col {
      background: var(--bg-color);
      width: 50vw;
      height: 100vh;
      padding: 5rem 3.5rem;
    }

    h1,
    label,
    button,
    .description {
      font-family: 'Jost', sans-serif;
      font-weight: 400;
      letter-spacing: 0.1rem;
    }

    h1 {
      color: var(--h1-color);
      text-transform: uppercase;
      font-size: 2.5rem;
      letter-spacing: 0.5rem;
      font-weight: 300;
    }

    p {
      color: var(--secondary-color);
      font-size: 0.9rem;
      letter-spacing: 0.01rem;
      width: 40vw;
      margin: 0.25rem 0;
    }

    label,
    .description {
      color: var(--secondary-color);
      text-transform: uppercase;
      font-size: 0.625rem;
    }

    form {
      width: 31.25rem;
      position: relative;
      margin-top: 2rem;
      padding: 1rem 0;
    }

    input,
    textarea,
    label {
      width: 40vw;
      display: block;
    }

    p,
    placeholder,
    input,
    textarea {
      font-family: 'Helvetica Neue', sans-serif;
    }

    input::placeholder,
    textarea::placeholder {
      color: var(--primary-color);
    }

    input,
    textarea {
      color: var(--primary-color);
      font-weight: 500;
      background: var(--bg-color);
      border: none;
      border-bottom: 1px solid var(--secondary-color);
      padding: 0.5rem 0;
      margin-bottom: 1rem;
      outline: none;
    }

    textarea {
      resize: none;
    }

    button {
      text-transform: uppercase;
      font-weight: 300;
      background: var(--button-color);
      color: var(--bg-color);
      width: 10rem;
      height: 2.25rem;
      border: none;
      border-radius: 2px;
      outline: none;
      cursor: pointer;
    }

    input:hover,
    textarea:hover,
    button:hover {
      opacity: 0.5;
    }

    button:active {
      opacity: 0.8;
    }

    /* Toggle Switch */

    .theme-switch-wrapper {
      display: flex;
      align-items: center;
      text-align: center;
      width: 160px;
      position: absolute;
      top: 0.5rem;
      right: 0;
    }

    .description {
      margin-left: 1.25rem;
    }

    .theme-switch {
      display: inline-block;
      height: 34px;
      position: relative;
      width: 60px;
    }

    .theme-switch input {
      display: none;
    }

    .slider {
      background-color: #ccc;
      bottom: 0;
      cursor: pointer;
      left: 0;
      position: absolute;
      right: 0;
      top: 0;
      transition: .4s;
    }

    .slider:before {
      background-color: #fff;
      bottom: 0.25rem;
      content: "";
      width: 26px;
      height: 26px;
      left: 0.25rem;
      position: absolute;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: var(--button-color);
    }

    input:checked+.slider:before {
      transform: translateX(26px);
    }

    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    #error,
    #success-msg {
      width: 40vw;
      margin: 0.125rem 0;
      font-size: 0.75rem;
      text-transform: uppercase;
      font-family: 'Jost';
      color: var(--secondary-color);
    }


    #success-msg {
      transition-delay: 3s;
    }

    @media only screen and (max-width: 950px) {
      .logo {
        width: 8rem;
      }

      h1 {
        font-size: 1.75rem;
      }

      p {
        font-size: 0.7rem;
      }

      input,
      textarea,
      button {
        font-size: 0.65rem;
      }

      .description {
        font-size: 0.3rem;
        margin-left: 0.4rem;
      }

      button {
        width: 7rem;
      }

      .theme-switch-wrapper {
        width: 120px;
      }

      .theme-switch {
        height: 28px;
        width: 50px;
      }

      .theme-switch input {
        display: none;
      }

      .slider:before {
        background-color: #fff;
        bottom: 0.25rem;
        content: "";
        width: 20px;
        height: 20px;
        left: 0.25rem;
        position: absolute;
        transition: .4s;
      }

      input:checked+.slider:before {
        transform: translateX(16px);
      }

      .slider.round {
        border-radius: 15px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

    }
  </style>
</head>

<body>



  <!--== Header Area Start ==-->
  <header id="header-area">
    <div class="ruby-container">
      <div class="row">
        <!-- Logo Area Start -->
        <div class="col-3 col-lg-1 col-xl-2 m-auto">
          <a href="./index.php" class="logo-area">
            <img src="admin/upload/Logo.png" alt="Logo" style="width:200px;height:50p" class="img-fluid" />
          </a>
        </div>
        <!-- Logo Area End -->

        <!-- Navigation Area Start -->
        <div class="col-3 col-lg-9 col-xl-8 m-auto">
          <div class="main-menu-wrap">
            <nav id="mainmenu">
              <ul>
                <li><a href="index.php">Home</a> </li>
                <li><a href="./all.php">Shop</a></li>
                <li><a href="./Login_form.php">Log in</a></li>
                <li><a href="./SignUp.php">Sign Up</a></li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- Navigation Area End -->

      </div>
    </div>
  </header>
  <!--== Header Area End ==-->






  <div class="contact-container">
    <div class="left-col">

    </div>
    <div class="right-col">
      <div class="theme-switch-wrapper">
      </div>

      <h1>Contact us</h1>
      <p>please feel free to contact us for any further clarification.</p>

      <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Full name</label>
        <input type="text" id="name" name="name" placeholder="Your Full Name" required>
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Your Email Address" required>
        <label for="message">Message</label>
        <textarea rows="6" placeholder="Your Message" id="message" name="message" required></textarea>
        <!--<a href="javascript:void(0)">--><button type="submit" id="submit" name="submit">Send</button>
        <!--</a>-->

      </form>
      <div id="error"></div>
      <div id="success-msg"></div>
    </div>
  </div>

<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email=$_POST['email'];
  $name=$_POST['name'];
  $message=$_POST['message'];
      
  try {
  
      $addData="INSERT INTO contact_us (full_name,email_address,message) 
      VALUES('$name','$email','$message')";
      $conn->query($addData);
      header("Location:./Login_form.php");
  
  } catch (\Throwable $th) {
  
     echo "Please try again";
  }
}


?>


</body>

</html>