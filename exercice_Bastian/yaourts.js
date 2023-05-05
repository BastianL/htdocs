fetch('https://api.devoldere.net/polls/yoghurts/')
    .then(response => response.json())
    .then(json => traitement(json))

function traitement(json)
{
    let results = json.results;
    let newarray = [];
    for (var vote of results){
        let dedans = false;
       
        for (couleur of newarray){
            if(vote == couleur[0]){
                couleur[1]++
                dedans = true;
                break;
            }
        }
        if(!dedans){
            newarray.push([vote, 1])
        }
    }
    console.log(newarray);
    let retour1 = ["blank", 0]
    let retour2 = ["blank", 0]
    for (couleur of newarray){
        if(couleur[1] > retour1[1]){
            retour2 = retour1;
            retour1 = couleur;
        }
        else if (couleur[1] > retour2[1]){
            retour2 = couleur;
        }
    }
    console.log(retour1[0] + " " + retour2[0]);
}