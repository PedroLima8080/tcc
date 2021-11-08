let modalBook = document.getElementById('modal-book')
let infoBook = document.getElementsByClassName('book-info')[0]
let infoLib = document.getElementsByClassName('lib-info')[0]
let titleBook = document.getElementsByClassName('modal-title-book')[0]
let buttonCloseModalBook = document.getElementById('button-close-modal-book')
let inputAbnt = document.getElementById('input-abnt')
let btnCopy = document.getElementById('btn-abnt-copy')

btnCopy.addEventListener('click', copyToClipBoard)

function copyToClipBoard() {

    inputAbnt.select();
    inputAbnt.setSelectionRange(0, 99999); /* Pra celular */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(inputAbnt.value);

    customMsg('Texto Copiado com Sucesso!', 'msg-success', 'onTop')
}

function toggleDatailsBook(details) {
    console.log(details)
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
    inputAbnt.value = `${citacao} (${details.creationDate}). ${details.title}.`
    toggleModal()
}

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