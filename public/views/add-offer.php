<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offer</title>
    <link rel="stylesheet" href="/public/css/add-offer.css">
    <link rel="stylesheet" href="/public/css/nav-bar.css">
</head>

<body>

    <header>
        <img src="/public/images/my_logo.png" alt="logo">
        <nav>
        <ul>
                <li class="nav-link"><a href="addOffer">ADD OFFER</a></li>
                <li class="nav-link"><a href="offers">OFFERS</a></li>
                <li class="nav-link"><a href="contact">CONTACT</a></li>
                <li class="nav-link"><a href="logout">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2 class="mt-5">ADD YOUR OFFER</h2>
        
        <form action="addOffer" method="POST">
            <div class="form-group">
                <label for="nativeLanguage">Native Language</label>
                <input type="text" class="form-control" id="nativeLanguage" name="native_language" required>
            </div>
            <div class="form-group">
                <label for="language">Language of the offer</label>
                <input type="text" class="form-control" id="language" name="language" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price [$/h]</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="minimumLevel">Minimum language level</label>
                <input type="text" class="form-control" id="minimumLevel" name="min_level" required>
            </div>
            <div class="form-group">
                <label for="experience">Experience [years]</label>
                <input type="number" class="form-control" id="experience" name="experience" required>
            </div>
            <button type="submit" class="custom-btn">Add</button>
        </form>
    </div>

</body>

</html>