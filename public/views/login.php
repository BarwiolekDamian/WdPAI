<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DialectDo - Login Page</title>
    <link rel="stylesheet" href="/public/css/login.css">
</head>

<body>
    <div class="form-container">
        <div class="form-box">
            <h2 class="form-title">Login</h2>

            <form id="login-form" action="login" method="POST">
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
                    <input type="text" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>

            <div class="register-redirect">
                Not a member? <a href="register">Register Now</a>
            </div>
        </div>
    </div>
</body>

</html>