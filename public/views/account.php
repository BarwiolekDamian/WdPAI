<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="/public/css/nav-bar.css">
    <link rel="stylesheet" href="/public/css/account.css">
    <link rel="shortcut icon" type="image/png" href="./public/images/logo.png">
</head>

<body>

    <?php include 'nav.php'; ?>

    <div class="container">
        <h2 class="mt-5">YOUR ACCOUNT:</h2>

        <?php if ($user !== null) : ?>
            <div class="offer-card">
                <p class="card-text"><strong>Name:</strong> <?= $user->getName(); ?></p>
                <p class="card-text"><strong>Surname:</strong> <?= $user->getSurname(); ?></p>
                <p class="card-text"><strong>Phone:</strong> <?= $user->getPhone(); ?></p>
                <p class="card-text"><strong>Email:</strong> <?= $user->getEmail(); ?></p>
                <p class="card-text"><strong>Balance:</strong> <?= $user->getBalance(); ?> $</p>
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
                    <input type="number" id="phone" name="phone" min="0" value="<?= $user->getPhone(); ?>"><br>

                    <label for="balance">Balance [$]:</label>
                    <input type="number" id="balance" name="balance" value="<?= $user->getBalance(); ?>" min="0"><br>

                    <label for="lecturer">Lecturer:</label>
                    <select id="lecturer" name="lecturer">
                        <option value="Yes" <?= $user->getLecturer() == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                        <option value="No" <?= $user->getLecturer() == 'No' ? 'selected' : ''; ?>>No</option>
                    </select><br>

                    <input type="submit" value="Save">
                </form>
            </div>
        <?php else : ?>
            <p>No data found</p>
        <?php endif; ?>
    </div>

</body>

</html>