const returnContest = () => {
    $.ajax({
        url: '../backend/services/return_contest.php',
        method: 'GET',
        success: function(response) {
            const data = JSON.parse(response);
            if (data.status == "1") {
                console.log(data.data); // Aquí están los datos de la tabla contests
            } else {
                console.error("Error: " + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
    
}