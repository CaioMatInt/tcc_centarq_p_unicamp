$( document ).ready(function() {
    $(document).on("click", '.confirmDeletionOfMedicalAppointment', function(){

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


    initMedicalAppointmentsDatatables = function (ajaxListRoute, defaultEditRouteName, defaultShowRouteName, defaultDestroyRouteName , csrf_token_field) {
        $('#medical_appointments_table').DataTable({
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
                    data: 'user.image',
                    name: 'image',
                    render: function (data, type, row) {
                        /* Replace default -1 ID in URL to the actual ID */
                        return `
                              <img class="rounded-circle height-50px" src="${window.location.origin + '/' + data }"> `
                    }
                },
                {data: 'user.name', name: 'user_id'},
                {data: 'date', name: 'date'},

                {
                    data: 'id',
                    name: 'Ações',
                    render: function (data, type, row) {
                        /* Replace default -1 ID in URL to the actual ID */
                        let currentEditRoute = defaultEditRouteName.replace(-1, data);
                        let currentShowRoute = defaultShowRouteName.replace(-1, data);
                        let currentDestroyRoute = defaultDestroyRouteName.replace(-1, data);

                        return `
                              <div class="text-center">
                                    <a href="${currentShowRoute}" class="btn btn-info-alternative"><i class="fa fa-eye mr-1"></i>
                                    </a> 
                                     <a>
                                    <form class="d-inline" method="POST" action="${currentDestroyRoute}">
                                        ${csrf_token_field}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="button" class="btn btn-danger-alternative confirmDeletionOfMedicalAppointment"><i class="fa fa-trash mr-1"></i></button>

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
