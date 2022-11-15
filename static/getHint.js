function requestDate(showInfoID) {
    $.ajax({
        url: '/randomDate.php',
        method: 'POST',
        data: {'date': 1},
        success: function (data, textStatus, jqXHR) {
            submitCMD(data, function (resultDate) {
                document.getElementById(showInfoID).innerText = '许愿池时钟：' + resultDate;
            })
        }
    });
}