document.addEventListener("DOMContentLoaded", function()
{
    const form = document.getElementById("registration-form");
    const emailInput = form.querySelector('input[name="email"]');
    const passwordInput = form.querySelector('input[name="password"]');
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
        markValidation(emailInput, isEmail(emailInput.value));
    }

    function validatePassword()
    {
        const condition = arePasswordsSame(passwordInput.value, confirmedPasswordInput.value);
        markValidation(confirmedPasswordInput, condition);
    }

    emailInput.addEventListener('input', validateEmail);
    passwordInput.addEventListener('input', validatePassword);
    confirmedPasswordInput.addEventListener('input', validatePassword);
});