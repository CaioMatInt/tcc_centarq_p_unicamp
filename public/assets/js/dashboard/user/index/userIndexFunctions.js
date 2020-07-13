$( document ).ready(function() {
    $('.confirmDeletionOfUser').click(function() {
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


    initUserDatatables = function (ajaxListRoute, defaultEditRouteName, defaultMedicalAppointmentHistoryRoute) {
            $('#user_datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
                },
                ajax: ajaxListRoute,
                columns: [
                    {
                        data: 'image',
                        name: 'image',
                        render: function (data, type, row) {
                            /* Replace default -1 ID in URL to the actual ID */
                            return `
                              <img class="rounded-circle height-50px" src="${window.location.origin + '/' + data }"> `
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'rg', name: 'rg'},
                    {
                        data: 'id',
                        name: 'Ações',
                        render: function (data, type, row) {
                            /* Replace default -1 ID in URL to the actual ID */
                            let currentEditRoute = defaultEditRouteName.replace(-1, data);
                            let currentMedicalAppointmentHistoryRoute = defaultMedicalAppointmentHistoryRoute.replace(-1, data);

                            return `
                              <div class="text-center">
                                    <a data-toggle="tooltip" data-placement="top" title="Visualizar histórico de consultas" href="${currentMedicalAppointmentHistoryRoute}"
                                        class="ml-1 btn btn-info-alternative"><i class="fa fa-history"></i>
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
