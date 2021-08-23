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
    let divEl = document.getElementById('teste')
    divEl.innerHTML = ''

    setStatus('loading')

    let json = await request(title)

    setStatus('clear')

    if (json.info.total == 0) {
        setStatus('nothingData')
    }

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
    document.getElementById('search').addEventListener("submit", (e) => {
        e.preventDefault()

        let title = document.getElementById('title').value

        write(title)
    })
}

function onLoad() {
    setEvents()
    setStatus('insertTitle')
}

window.onload = function() {
    onLoad();
}