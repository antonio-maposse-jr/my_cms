
document.addEventListener('turbo:load', loadLanguageTranslateData);
let translationId =$('#translationManagerID').val()
let translationLang = $('#translationManagerLanguageName').val();
let translationFile = $('#translationManagerFileName').val();

function loadLanguageTranslateData() {
    $('.translateLanguage,#subFolderFiles').select2();
    translationId =$('#translationManagerID').val()
    translationLang = $('#translationManagerLanguageName').val();
    translationFile = $('#translationManagerFileName').val();
    
     listen('click', '#languageTranslation', function (){
       
         // let url = route('languages.translation',id)+'?';
     })

    listen('change', '.translateLanguage', function () {
        translationLang = $(this).val();
        if (translationLang == '') {
            Turbo.visit(route('languages.translation',translationId));
        } else {
            Turbo.visit(route('languages.translation',translationId)  +
                '?name=' + translationLang + '&file=' + translationFile);
        }
    });

    listen('change', '#subFolderFiles', function () {
        translationFile = $(this).val();
        if (translationFile == '') {
            Turbo.visit(route('languages.translation',translationId));
        } else {
            Turbo.visit(route('languages.translation',translationId)  + '' +
                '?name=' + translationLang + '&file=' + translationFile);
        }
    });
};

    listen('click', '.addLanguageModal', function () {
        $('#addModal').appendTo('body').modal('show');
    });

    listen('hidden.bs.modal','#addModal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
    });
