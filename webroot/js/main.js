$( document ).ready(function() {
    $('#js_customer_tickets_status_filter select').change(function(e){
        var url         = $(location).attr('href');
        var paramName = 'customersTicketsStatus';
        var formValue   = $(this).find('option:selected').val();
        var appendUrl =  paramName+'='+formValue;

        // case: show tickets with all status. remove status parameter from url.
        if(formValue == ""){
            var myRegExp = new RegExp( paramName+'=[0-9]?', 'i');
            url = url.replace(myRegExp,'')
            return window.location.replace(url);
        }

        var myRegExp = new RegExp( paramName+'=[0-9]', 'i');
        var hasNumber = url.search(myRegExp) >= 0;

        if(hasNumber === true){
            url = url.replace(myRegExp,appendUrl)
            return window.location.replace(url);
        }

        if (url.indexOf("?") > -1) {
            url = url + '&' + appendUrl;
        } else {
            url = url + '?' + appendUrl;
        }

        return window.location.replace(url);
    })
    
    $('#js_add_customers_survey_form').change(function(e){
       $(this).submit();
    });


});


