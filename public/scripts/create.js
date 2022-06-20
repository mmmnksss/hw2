function selectGif(event) {
    console.log("GIF selected.");

    const sel = event.currentTarget;
    const chosenUrl = sel.src;
    
    const box = document.querySelector("#confirm_box");
    box.classList.remove("hidden");
    
    const hiddenInput = document.querySelector("#tenorURL");
    hiddenInput.value = chosenUrl;

    sel.classList.add("img_selected");
    document.querySelectorAll("#found_gifs img").forEach(function (item) {
        if (item.src != hiddenInput.value) 
            item.classList.remove("img_selected")
    });
}

function onJsonGif(json) {
    console.log("Tenor replied successfully.");
    console.log(json);
    
    const foundGifs = document.querySelector("#found_gifs");
    foundGifs.innerHTML = '';

    const res = json.results.length;
    for (let i = 0; i < res; i++) {
        const gif = document.createElement("img");
        gif.src = json.results[i].media[0].gif.url;

        gif.addEventListener("click", selectGif);

        foundGifs.appendChild(gif);
    }
}

function onResponse(response) {
    return response.json();
}

function onError(error) {
    console.log("Error: " + error);
}

function getGif(event) {
    event.preventDefault();

    const query = document.querySelector("#tenor_fieldbox").value;
    console.log("Fetching matching GIF for '" + query + "'");
    fetch("api/search/" + encodeURIComponent(query)).then(onResponse, onError).then(onJsonGif);
}

const gifForm = document.querySelector("#tenor_search");
gifForm.addEventListener("submit", getGif);
