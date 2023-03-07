'use strict';
document.addEventListener('turbo:load', loadLanguageData);
function loadLanguageData() {
    let languageTable = '#languagesTbl';

    if ($('#addLanguage').length) {
        listen('click', '#addLanguage', function (event) {
            $('#addLanguageModal').appendTo('body').modal('show')
        });
    }
    if ($('.language-delete-btn').length) {
        listen('click', '.language-delete-btn', function (event) {
            let languageId = $(event.currentTarget).attr('data-id');
            deleteItem(route('languages.destroy', languageId), Lang.get('messages.common.language'));
        });
    }
    if($('#addLanguageModal').length) {
        listen('hidden.bs.modal','#addLanguageModal', function () {
            resetModalForm('#addLanguageForm', '#languageValidationErrorsBox');
        });
    }
    if ($('#editLanguageModal').length) {
        listen('hidden.bs.modal','#editLanguageModal', function () {
            resetModalForm('#editLanguageForm', '#editValidationErrorsBox');
        });
    }


    listen('click', '.edit-language-btn', function (event) {
        let languageId = $(event.currentTarget).data('id');
        renderData(languageId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: route('languages.edit',id),
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#languageId').val(result.data.id);
                    $('#editLanguage').val(result.data.name);
                    $('#editIso').val(result.data.iso_code);
                    $('#editLanguageModal').appendTo('body').modal('show');
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    };
}

listen('submit', '#addLanguageForm', function (e) {
    e.preventDefault();
    processingBtn('#addLanguageForm', '#languageBtnSave', 'loading');
    $.ajax({
        url: route('languages.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addLanguageModal').modal('hide');
                window.livewire.emit('refresh');
                setTimeout(function () {
                    $('#languageBtnSave').button('reset');
                }, 1000);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            setTimeout(function () {
                $('#languageBtnSave').button('reset');
            }, 1000);
        },
        complete: function () {
            setTimeout(function () {
                processingBtn('#addLanguageForm', '#languageBtnSave');
            }, 1000);
        },
    });
});

listen('submit', '#editLanguageForm', function (event) {
    event.preventDefault();
    processingBtn('#editLanguageForm', '#btnEditSave', 'loading');
    const id = $('#languageId').val();
    $.ajax({
        url: route('languages.update', id),
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editLanguageModal').modal('hide');
                window.livewire.emit('refresh');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#editLanguageForm', '#btnEditSave');
        },
    });
});


