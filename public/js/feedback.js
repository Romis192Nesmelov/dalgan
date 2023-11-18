$(document).ready(function ($) {
    var body = $('body'),
        formModal = $('form'),
        agree = $('input[name=i_agree]');

    agree.change(function () {
        let button = $(this).parents('form').find('button[type=submit]');
        if (agree.is(':checked')) button.removeAttr('disabled');
        else button.attr('disabled','disabled');
    });

    $('button[type=submit]').click(function(e) {
        e.preventDefault();
        let formData = new FormData,
            form = $(this).parents('form');

        if (!agree.is(':checked')) return false;

        form.find('input, textarea, select').each(function () {
            let self = $(this);
            if (self.attr('type') === 'file') formData.append(self.attr('name'),self[0].files[0]);
            else if (self.attr('type') === 'checkbox' || self.attr('type') === 'radio') formData = processingCheckFields(formData,self);
            else formData = processingFields(formData,self);
        });

        $('.error').css('display','none').html('');
        form.find('input, select, textarea, button').attr('disabled','disabled');
        addLoader();

        $.ajax({
            url: form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                formModal.modal('hide');
                unlockAll(body,form);
                form.find('input, textarea').val('');

                $('#feedback-modal').modal('hide');
                let messageModal = $('#message-modal');
                messageModal.find('h4').html(data.message);
                messageModal.modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jQuery.parseJSON(jqXHR.responseText),
                    replaceErr = {
                        'phone':'«Телефон»',
                        'email':'«E-mail»',
                        'name':'«Имя»'
                    };

                $.each(response.errors, function (field, errorMsg) {
                    let errorBlock = form.find('.error.'+field);
                    errorMsg = errorMsg[0];
                    $.each(replaceErr, function (src,replace) {
                        errorMsg = errorMsg.replace(src,replace);
                    });
                    errorBlock.css('display','block').html(errorMsg);
                });
                unlockAll(body,form);
            }
        });
    });
});

const processingFields = (formData, inputObj) => {
    if (inputObj.length) {
        $.each(inputObj, function (key, obj) {
            if (obj.type !== 'checkbox' && obj.type !== 'radio') {
                formData.append(obj.name,obj.value);
            }
        });
    }
    return formData;
}

const processingCheckFields = (formData, inputObj) => {
    if (inputObj.length) {
        inputObj.each(function(){
            let self = $(this);
            if(self.is(':checked')) {
                formData.append(self.attr('name'),self.val());
            }
        });
    }
    return formData;
}

const unlockAll = (body,form) => {
    form.find('input, select, textarea, button').removeAttr('disabled');
    removeLoader();
    body.css({
        'overflow':'auto',
        'padding-right':0
    });
}
