<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/register.css">
    <title>DialectDo - Registration Page</title>
    <link rel="shortcut icon" type="image/png" href="./public/images/logo.png">
</head>

<body>

    <div class="form-container">
        <div class="form-box">
            <h2 class="form-title">REGISTER</h2>

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
                    <input type="number" min="0" id="phone" name="phone" placeholder="Phone" required>
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

    <script>
        const form = document.querySelector("form");
        const emailInput = form.querySelector('input[name="email"]');
        const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');

        function isEmail(email)
        {
            return /\S+@\S+\.\S+/.test(email);
        }

        function arePasswordsSame(password, confirmedPassword)
        {
            return password === confirmedPassword;
        }

        function markValidation(element, condition)
        {
            !condition 
                ? element.classList.add('no-valid')
                : element.classList.remove('no-valid');
        }

        function validateEmail()
        {
            setTimeout(function ()
            {
                markValidation(emailInput, isEmail(emailInput.value));
            }, 1000);
        }

        function validatePassword()
        {
            setTimeout(function ()
            {
                    const condition = arePasswordsSame
                    (
                        confirmedPasswordInput.previousElementSibling.value,
                        confirmedPasswordInput.value
                    );
                    
                    markValidation(confirmedPasswordInput, condition);
                }, 1000);
        }

        emailInput.addEventListener('keyup', validateEmail);
        confirmedPasswordInput.addEventListener('keyup', validatePassword);
    </script>

</body>

</html>