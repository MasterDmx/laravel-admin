"use strict";

/**
 * Сформировать базовую таблицу
 * @param {*} el jquery объект таблицы
 * @param {*} options дополнительные параметры
 * @return Объект DATATABLE таблицы
 */
function datatable_base_build (options = {}, jqSelector = '#datatable')
{
    return $(jqSelector).dataTable({
        responsive: true,
        lengthChange: false,
        pageLength: 20,
        language: {
            searchPlaceholder: "Поиск",
        },
        dom:
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        columnDefs: options.columnDefs || [],
        buttons: [
            {
                extend:    'colvis',
                text:      'Настройка столбцов',
                titleAttr: 'Col visibility',
                className: 'btn-outline-default btn-sm mr-1'
            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                titleAttr: 'Generate Excel',
                className: 'btn-outline-success btn-sm mr-1'
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                titleAttr: 'Generate CSV',
                className: 'btn-outline-primary btn-sm mr-1'
            },
        ]
    });
}

/**
 * Удаление элемента таблицы и модели сразу
 * @param {*} table
 * @param {*} url
 */
function dt_remove_item (table, url = '', jqSelector = '#datatable tbody', jqTrigger = '.js--dt-remove-item')
{
    $(jqSelector).on('click', jqTrigger, function () {
        var $row = $(this).parents('tr');
        var id = $row.data('item-id');
        var row = table.api().row($row);

        var swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger ml-2"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Вы уверены?",
            text: "Последствия необратимы",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Да",
            cancelButtonText: "Нет",
        })
        .then(function(result){
            if (result.value) {
                $.ajax({
                    url: url + id,
                    type: 'DELETE',
                    success: function(response, textStatus, xhr) {
                        if (xhr.status === 200) {
                            $row.addClass('animate__animated animate__zoomOut');

                            setTimeout(() => {
                                row.remove().draw(false);
                            }, 300);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log('AJAX ERROR -------------------------------');
                        console.log(XMLHttpRequest);
                        console.log(textStatus);
                        console.log(errorThrown);
                        console.log('AJAX ERROR END ---------------------------');
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            )
            {
                swalWithBootstrapButtons.fire(
                    "Отменено",
                    "Слава богу вы одумались...",
                    "error"
                );
            }
        });
    });
}
