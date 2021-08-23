let asset = document.location.origin

async function simpleRequest(title) {
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

async function advancedRequest(fields) {
    let resultFields = {}

    fields.title ? resultFields.title = fields.title : null;
    fields.creator ? resultFields.creator = fields.creator : null;

    let query = "";
    let count = 0
    let continuous = ",AND;"

    Object.keys(resultFields).forEach(function(key) {
        query += key + ",contains," + resultFields[key] + continuous

        count++
    });

    if (query === "")
        query = "title,contains,"

    let data = await fetch(`https://api-na.hosted.exlibrisgroup.com/primo/v1/search?vid=55UNESP_INST:UNESP&scope=BBA&tab=LIBS&q=${query}&mode=advanced`, {
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

async function simpleWrite(title) {
    let divEl = document.getElementById('teste')
    divEl.innerHTML = ''

    setStatus('loading')

    let json = await simpleRequest(title)
        //console.log(json)

    setStatus('clear')

    if (json.info.total == 0) {
        setStatus('nothingData')
    }

    for (let i = 0; i < (json.info.last); i++) {
        let title = json.docs[i].pnx.sort.title[0].split('/')[0]
        let info = []
        let creators = []

        if (json.docs[i].pnx.sort.author) {
            json.docs[i].pnx.sort.author.forEach(author => {
                info += author.replace('$$Q', ';').split(';', 1)
            })
        }
        if (json.docs[i].pnx.display.contributor) {
            json.docs[i].pnx.display.contributor.forEach(contributor => {
                info += ";" + (contributor.replace('$$Q', ';').split(';', 1))
            })
        }


        divEl.innerHTML += `
        <div class="book">
            <img src="${asset}/img/open-book.png" class="mr-3 ml-3 p-4">
            <div class="infos">
                <h4>${title}</h4>   
                <p class="info">${info}</p>
                <p>${ json.docs[i].pnx.display.creationdate[0]}</p> 
            </div>
            </div>
        `
    }
}

async function advancedWrite(fields) {
    let divEl = document.getElementById('teste')
    divEl.innerHTML = ''

    setStatus('loading')

    let json = await advancedRequest(fields)
    console.log(json)

    setStatus('clear')

    if (json.info.total == 0) {
        setStatus('nothingData')
    }

    for (let i = 0; i < (json.info.last); i++) {
        let title = json.docs[i].pnx.sort.title[0].split('/')[0]
        let info = []
        let creators = []

        if (json.docs[i].pnx.sort.author) {
            json.docs[i].pnx.sort.author.forEach(author => {
                info += author.replace('$$Q', ';').split(';', 1)
            })
        }
        if (json.docs[i].pnx.display.contributor) {
            json.docs[i].pnx.display.contributor.forEach(contributor => {
                info += ";" + (contributor.replace('$$Q', ';').split(';', 1))
            })
        }


        divEl.innerHTML += `
        <div class="book">
            <img src="${asset}/img/open-book.png" class="mr-3 ml-3 p-4">
            <div class="infos">
                <h4>${title}</h4>   
                <p class="info">${info}</p>
                <p>${ json.docs[i].pnx.display.creationdate[0]}</p> 
            </div>
            </div>
        `
    }
}

function setStatus(status) {
    let divInfosEl = document.getElementById('status')

    switch (status) {
        case 'loading':
            divInfosEl.innerHTML = '<div class="loader mr-auto ml-auto"></div>'
            break;
        case 'nothingData':
            divInfosEl.innerHTML = '<h1 class="text-center" class="w-100">Nenhum resultado encontrado</h1>'
            break;

        case 'insertTitle':
            divInfosEl.innerHTML = '<h3 class="text-center" class="w-100"></h3>'
            break;

        case 'clear':
            divInfosEl.innerHTML = ''
            break;

        default:
            break;
    }
}

function setEvents() {
    let simpleForm = document.getElementById('search')
    let advancedForm = document.getElementById('searchAdvanced')

    if (simpleForm) {

        simpleForm.addEventListener("submit", (e) => {
            e.preventDefault()

            let title = document.getElementById('title').value

            simpleWrite(title)
        })
    }

    if (advancedForm) {

        advancedForm.addEventListener("submit", (e) => {
            e.preventDefault()

            let title = document.getElementById('title').value
            let author = document.getElementById('autor').value

            let data = {
                title: title.length > 0 ? title : null,
                creator: author.length > 0 ? author : null,
                //title: title.length > 0 ? title : null,
                //title: title.length > 0 ? title : null,
            }

            advancedWrite(data)
        })
    }
}

function onLoad() {
    setEvents()
    setStatus('insertTitle')
}

window.onload = function() {
    onLoad();
}