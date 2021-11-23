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