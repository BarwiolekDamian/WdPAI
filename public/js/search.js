const search = document.querySelector('input[placeholder="Search"]');
const rowContainer = document.querySelector(".container.mt-4 > .row");

search.addEventListener("keyup", function (event)
{
    if (event.key === "Enter")
    {
        event.preventDefault();
        const data = { search: this.value };

        fetch("/search",
        {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(offers =>
            {
                rowContainer.innerHTML = ""; // Clear Current Offers
                loadOffers(offers);
            })
            .catch(error =>
            {
                console.error('Error:', error);
            });
    }
});

function loadOffers(offers)
{
    offers.forEach(offer =>
    {
        const offerElement = createOffer(offer);
        rowContainer.appendChild(offerElement);
    });
}

function createOffer(offer) {
    const template = document.querySelector("#project-template");
    const clone = template.content.cloneNode(true);

    clone.querySelector(".native_language").textContent = offer.native_language;
    clone.querySelector(".language").textContent = offer.language;
    clone.querySelector(".description").textContent = offer.description;
    clone.querySelector(".price").textContent = `${offer.price} $/h`;
    clone.querySelector(".min_level").textContent = offer.min_level;
    clone.querySelector(".like").textContent = offer.like;
    clone.querySelector(".dislike").textContent = offer.dislike;
    clone.querySelector(".experience").textContent = `${offer.experience} years`;

    return clone;
}