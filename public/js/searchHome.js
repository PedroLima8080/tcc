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
                <p>${json.docs[i].pnx.display.creationdate[0]}</p> 
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
    $jq('#teste').addClass('d-none')
    $jq('#pages').addClass('d-none')

    let page = currentPage > 0 ? currentPage * 10 : currentPage
    let json = await advancedRequest(fields, page)
    let pages = Math.ceil(json.info.total / 10);

    renderButtonPages(pages, currentPage)

    if (json.info.total == 0) {
        setStatus('nothingData')
    }

    data = await getLibByCnpj({ cnpj: '48.031.918/0004-77' });
    let lib = data.lib
    let t = 0;

    for (let i = 0; i < (json.info.last - (json.info.first - 1)); i++) {
        let title = json.docs[i].pnx.sort.title[0].split('/')[0];
        let info = []
        let creators = []
        let publisher = json.docs[i].pnx.display.publisher[0] ? json.docs[i].pnx.display.publisher[0] : null;
        let local
        if (publisher) {
            let result = publisher.split(':')
            local = result[0]
            publisher = result.length > 1 ? result[1] : null
        }
        let creationDate = json.docs[i].pnx.sort.creationdate[0] ? json.docs[i].pnx.sort.creationdate[0] : null;
        let locations = "";
        let author = json.docs[i].pnx.sort.author ? json.docs[i].pnx.sort.author[0] : null;
        let isbn = json.docs[i].pnx.addata.isbn ? json.docs[i].pnx.addata.isbn : null;

        let formatedIsbn = []
        if (isbn) {
            isbn.forEach(function(i) {
                if (i)
                    formatedIsbn.push(i + "<br>")
            })
        } else {
            formatedIsbn = 'Este livro não possui nenhum ISBN registrado!'
        }


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

        let savedBook = false
        if (isbn) {
            savedBook = await hasBook({ isbn: isbn[0] })
        }


        let divBook = document.createElement('div')
        divBook.className = 'book'
        divBook.innerHTML = `
            <img src="${asset}/img/open-book.png" class="mr-3 ml-3 p-4">
            <div class="infos">
                <div class="d-flex align-items-center">
                    <h4 class="mr-2">${title}</h4>
                    <i class="fa${await savedBook.book ? 's' : 'r'} fa-bookmark mr-3 ml-auto h4" ></i>
                </div>
                <p class="info">${info}</p>
                <p>${json.docs[i].pnx.display.creationdate[0]}</p>
                Está em:
                <div><b>${locations}<b><div> 
            </div>
        `

        divBook.children[1].children[0].children[0].addEventListener('click', function() {
            let detailsBook = {
                title,
                locations,
                info,
                isbn: formatedIsbn,
                author,
                creationDate,
                publisher,
                local,
                lib
            }
            toggleDatailsBook(detailsBook)
        })

        let tag = divBook.children[1].children[0].children[1];
        tag.addEventListener('click', function() {
            if (isbn) {
                hasBook({ isbn: isbn[0] })
                    .then(data => {
                        if (data.book) {
                            removeBook({ isbn: isbn[0] })
                            tag.className = "far fa-bookmark mr-3 ml-auto h4"
                        } else {
                            let detailsBook = {
                                title,
                                locations,
                                info,
                                isbn,
                                author,
                                creationDate,
                                publisher,
                                local,
                                lib
                            }
                            saveBook(detailsBook)
                            tag.className = "fas fa-bookmark mr-3 ml-auto h4"
                        }
                    })

            } else {
                customMsg('Não é possível salvar este livro pois este não possui ISBN!', 'msg-danger')
            }
        })

        divEl.insertAdjacentElement('beforeend', divBook)

        if (json.info.last - (json.info.first - 1) == (t + 1)) {
            $jq('#teste').removeClass('d-none')
            $jq('#pages').removeClass('d-none')
            $jq('#teste').addClass('d-grid')
            $jq('#pages').addClass('d-flex')
            setStatus('clear');
        }
        t++

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