$( document ).ready(function() {
    $(document).on("click", '.confirmDeletionOfConductionPoint', function(){
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


    initConductionPointsDatatables = function (ajaxListRoute, defaultEditRouteName, defaultDestroyRouteName, csrf_token_field) {
        $('#conduction_points_datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            },
            ajax: ajaxListRoute,
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
                                    <form class="d-inline" method="POST" action="${currentDestroyRoute}">
                                        ${csrf_token_field}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="button" class="btn btn-danger-alternative confirmDeletionOfConductionPoint"><i class="fa fa-trash mr-1"></i></button>

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
