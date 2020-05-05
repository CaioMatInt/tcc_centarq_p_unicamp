$( document ).ready(function() {

    let body = $('body');
    let totalOfAdminLines = 1;

    body.on('click', '.removeAdminButton', function() {

        let adminIdSelector = $(this).data('id-admin-selector');
        $('#adminLine' + `${adminIdSelector}`).remove();

    });

    body.on('click', '.cleanAdminInputsButton', function() {

        let adminLineSelector = $(this).data('id-admin-selector');
        $('#adminName' + `${adminLineSelector}`).val('');
        $('#adminEmail' + `${adminLineSelector}`).val('');
        $('#adminImage' + `${adminLineSelector}`).val('');

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
         <label for="adminImage${totalOfAdminLines}">Imagem</label>
          <input type="file" name="adminImage[]" id="adminImage${totalOfAdminLines}" placeholder="Imagem" accept="image/*" class="form-control btn btn-outline-info btn-fw">
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

});
