var contenu = document.getElementById("films");
let response = await fetch ('voyages.json')
if (response.ok){
    let json = await response.json();
    createarticles(json);
} else {
    alert("HTTP-Error: " + response.status);
}

function createarticles(json){
    for (const article of json){
        let titre = document.createElement("h3");
        titre.textContent = article.trip_title;
        let image = document.createElement("img");
        image.src = "images/voyages/id" + article.trip_id + ".jpg";
        image.alt = article.trip_destination;
        image.classList.add("filmImage")
        let description = document.createElement("p");
        description.textContent = cutword(article.trip_description);
        let button = document.createElement("button");
        button.name= "suite" + article.trip_id;
        button.textContent = "Lire la suite";
        button.type="button";
        button.addEventListener("click", function(){showText(article.trip_id)}, false);
        let fulldescription = document.createElement("p");
        fulldescription.textContent = article.trip_description;
        fulldescription.style= "display:none"
        fulldescription.id = "fulldescription" + article.trip_id;
        let blockdescription = document.createElement("div");
        blockdescription.className=("blockdescription");
        blockdescription.appendChild(description);
        blockdescription.appendChild(button);
        let imageetext = document.createElement("div");
        imageetext.appendChild(image);
        imageetext.appendChild(blockdescription);
        imageetext.classList.add("imageetext");
        let ensemble = document.createElement("article");
        ensemble.appendChild(titre);
        ensemble.appendChild(imageetext);
        ensemble.appendChild(fulldescription);
        contenu.appendChild(ensemble);
    }
}

function showText(id){
    let aafficher = document.getElementById("fulldescription" + id);
    if (aafficher.style.display == "none"){
        console.log(aafficher.style);
    aafficher.style.display = "block";
    }else {
        console.log("disparition");
        aafficher.style.display = "none";
    }
}

function cutword(texte){
    let aretourner=""
    let mot=""
    for (let i = 0; i < 200 && i < texte.length; i++){
        if (texte[i] == " "){
            aretourner += mot + " ";
            mot = "";
        }else {
            mot += texte[i];
        }
    }
    return aretourner + "\n";
}