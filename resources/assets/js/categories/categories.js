'use strict';

document.addEventListener('turbo:load', loadCategoryData);


function loadCategoryData() {

    let categoryTableName = $('#categoryTable');

    $('#categoriesLanguageId').select2({
        width: '100%',
        dropdownParent: $('#addCategoriesModal')
    });
    $('#languageEditId').select2({
        width: '100%',
        dropdownParent: $('#editCategoriesModal')
    });
}

listen('keyup',"#categoriesName,#editCategoriesName",function() {
    var Text = $.trim($(this).val());
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
    $("#categoriesSlug").val(Text);
    $('#editSlugHide').val(Text);
    $("#editCategoriesSlug").val(Text);
    $('#slugHide').val(Text);
});

listen('click', '.edit-category-btn', function (event) {
    let categoryId = $(event.currentTarget).data('id');
    renderCategoryData(categoryId);
});

function renderCategoryData(id) {
    $.ajax({
        url: route('categories.index') + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let data = result.data.category
                $('#editCategoryIdHidden').val(data.id);
                let ele = document.createElement('textarea')
                ele.innerHTML = data.name
                $('#editCategoriesName').val(ele.value);
                $('#editCategoriesSlug').val(data.slug);
                $('#editCategoriesSlugHide').val(data.slug);
                // editPickr.setColor(result.data.color)
                $('#CategoriesLanguageEditId').val(data.lang_id).trigger('change.select2');
                if (data.show_in_menu == 1) {
                    $('.is-active-menu').val(1).prop('checked', true);
                }
                if (data.show_in_home_page == 1) {
                    $('.is-active-home').val(1).prop('checked', true);
                }
                if (result.data.post_count > 0){
                    $('.category-warning').removeClass('d-none')
                }
                $('#editCategoriesModal').modal('show');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listen('hidden.bs.modal', '#addCategoriesModal', function () {
    resetModalForm('#addNewCategories');
    $('#categoriesLanguageId').val(null).trigger('change');
});

listen('hidden.bs.modal', '#editCategoriesModal', function () {
    $('.is-active-menu').val(0).prop('checked', false);
    $('.is-active-home').val(0).prop('checked', false);
    $('.category-warning').addClass('d-none')
});

listen('submit', '#addNewCategories', function (event) {
    event.preventDefault();
    $.ajax({
        url: route('categories.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            $('#addCategoriesModal').modal('hide');
            displaySuccessMessage(result.message);
            window.livewire.emit('refresh');
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listen('submit', '#editCategories', function (event) {
    event.preventDefault();
    let id = $('#editCategoryIdHidden').val();
    $.ajax({
        url: route('category.update', id),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            $('#editCategoriesModal').modal('hide');
            displaySuccessMessage(result.message);
            window.livewire.emit('refresh');
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },

    });
});

listen('click', '.delete-category-btn', function (event) {

    let deleteCategoryId = $(event.currentTarget).data('id');
    deleteItem(route('category.destroy', deleteCategoryId), Lang.get('messages.gallery.category'));
});
