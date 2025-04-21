$('.basic_info_form').on('submit', function (e) {
    e.preventDefault();
    let FormData = $(this).serialize();
    $.ajax({
        method: 'POST',
        url: '',
        data: FormData,
        beforeSend: function () {
            
        },
        success: function (data) {

        },
        error: function (xhr, status, error) {
            
        },
        complete: function () {
            
        }
    });
});