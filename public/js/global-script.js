function customMsg(msg, type) {
    let types = ['msg-danger', 'msg-success', 'msg-alert']
    let cont = document.getElementById('custom-msg')

    cont.innerHTML = msg;

    types.forEach(function(type) {
        cont.classList.remove(type)
    })

    cont.classList.add(type)
    cont.style.display = 'block'
    cont.classList.add('active')

    setTimeout(function() {
        cont.classList.remove('active')

        setTimeout(function() {
            cont.style.display = 'none'
        }, 500)
    }, 5000)
}