function deletePost(event) {
    fetch("post/delete/" + event.currentTarget.dataset.postId).then(onResponse).then(function(json) {
        if(json["success"] == false)
        {
            return null;
        }
    });

    const toDelete = event.currentTarget.parentNode.parentNode;
    toDelete.remove();

    reFetch();
}

function onJson(json) {
    const mainFeed = document.querySelector("#feed");

    if (!json.length) {
        console.log("EMPTY - No items fetched.");
        const notFound = document.createElement("div")
        notFound.classList.add("no-data")
        notFound.textContent = "You haven't made any post yet."
        document.querySelector(".fixed").appendChild(notFound);
    }

    else {
        console.log(json);
        console.log("Fetched " + json.length + " items");
        for (let i = 0; i < json.length; i++) {
            const mainFeed = document.querySelector("#feed");

            const div = document.createElement("div");
            div.classList.add("post");

            const title = document.createElement("div");
            title.classList.add("title");
            title.textContent = json[i].content.title;
            div.appendChild(title);

            const author = document.createElement("div");
            author.classList.add("author");
            author.textContent = "posted by you";
            div.appendChild(author);

            const content = document.createElement("div");
            content.classList.add("content");
            content.textContent = json[i].content.caption;
            div.appendChild(content);

            if(json[i].content.gif) {
                const gif = document.createElement("img");
                gif.classList.add("gif");
                gif.src = json[i].content.gif;
                div.appendChild(gif);
            }

            const pageDeleteContent = document.createElement('div');
            pageDeleteContent.classList.add('deletecontent');
            div.appendChild(pageDeleteContent);

            const pageDelete = document.createElement('button');
            pageDelete.classList.add('delete');
            pageDelete.textContent = "Delete post";
            pageDelete.dataset.postId = json[i].postId;
            pageDeleteContent.appendChild(pageDelete);
            mainFeed.appendChild(div);



            const deleteButtons = document.querySelectorAll('.delete');
            for (const deleteButton of deleteButtons) {
                deleteButton.addEventListener('click', deletePost);
            }
        }

        const feedEnd = document.createElement('div');
        feedEnd.classList.add("end");

        feedEnd.textContent = "You've reached the end. You posted a total of " + json.length + " post(s).";
        mainFeed.appendChild(feedEnd);
    }
}

function onResponse(response) {
    return response.json();
}

function onError(error) {
    console.log("Error while fetching posts: " + error);
}

function reFetch(){
    const main = document.querySelector("#feed");
    main.innerHTML = '';
    fetch("fetch/mine").then(onResponse, onError).then(onJson);
}

reFetch();