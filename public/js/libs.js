function confirmLib(id) {
    api_laravel.post(`/confirm-lib/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.status == 'success') {
                location.reload();
            }
        })
        .catch(function(error) {
            console.log(error);
        });
}

function declineLib(id) {
    api_laravel.delete(`/decline-lib/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.status == 'success') {
                location.reload();
            }
        })
        .catch(function(error) {
            console.log(error);
        });
}

function verifyLib(cnpj) {
    let unformatedCnpj = cnpj.replace('.', '').replace('-', '').replace('/', '').replace('.', '')
    $.ajax({
        url: `https://consulta-cnpj-gratis.p.rapidapi.com/companies/${unformatedCnpj}`,
        async: false,
        type: "GET",
        headers: {
            'x-rapidapi-host': 'consulta-cnpj-gratis.p.rapidapi.com',
            'x-rapidapi-key': '33b82d7e31msh27df526a70bf6c5p1f2cc8jsn205dcfc4371a'
        },
        success: function(data) {
            if (data.code && data.code === 400) {
                customMsg('CNPJ Inválido!', 'msg-danger')
            } else {
                customMsg('CNPJ válido e existente!', 'msg-success')
            }
        },
        error: function(e) {
            if (e.responseJSON.code && e.responseJSON.code === 400) {
                customMsg('CNPJ Inválido!', 'msg-danger')
            }
        },
    });
}