

document.addEventListener('turbo:load', loadMenuData);

function loadMenuData () {

    let categoryTableName = $('#categoryTable')

    listen('click', '.delete-menu-btn', function (event) {
        let deleteMenuId = $(event.currentTarget).data('id')
        deleteItem(route('menus.destroy', deleteMenuId),
            Lang.get('messages.menu.menu'))
    })
}

listenChange('.menu-status', function () {
    let showInMenu = $(this).attr('show-in-menu')
    let menuId = $(this).attr('data-id')
    window.livewire.emit('updateShowInMenu', showInMenu, menuId)
})
