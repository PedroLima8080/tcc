function makeRequest(url, method, body) {
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

async function makeRequestUnesp(url, method) {
    let data = await fetch(url, {
        method: method,
        headers: {
            'Accept': 'application/json',
            'User-agent': 'UNESP Search via API script',
            'Authorization': 'apikey l8xx61b8067177014e039061850f26a77372'
        }
    })
    let json = await data.json();
    return await json
}

let api_laravel = {
    post: function(url, body) {
        return makeRequest(url, 'post', body)
    }
}

let api_unesp = {
    get: async function(url) {
        return await makeRequestUnesp(url, 'get')
    }
}