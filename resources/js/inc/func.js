window.swallConfirm = function (successCallback, cancelCallback) {
    swal({
        title: 'Подтвердите действие',
        type: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-danger',
        confirmButtonText: 'Да',
        cancelButtonText: 'Нет',
        cancelButtonClass: 'btn btn-secondary'
    }).then((result) => {
        if (result.value) {
            if (successCallback !== undefined) {
                successCallback();
            }
        }
        else {
            if (cancelCallback !== undefined) {
                cancelCallback();
            }
        }
    });
}
