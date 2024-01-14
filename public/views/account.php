<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="/public/css/nav-bar.css">
    <link rel="stylesheet" href="/public/css/account.css">
</head>

<body>

    <header>
        <img src="/public/images/my_logo.png" alt="logo">
        <nav>
            <ul>
                <li class="nav-link"><a href="addOffer">ADD OFFER</a></li>
                <li class="nav-link"><a href="offers">OFFERS</a></li>
                <li class="nav-link"><a href="contact">CONTACT</a></li>
                <li class="nav-link"><a href="account">ACCOUNT</a></li>
                <li class="nav-link"><a href="logout">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2 class="mt-5">YOUR ACCOUNT</h2>

        <?php if ($user !== null) : ?>
            <div class="offer-card">
                <p class="card-text"><strong>Name:</strong> <?= $user->getName(); ?></p>
                <p class="card-text"><strong>Surname:</strong> <?= $user->getSurname(); ?></p>
                <p class="card-text"><strong>Phone:</strong> <?= $user->getPhone(); ?></p>
                <p class="card-text"><strong>Email:</strong> <?= $user->getEmail(); ?></p>
                <p class="card-text"><strong>Balance:</strong> <?= $user->getBalance(); ?></p>
                <p class="card-text"><strong>Lecturer:</strong> <?= $user->getLecturer(); ?></p>
            </div>
            
            <div class="edit-form">
                <h3>Edit Account Information</h3>
                <form action="account" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?= $user->getName(); ?>"><br>

                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" value="<?= $user->getSurname(); ?>"><br>

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?= $user->getEmail(); ?>" readonly><br>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?= $user->getPhone(); ?>"><br>

                    <label for="balance">Balance:</label>
                    <input type="text" id="balance" name="balance" value="<?= $user->getBalance(); ?>"><br>

                    <label for="lecturer">Lecturer:</label>
                    <input type="text" id="lecturer" name="lecturer" value="<?= $user->getLecturer(); ?>"><br>

                    <input type="submit" value="Save">
                </form>
            </div>
        <?php else : ?>
            <p>NO DATA FOUND</p>
        <?php endif; ?>
    </div>

</body>

</html>