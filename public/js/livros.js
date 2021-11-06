let modalBook = document.getElementById('modal-book')
let infoBook = document.getElementsByClassName('book-info')[0]
let infoLib = document.getElementsByClassName('lib-info')[0]
let titleBook = document.getElementsByClassName('modal-title-book')[0]
let buttonCloseModalBook = document.getElementById('button-close-modal-book')

function toggleDatailsBook(details) {
    console.log(details)
    titleBook.innerHTML = details.title
    infoBook.innerHTML = `
    <h2>Informações do Livro</h2>
    <p>
        <b>Criadores:</b> <br>
        ${details.info}
    </p>
    <p>
        <b>ISBN's:</b> <br>
        ${details.isbn}
    </p>
    <p>
        <b>Localizações:</b><br>
        ${details.locations}
    </p>`
    toggleModal()
}

buttonCloseModalBook.addEventListener('click', function () {
    modalBook.style.display = 'none'
    toggleModal()
    setTimeout(() => {
        modalBook.style.display = 'block'
    }, 350);
})

function toggleModal() {
    modalBook.classList.toggle('active')
}