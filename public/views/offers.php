<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers</title>
    <link rel="stylesheet" href="/public/css/offers.css">
    <link rel="stylesheet" href="/public/css/nav-bar.css">
    <script type="text/javascript" src="/public/js/search.js" defer></script>
</head>

<?php if (!empty($message)): ?>
    <div class="alert-message">
        <?php echo htmlspecialchars($message); ?>
    </div>
<?php endif; ?>

<body>

    <header>
        <img src="/public/images/logo.png" alt="logo">
        <nav>
            <ul>
                <li class="nav-link"><a href="addOffer">ADD OFFER</a></li>
                <li class="nav-link"><a href="offers">OFFERS</a></li>
                <li class="nav-link"><a href="account">ACCOUNT</a></li>
                <li class="nav-link"><a href="logout">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            
            <?php if (isset($offers) && is_array($offers) && count($offers) > 0): ?>
            <?php foreach ($offers as $offer) : ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card tutor-card">
                        <div class="card-body">
                            <p class="card-title"><?= $offer->getName(); ?> <?= $offer->getSurname(); ?><p>
                            <p class="card-text"><strong>Native Language:</strong> <?= $offer->getNativeLanguage(); ?></p>
                            <p class="card-text"><strong>Language:</strong> <?= $offer->getLanguage(); ?></p>
                            <p class="card-text"><strong>Description:</strong> <?= $offer->getDescription(); ?></p>
                            <p class="card-text"><strong>Price:</strong> <?= $offer->getPrice(); ?> $/h</p>
                            <p class="card-text"><strong>Minimum Level:</strong> <?= $offer->getMinLevel(); ?></p>
                            <p class="card-text"><strong>Likes:</strong> <?= $offer->getLike(); ?></p>
                            <p class="card-text"><strong>Dislikes:</strong> <?= $offer->getDislike(); ?></p>
                            <p class="card-text"><strong>Experience:</strong> <?= $offer->getExperience(); ?> years</p>

                            <form action="offers" method="post">
                                <input type="hidden" name="offer_id" value="<?= $offer->getId(); ?>">
                                <button type="submit" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <h2>You do not have permission to add offers.</h2>
            <?php endif; ?>
        </div>
    </div>


</body>

</html>

?>