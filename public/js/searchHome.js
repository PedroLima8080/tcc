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

async function advancedRequest(fields, page = 0) {
    let resultFields = {}

    fields.title ? resultFields.title = fields.title : null;
    fields.creator ? resultFields.creator = fields.creator : null;
    fields.sub ? resultFields.sub = fields.sub : null;
    fields.isbn ? resultFields.isbn = fields.isbn : null;

    let query = "";
    let count = 0
    let continuous = ",AND;"

    Object.keys(resultFields).forEach(function(key) {
        query += key + ",contains," + resultFields[key] + continuous

        count++
    });

    if (query === "")
        query = "title,contains,"

    let data = await fetch(`https://api-na.hosted.exlibrisgroup.com/primo/v1/search?vid=55UNESP_INST:UNESP&scope=BBA&tab=LIBS&q=${query}&mode=advanced&offset=${page}`, {
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

        let locations = "";

        json.docs[i].delivery.holding.forEach((location, index) => {
            locations += `${location.mainLocation}`;
            locations += (index + 1) < json.docs[i].delivery.holding.length ? ',<br>' : ''
                //,<br>
        })


        divEl.innerHTML += `
        <div class="book">
            <img src="${asset}/img/open-book.png" class="mr-3 ml-3 p-4">
            <div class="infos">
                <h4>${title}</h4>   
                <p class="info">${info}</p>
                <p>${ json.docs[i].pnx.display.creationdate[0]}</p> 
                Está em:
                <div><b>${locations}<b><div> 
            </div>
            </div>
        `
    }
}

function renderButtonPages(pages, currentPage) {
    let contPages = document.getElementById('pages')

    contPages.innerHTML = ""

    for (let index = 1; index <= pages; index++) {
        if (index > currentPage - 3 && index < currentPage + 5) {

            let btn = document.createElement('button')
            btn.classList.add('mr-1')
            btn.classList.add('ml-1')
            btn.classList.add('btn-login')
            btn.innerHTML = index
            btn.addEventListener('click', function() {
                let title = document.getElementById('title').value
                let author = document.getElementById('autor').value
                let sub = document.getElementById('assunto').value
                let isbn = document.getElementById('isbn').value
                let data = {
                    title: title.length > 0 ? title : null,
                    creator: author.length > 0 ? author : null,
                    sub: sub.length > 0 ? sub : null,
                    isbn: isbn.length > 0 ? isbn : null,
                }
                contPages.innerHTML = ""
                window.location.href = "#topo";
                advancedWrite(data, index - 1)
            })


            contPages.appendChild(btn)
        }
    }

    for (var i = 0; i < contPages.children.length; i++) {
        if (contPages.children[i].tagName == "button") contPages.children[i].classList.remove('active')
        if (contPages.children[i].innerHTML == currentPage + 1) contPages.children[i].classList.add('active')
    }
}

async function advancedWrite(fields, currentPage = 0) {
    let divEl = document.getElementById('teste')
    let divElPages = document.getElementById('pages')
    divEl.innerHTML = ''
    divElPages.innerHTML = ''

    setStatus('loading')
    let page = currentPage > 0 ? currentPage * 10 : currentPage
    let json = await advancedRequest(fields, page)
    console.log(json)
    let pages = Math.ceil(json.info.total / 10);

    renderButtonPages(pages, currentPage)

    setStatus('clear')

    if (json.info.total == 0) {
        setStatus('nothingData')
    }

    for (let i = 0; i < (json.info.last); i++) {
        let title = json.docs[i].pnx.sort.title[0].split('/')[0]
        let info = []
        let creators = []
        let locations = "";
        let isbn = json.docs[i].pnx.control.recordid[0]

        json.docs[i].delivery.holding.forEach((location, index) => {
            locations += `${location.mainLocation}`;
            locations += (index + 1) < json.docs[i].delivery.holding.length ? ',<br>' : ''
                //,<br>
        })

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
                <div class="d-flex align-items-center">
                    <h4 class="mr-2">${title}</h4>
                    <i class="far fa-bookmark mr-3 ml-auto h4" onclick='alert("${isbn}")' ></i>
                </div>
                <p class="info">${info}</p>
                <p>${ json.docs[i].pnx.display.creationdate[0]}</p>
                Está em:
                <div><b>${locations}<b><div> 
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
            divInfosEl.innerHTML = '<h1 class="text-center w-100">Nenhum resultado encontrado</h1>'
            break;

        case 'insertTitle':
            divInfosEl.innerHTML = '<h3 class="text-center w-100"></h3>'
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
            let assunto = document.getElementById('assunto').value
            let isbn = document.getElementById('isbn').value

            let data = {
                title: title.length > 0 ? title : null,
                creator: author.length > 0 ? author : null,
                sub: assunto.length > 0 ? assunto : null,
                isbn: isbn.length > 0 ? isbn : null,
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