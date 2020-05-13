$( document ).ready(function() {

    let body = $('body');
    let totalOfAdminLines = 1;
    let cityIdSelector = $( "#ibge_city_id" );
    let adminNameSelector = $("[name='adminName[]'");
    let adminEmailSelector = $("[name='adminEmail[]'");
    let adminRGSelector = $("[name='adminRG[]'");

    $('#btnSaveTownHall').click(function() {

        if(checkIfHaveEmptyInputsInAdminInformartions()){
            notyMsg('error',10000,'Por favor, é necessário inserir ao menos um administrador e preencher nome, e-mail e RG para todos os administradores inseridos.');
        }else{
            $('#formTwonHall').submit();
        }


    });


    cityIdSelector.change(function() {
       $("#name").val($( "#ibge_city_id option:selected" ).text());
    });

    body.on('click', '.removeAdminButton', function() {

        let adminIdSelector = $(this).data('id-admin-selector');
        $('#adminLine' + `${adminIdSelector}`).remove();

    });

    body.on('click', '.cleanAdminInputsButton', function() {

        let adminLineSelector = $(this).data('id-admin-selector');
        $('#adminName' + `${adminLineSelector}`).val('');
        $('#adminEmail' + `${adminLineSelector}`).val('');
        $('#adminRG' + `${adminLineSelector}`).val('');

    });

    $('#addNewAdmin').click(function() {

        totalOfAdminLines++;

        $('#listOfAdmins').append(`<div id="adminLine${totalOfAdminLines}" class="row p-1 strippedAdminLine">
        <div class="col-12 col-sm-3">
        <div class="form-group">
        <label for="adminName1">Nome</label> 
        <input type="text" name="adminName[]" id="adminName${totalOfAdminLines}" value="" placeholder=" Nome" class="pl-1 form-control">
        </div>
        </div> 
        <div class="col-12 col-sm-3">
        <div class="form-group">
        <label for="adminEmail${totalOfAdminLines}">E-mail</label>
         <input type="email" name="adminEmail[]" id="adminEmail${totalOfAdminLines}" value="" placeholder=" E-mail" class="pl-1 form-control">
         </div>
         </div>
         <div class="col-12 col-sm-3">
         <div class="form-group ">
         <label for="adminRG${totalOfAdminLines}">RG</label>
          <input type="number" name="adminRG[]" id="adminRG${totalOfAdminLines}" placeholder="RG" class="pl-1 form-control">
          </div>
          </div>
        <div class="col-12 col-sm-3">
        <label for="adminActions0">Ações</label>
         <div id="adminActions1" class="row">
         <a data-id-admin-selector="${totalOfAdminLines}" class="ml-3 btn btn-danger-alternative removeAdminButton"><i class="fa fa-trash"></i> Remover</a>
          <a data-id-admin-selector="${totalOfAdminLines}" class="ml-3 btn btn-warning-alternative cleanAdminInputsButton"><i class="fa fa-eraser"></i> Limpar</a>
          </div>
          </div>`);

    });

    /*Validates if all the created inputs for admins are filled*/
    function checkIfHaveEmptyInputsInAdminInformartions(){

        /*Check if there's no one administrator */
        if(adminNameSelector.length === 0 || adminEmailSelector.length === 0){
            return true;
        }else {
            try {
                /*Check ever administrator line for his name length (if the input is filled) */
                adminNameSelector.each(function () {
                    if ($(this).val().length === 0) {
                        throw true;
                    }
                });

                /*Check ever administrator line for his e-mail length (if the input is filled) */
                adminEmailSelector.each(function () {
                    if ($(this).val().length === 0) {
                        validationError = true;
                        throw true;
                    }
                });

                /*Check ever administrator line for his e-mail length (if the input is filled) */
                adminRGSelector.each(function () {
                    if ($(this).val().length === 0) {
                        validationError = true;
                        throw true;
                    }
                });

                return false;

            } catch (e) {
                return true;
            }
        }
    }



});
