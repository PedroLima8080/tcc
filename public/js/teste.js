async function request() {
    let data = await fetch('https://api-na.hosted.exlibrisgroup.com/primo/v1/search?vid=55UNESP_INST:UNESP&scope=BBA&tab=LIBS&q=title,contains,modern', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'User-agent': 'UNESP Search via API script',
            'Authorization': 'apikey l8xx61b8067177014e039061850f26a77372'
        }
    })
    let json = await data.json();

    console.log(json);

    let divEl = document.getElementById('teste')

    for (let i = 0; i < (json.info.last); i++) {
        let title = json.docs[i].pnx.sort.title[0].split('/')[0]
        let creators = json.docs[i].pnx.display.creationdate[0]

        if (json.docs[i].pnx.display.creator) {
            creators += json.docs[i].pnx.display.creator[0]
        }

        divEl.innerHTML += `
            <h2>${title}</h2>
            <p>${creators}</p> 
            <br>
        `

    }

}

request()