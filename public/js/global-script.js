function customMsg(msg, type, position = false) {
    let types = ['msg-danger', 'msg-success', 'msg-alert']
    let cont = document.getElementById('custom-msg')

    cont.innerHTML = msg;

    types.forEach(function(type) {
        cont.classList.remove(type)
    })

    cont.classList.add(type)
    cont.style.display = 'block'
    cont.classList.add('active')

    if (position) {
        switch (position) {
            case 'onTop':
                cont.classList.add('onTop')
                break;

            default:
                break;
        }
    }

    setTimeout(function() {
        cont.classList.remove('active')


        setTimeout(function() {
            cont.style.display = 'none'
            position ? cont.classList.remove(position) : null;
        }, 500)
    }, 5000)
}