var myInit={
    mode:'cors'
};
async function loaddata(url){
try {
    let reponse = await fetch(url, myInit);
    let txt = await reponse.text();
    return txt;
} catch(erreur){
    console.error(erreur);
}
}
async function loaddatajson(url){
    try {
        let reponse = await fetch(url, myInit);
        let json = await reponse.json();
        return json;
    } catch(erreur){
        console.error(erreur);
    }
    }
function parsetext(valeur){
    let aretourner = [];
    for (let i= 0; i < valeur.length; i++){
        if(valeur[i] == '\n'){
            return createobject(i, valeur, aretourner);
        }
    }
}

function createobject(i, valeur, aretourner){
    i++
   let id=""
    let titre = ""
    while (valeur[i] != ')' && i < valeur.length)
    {
        id = id + valeur[i];
        i++;
    }
    i++;
    while (valeur[i] == '	'){
        i++;
    }
    while (valeur[i] != "\n" && i < valeur.length){
        titre = titre + valeur[i];
        i++
   }
    let newobjet = Object({
        "id":id,
        "titre":titre,
        "alt":titre + "- volcans en indonésie"
    })
    while ( i < valeur.length){
        if (i != " "){
            aretourner.push(newobjet);
            aretourner = createobject(i, valeur, aretourner)
            break;
        }
        i++
    }
    console.log(aretourner);
    return aretourner
}

document.getElementById("OK").addEventListener("click", function () { 
    let toto = loaddatajson("traitement.php?min=" + document.getElementById("min").value + "&max=" + document.getElementById("max").value);
    toto.then(valeur => createpictures(valeur));
})
function createpictures(dataobject){
    let diaporama = document.getElementsByClassName("carousel-inner")[0];
    let indicateurs = document.getElementsByClassName("carousel-indicators")[0];
    let n = 0;
    while (diaporama.firstChild) {
      diaporama.removeChild(diaporama.firstChild);
    }    
    while (indicateurs.firstChild) {
        indicateurs.removeChild(indicateurs.firstChild);
    }
    for (const object of dataobject){
        let image = document.createElement("img");
        image.classList.add("d-block", "w-100");
        image.src="photos_volcans/" + object.id + ".jpg";
        image.alt=object.alt;
        let captiontext = document.createElement("h5");
        captiontext.textContent = object.titre;
        let caption = document.createElement("div");
        caption.classList.add("carousel-caption");
        caption.appendChild(captiontext);
        let carouselitem = document.createElement("div");
        carouselitem.classList.add("carousel-item");
        carouselitem.appendChild(image);
        carouselitem.appendChild(caption);
        diaporama.appendChild(carouselitem);
        let bouton = document.createElement("button");
        bouton.type="button";
        console.log(n);
        bouton.setAttribute("data-bs-target", "#carousel");
        bouton.setAttribute("data-bs-slide-to", n);
        bouton.setAttribute("aria-label", "Slide " + n);
        indicateurs.appendChild(bouton);
        n++
    }
    diaporama.getElementsByClassName("carousel-item")[0].classList.add("active");
    indicateurs.getElementsByTagName("button")[0].classList.add("active");
    indicateurs.getElementsByTagName("button")[0].setAttribute("aria-current", "true");
}
let submit = document.getElementById("OK");
let min = document.getElementById("min");
let max = document.getElementById("max")
