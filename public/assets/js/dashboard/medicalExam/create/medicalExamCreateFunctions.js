$(document).ready(function() {
    $('#complaintsSelect').select2();
    $('#conductionPointsSelect').select2();
    $('#medicalTreatmentsSelect').select2();
    $('#lol').select2();



    /**Code for select2 Input to search for users **/

    let _token = $('meta[name="_token"]').attr('content');

    $( "#user_id" ).select2({
        minimumInputLength: 3,
        ajax: {
            url: window.location.origin + '/painel/renderizar-lista-usuarios-nome-e-id-por-nome',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    _token: _token,
                    name: params.term
                };
            },
            processResults: function (response) {
                return {
                    results:  $.map(response, function (item) {
                        return {
                            text: item['name'],
                            id: item['id']
                        }
                    })
                };
            },
            cache: true
        }

    });

});
