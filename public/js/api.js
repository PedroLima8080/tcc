function makeRequest(url, method, body){
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    return fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            },
        method: method,
        credentials: "same-origin",
        body: JSON.stringify(body)
    })
}

let api = {
    post: function(url, body){
        return makeRequest(url, 'post', body)
    }
}