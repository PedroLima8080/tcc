function setStatus(status) {
    let divInfosEl = document.getElementById('status')

    switch (status) {
        case 'loading':
            divInfosEl.innerHTML = '<div class="loader mr-auto ml-auto"></div>'
            break;
        case 'nothingData':
            divInfosEl.innerHTML = '<h3 class="text-center w-100">Nenhum resultado encontrado</h3>'
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