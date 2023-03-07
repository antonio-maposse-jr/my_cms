'use strict';

document.addEventListener('turbo:load', loadSubCategoryData);

function loadSubCategoryData() {

    let subCategoryTableName = $('#SubCategoryTable');

    listen('click', '.edit-sub-category-btn', function (event) {
        let categoryId = $(event.currentTarget).data('id');
        renderSubCategoryData(categoryId);
    });

    listen('click', '.edit-btn', function (event) {
        let categoryId = $(event.currentTarget).data('id');
        renderSubCategoryData(categoryId);
    });

    function renderSubCategoryData(id) {
        $.ajax({
            url: route('sub-categories.edit', id),
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#subCategoryID').val(result.data.id);
                    let ele = document.createElement('textarea')
                    ele.innerHTML = result.data.name
                    $('#editSubCatName').val(ele.value);
                    $('#editSubCatSlug').val(result.data.slug);
                    $('#editSubCatSlugHide').val(result.data.slug);
                    $('#editSubCatLanguageId').val(result.data.lang_id).trigger('change.select2');
                    $('#editCategoryId').val(result.data.parent_category_id).trigger('change.select2');
                    if (result.data.show_in_menu == 1) {
                        $('.is-active-menu').val(1).prop('checked', true);
                    }
                    $('#EditSubCategoryModal').modal('show');
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    listen('keyup',"#subCatName,#editSubCatName",function() {
        var Text = $.trim($(this).val());
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#subCatSlug").val(Text);
        $('#subCatSlugHide').val(Text);
        $('#editSubCatSlug').val(Text);
        $('#editSubCatSlugHide').val(Text);
    });

    listen('hidden.bs.modal', '#AddSubCategoryModal', function () {
        resetModalForm('#addNewSubCategories');
        $('#subCatLanguageId,#categoryId').val(null).trigger('change');
    });

    listen('click', '#AddSubCategoryModal', function () {
        $('#AddSubCategoryModal').modal('show');
    });

    listen('hidden.bs.modal', '#EditSubCategoryModal', function () {
        $('.is-active-menu').val(0).prop('checked', false);
    });

    $('#categoryId,#subCatLanguageId').select2({
        width: "100%",
        dropdownParent: $('#AddSubCategoryModal')
    });

    $('#editCategoryId,#editSubCatLanguageId').select2({
        width: "100%",
        dropdownParent: $('#EditSubCategoryModal')
    });
}

listen('submit', '#addNewSubCategories', function (event) {
    event.preventDefault();
    $('#subCateBtnSave').attr('disabled',true);
    $.ajax({
        url: route('sub-categories.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            $('#AddSubCategoryModal').modal('hide');
            $('#addNewSubCategories').trigger('reset');
            $('#subCateBtnSave').attr('disabled',false);
            displaySuccessMessage(result.message);
            window.livewire.emit('refresh');
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            $('#subCateBtnSave').attr('disabled',false);
        },
    });
});

listen('submit', '#editNewSubCategories', function (event) {
    event.preventDefault();
    $('#editSubCateBtnSave').attr('disabled',true)
    let id = $('#subCategoryID').val();
    $.ajax({
        url: route('sub-categories.update', id),
        type: 'PUT',
        data: $(this).serialize(),
        success: function (result) {
            $('#EditSubCategoryModal').modal('hide');
            displaySuccessMessage(result.message);
            $('#editSubCateBtnSave').attr('disabled',false)
            window.livewire.emit('refresh');
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            $('#editSubCateBtnSave').attr('disabled',false)
        },

    });
});

listen('click', '.delete-sub-category-btn', function (event) {
    let subCategoryId = $(event.currentTarget).data('id');
    deleteItem(route('sub-categories.destroy', subCategoryId), Lang.get('messages.post.sub_category'), 'SubCategory');
});
