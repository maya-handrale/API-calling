jQuery(document).ready(function($) {
    $('#get-weather').on('click', function() {
        var city = $('#weather-city').val().trim();
        if (!city) {
            $('#weather-result').html('<p>Please enter a city name.</p>');
            return;
        }

        $('#weather-result').html('<p>Loading...</p>');

        $.ajax({
            type: 'POST',
            url: weather_ajax_object.ajax_url,
            data: {
                action: 'get_weather_data',
                city: city,
                nonce: weather_ajax_object.nonce
            },
            success: function(response) {
                if (response.success) {
                    const d = response.data;
                    $('#weather-result').html(`
                        <h3>Weather in ${d.city}</h3>
                        <p>🌡️ Temperature: ${d.temp}&deg;C</p>
                        <p>🌤️ Description: ${d.desc}</p>
                    `);
                } else {
                    $('#weather-result').html(`<p>${response.data}</p>`);
                }
            },
            error: function() {
                $('#weather-result').html('<p>❌ Error fetching weather data.</p>');
            }
        });
    });
});
