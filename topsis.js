$('#topsisForm').submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: "post",
        url: "services/topsis.php",
        data: $(this).serialize()
    }).done(function (res) {
        console.log(res);
        window.location = 'show_topsis.php'
    }).fail(function (res) {
        console.log(res);
        swal({
            title: "เกิดข้อผิดพลาด",
            text: res.responseJSON['message'],
            icon: "error"
        });
    });
});