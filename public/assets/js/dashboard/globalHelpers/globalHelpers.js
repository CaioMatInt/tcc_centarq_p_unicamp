
    function notyMsg(type, timeout, text){
       new Noty({
           theme: 'bootstrap-v4',
           type: type,
           timeout: timeout,
           text: text
       }).show();
   }

    function notyMsgWithArrayOfErrors(type, timeout, jsonOfErrorMessages){
        let textError = '<span class="red-error-color">Atenção, os seguintes erros foram retornados:</span><p></p>';
        let arrayOfErrors = JSON.parse(jsonOfErrorMessages);
        arrayOfErrors.forEach(concatenateErrorLine);

        function concatenateErrorLine(value) {
            textError = textError + '<p class="red-error-color">' + value + '</p>';
        }

        console.log(textError);

        new Noty({
            theme: 'bootstrap-v4',
            type: type,
            timeout: timeout,
            text: textError
        }).show();
    }


    function getNowHourAndMinutesToDataTables(){
        let date = new Date();
        let min = date.getMinutes();
        let hour = date.getHours();
        return hour + '_' + min;
    }
