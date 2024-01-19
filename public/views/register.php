<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/register.css">
    <!-- <script type="text/javascript" src="./public/js/script.js" defer></script> -->
    <title>DialectDo - Registration Page</title>
</head>

<body>
    <div class="form-container">
        <div class="form-box">
            <h2 class="form-title">Register</h2>

            <form id="registration-form" action="register" method="POST">
                <div class="messages">
                    <?php
                        if (isset($messages))
                        {
                            foreach ($messages as $message)
                            {
                                echo $message;
                            }
                        }
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="text" id="surname" name="surname" placeholder="Surname" required>
                </div>
                <div class="form-group">
                    <input type="text" id="phone" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" id="confirmedPassword" name="confirmedPassword" placeholder="Repeat Password" required>
                </div>
                <button type="submit" class="submit-btn">Register</button>
            </form>

            <div class="login-redirect">
                Already a member? <a href="login">Log In</a>
            </div>
        </div>
    </div>
</body>

</html>