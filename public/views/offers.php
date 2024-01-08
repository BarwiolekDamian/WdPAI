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

<body>

    <header>
        <img src="/public/images/logo.png" alt="logo">
        <nav>
            <ul>
                <li><a href="offers">Offers</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="index"> SIGN IN</a></li>
                <li><a href="register">REGISTER NOW</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            
            <?php foreach ($offers as $offer) : ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card tutor-card">
                        <div class="card-body">
                            <h5 class="card-title">Tutoring Offer</h5>
                            <p class="card-text"><strong>Native Language:</strong> <?= $offer->getNativeLanguage(); ?></p>
                            <p class="card-text"><strong>Language:</strong> <?= $offer->getLanguage(); ?></p>
                            <p class="card-text"><strong>Description:</strong> <?= $offer->getDescription(); ?></p>
                            <p class="card-text"><strong>Price:</strong> <?= $offer->getPrice(); ?> $/h</p>
                            <p class="card-text"><strong>Minimum Level:</strong> <?= $offer->getMinLevel(); ?></p>
                            <p class="card-text"><strong>Likes:</strong> <?= $offer->getLike(); ?></p>
                            <p class="card-text"><strong>Dislikes:</strong> <?= $offer->getDislike(); ?></p>
                            <p class="card-text"><strong>Experience:</strong> <?= $offer->getExperience(); ?> years</p>
                            <button class="btn btn-primary">Buy</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>

?>