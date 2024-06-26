// script.js

function downloadPDF() {
    const settings = {
        async: true,
        crossDomain: true,
        url: 'https://apitemplate1.p.rapidapi.com/v2/create-pdf?template_id=b3f77b23493320da&async=0&output_html=0&output_format=pdf&export_type=json&webhook_url=https%3A%2F%2Fyourwebserver.com',
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-API-KEY': '89f6MTg3OTc6MTU4OTY6QW90MFFHQVBnbkduYmpNMw=',
            'X-RapidAPI-Key': '70e0c7656cmsh6e2aa52f1e144b4p1941d6jsn3f007f567435',
            'X-RapidAPI-Host': 'apitemplate1.p.rapidapi.com'
        },
        processData: false,
        data: JSON.stringify({
            
            
            
        })
    };

    $.ajax(settings).done(function (response) {
        console.log(response.download_url);
        window.open(response.download_url);
    });
}

