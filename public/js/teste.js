let asset = document.location.origin

async function request(title) {
    let data = await fetch(`https://api-na.hosted.exlibrisgroup.com/primo/v1/search?vid=55UNESP_INST:UNESP&scope=BBA&tab=LIBS&q=title,contains,${title}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'User-agent': 'UNESP Search via API script',
            'Authorization': 'apikey l8xx61b8067177014e039061850f26a77372'
        }
    })
    let json = await data.json();

    return await json
}

async function write(title) {
    let json = await request(title)

    console.log(json)

    let divEl = document.getElementById('teste')
    divEl.innerHTML = ''

    for (let i = 0; i < (json.info.last); i++) {
        let title = json.docs[i].pnx.sort.title[0].split('/')[0]
        let info = []
        let creators = []

        if (json.docs[i].pnx.display.contributor) {
            json.docs[i].pnx.display.contributor.forEach(contributor => {
                info += contributor.replace('$$Q', ';').split(';', 1)
            })
        }


        divEl.innerHTML += `
        <div class="book d-flex flex-row align-items-center">
            <img src="${asset}/img/book.png" class="mr-3 ml-3">
            <div class="infos">
                <h2>${title}</h2>   
                <p class="info">${info}</p>
                <p>${ json.docs[i].pnx.display.creationdate[0]}</p> 
            </div>
            </div>
        `
    }
}

write('modern')

document.getElementById('search').addEventListener("submit", (e) => {
    e.preventDefault()

    let title = document.getElementById('title').value

    write(title)
})