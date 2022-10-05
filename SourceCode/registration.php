<?php require_once 'dbh.classes.php';
include 'class_reg.php'; ?>
<?php

$register = new Register();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $register->reg(
        $_POST["email"],
        $_POST["name"],
        $_POST["pass"],
        $_POST["conpass"],
        $_POST["phone"]
    );
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            background-color: #FAFAFA;


        }

        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }

        a {
            text-decoration: none;
        }

        .container {
            margin-right: 40px;
            margin-left: auto;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>




    <section class="text-center text-lg-start">



        <div class="container  ">

            <div class="BackToHome"><a href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg><a></div>
            <div class="row mt-5">
                <div class="col-10 mb-5 ">
                    <div class="card  ">
                        <div class="card-body  shadow-5 ms-5">
                            <h1 class="fw-bold mb-5">Sign up </h1>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                <span class="error">
                                    <?php
                                    if (isset($register->emailErr3)) {
                                        echo  $register->emailErr3;
                                    }
                                    ?>
                                </span>

                                <!-- Email input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example3">Email address </label>
                                    <input type="email" id="email" name="email" class="form-control">
                                    <div id="email-error" class="error"></div>
                                    <span class="error">
                                        <?php
                                        if (isset($register->emailErr)) {
                                            echo  $register->emailErr;
                                        }
                                        ?>
                                    </span>
                                </div>

                                <!-- Number Phone input -->
                                <div class="form-outline  ">
                                    <label class="form-label" for="form3Example1">Mobile Phone </label>
                                    <input type="tel" id="phone" name="phone" class="form-control">
                                    <div id="phone-error" class="error"></div>
                                    <span class="error">
                                        <?php
                                        if (isset($register->phoneErr)) {
                                            echo $register->phoneErr;
                                        }
                                        ?>
                                    </span>
                                </div>


                                <!-- Name input -->
                                <div class="form-outline ">
                                    <label class="form-label" for="form3Example1">First Name </label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    <div id="nameErr" class="error"></div>
                                    <span class="error">
                                        <?php
                                        if (isset($register->nameErr)) {
                                            echo $register->nameErr;
                                        }
                                        ?>
                                    </span>
                                </div>






                                <!-- Password input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <input type="password" id="pass" name="pass" class="form-control">
                                    <div id="password-error" class="error"></div>
                                    <span class="error">
                                        <?php
                                        if (isset($register->passwordErr)) {
                                            echo $register->passwordErr;
                                        }
                                        ?>
                                    </span>
                                </div>
                                <!-- Password input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example4">Confirm Password</label>
                                    <input type="password" id=" conpass" name="conpass" class="form-control">
                                    <div id="confirm-password-error" class="error"></div>
                                    <span class="error">
                                        <?php
                                        if (isset($register->passwordConfirmErr)) {
                                            echo $register->passwordConfirmErr;
                                        }
                                        ?>
                                    </span>
                                    <span class="error">
                                        <?php
                                        if (isset($register->msg)) {
                                            echo $register->msg;
                                        }
                                        ?>
                                    </span>
                                </div>




                                <!-- Submit button -->
                                <button type="submit" class="btn btn-dark btn-block mt-3">
                                    Sign up
                                </button>
                                <br>
                                <br>
                                <p>Already have an account? <a href="./Login_form.php" class=" w-100 fw-bold btn2 "> Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-5 mb-lg-0">
                    <img src="image.jpg" style="height: 820px;" class="w-400 rounded-4 shadow-4 mb-3" alt="">
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
</body>

</html>