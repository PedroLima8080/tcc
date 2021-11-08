let modalBook = document.getElementById('modal-book')
let infoBook = document.getElementsByClassName('book-info')[0]
let infoLib = document.getElementsByClassName('lib-info')[0]
let titleBook = document.getElementsByClassName('modal-title-book')[0]
let buttonCloseModalBook = document.getElementById('button-close-modal-book')
let inputAbnt = document.getElementById('input-abnt')
inputAbnt.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
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
    citacao = citacao.filter(function(c){
        return c.length > 2 ? c : null
    }) 
    citacao.forEach(function(c, i){
        citacao[i] = i == 0 ? c : c.split('')[0]+"."
    }) 
    citacao = citacao.join(' ')
    inputAbnt.value = `${citacao} (${details.creationDate}). ${details.title}.`
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