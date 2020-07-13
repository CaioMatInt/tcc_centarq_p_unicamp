$( document ).ready(function() {
    $(document).on("click", '.confirmDeletionOfComplaint', function(){
        Swal.fire({
            title: 'Tem certeza que deseja remover este registro?',
            text: "Não há como reverter esta remoção",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#F0545F',
            confirmButtonText: 'Remover'
        }).then((result) => {
            if (result.value) {
                $(this).parent().submit();
            }
        })

    });


    initComplaintDatatables = function (ajaxListRoute, defaultEditRouteName, defaultDestroyRouteName, csrf_token_field) {
            $('#complaints_datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
                },
                ajax: ajaxListRoute,
                dom: '<"row"<"col-12"B>><"row mt-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>  <"top"rt><"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: 'excelHtml5', className: 'btn btn-data-tables mdi mdi-file-excel',
                        exportOptions: {
                            columns: [0]
                        }
                    },
                    {
                        extend: 'csvHtml5', className: 'btn btn-data-tables mdi mdi-file-excel',
                        exportOptions: {
                            columns: [0]
                        }
                    },
                    {
                        extend: 'pdfHtml5', className: 'btn btn-data-tables mdi mdi-file-pdf',
                        exportOptions: {
                            columns: [0]
                        }
                    }
                ],
                columns: [
                    {data: 'name', name: 'name'},

                    {
                        data: 'id',
                        name: 'Ações',
                        render: function (data, type, row) {
                            /* Replace default -1 ID in URL to the actual ID */
                            let currentEditRoute = defaultEditRouteName.replace(-1, data);
                            let currentDestroyRoute = defaultDestroyRouteName.replace(-1, data);

                            return `
                              <div class="text-center">
                                     <a>
                                    <form class="d-inline formDestroyComplaint" method="POST" action="${currentDestroyRoute}">
                                        ${csrf_token_field}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="button" class="btn btn-danger-alternative confirmDeletionOfComplaint"><i class="fa fa-trash mr-1"></i></button>

                                    </form>
                                    </a>
                                    <a href="${currentEditRoute}" class="btn btn-warning-alternative"><i class="fa fa-edit mr-1"></i>
                                    </a>
                              </div> `
                        }
                    },

                ],
            });
        }


});
