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

    $('.js-edit-survey-question-modal').click(function(e){
        e.preventDefault();

        var url = $(this).attr('href');
        $.ajax({
            url: url,
        }).done(function(res) {
            $('body').getModalHtml({'headertitle':"Edit Question"});
            $('.modal-body').append(res);
            $('.modal').modal();
        });

    });

    $('body').on('submit','.surveysQuestions form',function(e){
        e.preventDefault();

        var $form = $( this ),
            url = $form.attr( "action" );

        $.ajax({
            url: url,
            method: "POST",
            data : $form.serialize()
        }).done(function(response) {
            var response=jQuery.parseJSON(response);
            if(typeof response =='object'){
                $('.modal-body').html(response.message);
            } else {
                $('.modal-body').html(response);
            }
        });

    })


    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).data('bs.modal', null);
        $('#ajax-modal').remove();
    });

    $( ".survey-questions-sortable tbody" ).sortable({
        stop: function (event, ui) {
            $(this).find("tr").each(function(index){
                $(this).data('position', index);
                $(this).find('.survey_question_pos').val(index);
            })
        }

    });
});

 $.fn.getModalHtml = function(options){

     var settings = $.extend({
       headertitle: "Headline",
         footerhtml :""
     }, options );

    var modalHeader =  $('<div>',{class:'modal-header'}).html(
        $('<button type="button" class="close" data-dismiss="modal">&times;</button>').add(
            $('<h4>', {class:"modal-title"}).html(settings.headertitle)
        )
    );
    var modalBody =  $('<div>',{class:'modal-body'});
    var modalFooter =  $('<div>',{class:'modal-footer'}).html(settings.footerhtml);

    var modal = $('<div>',{id:'ajax-modal'}).html(
        $('<div>',{class:'modal'}).html(
            $('<div>',{class:'modal-dialog'}).html(
                $('<div>',{class:'modal-content'}).html(
                    modalHeader.add(modalBody).add(modalFooter)
                )
            )
        )
    );
     $('body').append(modal);
    //return modal;
}

