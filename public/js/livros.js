let modalBook = document.getElementById('modal-book')
let infoBook = document.getElementsByClassName('book-info')[0]
let infoLib = document.getElementsByClassName('lib-info')[0]
let rightSide = document.getElementsByClassName('right-side')[0]
let titleBook = document.getElementsByClassName('modal-title-book')[0]
let buttonCloseModalBook = document.getElementById('button-close-modal-book')
let inputAbnt = document.getElementById('input-abnt')
let btnCopy = document.getElementById('btn-abnt-copy')

if (btnCopy)
    btnCopy.addEventListener('click', copyToClipBoard)

function saveBook(detailsBook) {
    api_laravel.post('/save-book', detailsBook)
        .then(response => response.json())
        .then(data => {
            //here is logic
            console.log(data)
            customMsg('Livro salvo com sucesso!', 'msg-success')
        })
        .catch(function(error) {
            console.log(error);
        });
}

async function hasBook(isbn) {
    return await api_laravel.post('/has-book', isbn)
        .then(response => response.json())
        .catch(function(error) {
            console.log(error);
        });
}

async function getLibByCnpj(cnpj) {
    return await api_laravel.post('/get-library-cnpj', cnpj)
        .then(response => response.json())
        .catch(function(error) {
            console.log(error);
        });
}

function removeBook(isbn) {
    api_laravel.post('/remove-book', isbn)
        .then(response => response.json())
        .then(data => {
            customMsg('Livro removido com sucesso!', 'msg-success')
        })
        .catch(function(error) {
            console.log(error);
        });
}

function copyToClipBoard() {

    inputAbnt.select();
    inputAbnt.setSelectionRange(0, 99999); /* Pra celular */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(inputAbnt.value);

    customMsg('Texto Copiado com Sucesso!', 'msg-success', 'onTop')
}

function toggleDatailsBook(details) {
    titleBook.innerHTML = details.title
    infoBook.innerHTML = `
    <h2>Informações do Livro</h2>
    <p>
        <b>Autor:</b> <br>
        ${details.author}
    </p>
    <p>
        <b>Criadores:</b> <br>
        ${details.info}
    </p>
    <p>
        <b>Editora:</b> <br>
        ${details.publisher ? details.publisher : 'Sem Registro'} - ${details.local}
    </p>
    <p>
        <b>ISBN's:</b> <br>
        ${details.isbn}
    </p>
    <p>
        <b>Localizações:</b><br>
        ${details.locations}
    </p>`

    let citacao = details.author.split(' ')
    citacao = citacao.filter(function(c) {
        return c.length > 2 ? c : null
    })
    citacao.forEach(function(c, i) {
        citacao[i] = i == 0 ? c : c.split('')[0] + "."
    })
    citacao = citacao.join(' ')
    console.log(`${citacao} (${details.creationDate}). ${details.title}. ${details.publisher}.`)
    inputAbnt.value = `${citacao} (${details.creationDate}). ${details.title}. ${details.publisher}.`

    rightSide.innerHTML = `<h2 class="mt-4">Informações da Biblioteca</h2>
    <p>
        <b>Nome:</b> <br>
        ${details.lib.nome}
    </p>
    <p>
        <b>CNPJ:</b> <br>
        ${details.lib.cnpj}
    </p>
    <p>
        <b>Endereço:</b> <br>
        ${details.lib.bairro}, ${details.lib.endereco}, ${details.lib.numero}
    </p>
    <p>
        <b>Cidade:</b> <br>
        ${details.lib.cidade}, ${details.lib.uf}
    </p>
    <p>
        <b>Fone:</b> <br>
        ${details.lib.fone}
    </p>`

    toggleModal()
}

if (buttonCloseModalBook)
    buttonCloseModalBook.addEventListener('click', function() {
        modalBook.style.display = 'none'
        toggleModal()
        setTimeout(() => {
            modalBook.style.display = 'block'
        }, 350);
    })

function toggleModal() {
    modalBook.classList.toggle('active')
    if (modalBook.classList.contains('active')) {
        document.getElementsByTagName('body')[0].style.position = 'fixed'
    } else {
        document.getElementsByTagName('body')[0].style.position = ''
    }
}