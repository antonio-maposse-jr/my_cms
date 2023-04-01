const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.
    // postCss('resources/css/app.css', 'public/css', [
    //     require('postcss-import'),
    //     require('tailwindcss'),
    //     require('autoprefixer'),
    // ]).
    css('resources/assets/css/newstyle.css', 'public/assets/css/').
    css('resources/assets/css/audio.css', 'public/assets/css/').
    css('node_modules/lightbox2/src/css/lightbox.css', 'public/assets/css/').
    css('node_modules/@yaireo/tagify/dist/tagify.css', 'public/assets/css/');

// theme images
mix.copyDirectory('resources/theme/images', 'public/images')
mix.copyDirectory('resources/theme/webfonts', 'public/assets/webfonts')
mix.copyDirectory('resources/theme/webfonts', 'public/webfonts')
mix.copyDirectory('resources/theme/fonts', 'public/fonts')
mix.copyDirectory('resources/assets/js/skins', 'public/assets/js/skins')

// mix.babel('node_modules/masonry-layout/dist/masonry.pkgd.min.js',
//     'public/assets/js/masonry.pkgd.min.js');
// mix.babel('node_modules/@simonwep/pickr/dist/pickr.min.js',
//     'public/assets/js/pickr.min.js');
// mix.babel('node_modules/chart.js/dist/chart.js',
//     'public/assets/js/chart.js');
// mix.babel('node_modules/@yaireo/tagify/dist/tagify.js',
//     'public/assets/js/tagify.js');
// mix.babel('node_modules/sortablejs/Sortable.js',
//     'public/assets/js/sortable.js');
// third-party css
mix.styles([
    'resources/theme/css/third-party.css',
    // 'node_modules/intl-tel-input/build/css/intlTelInput.css',
    'public/web/plugins/custom/tinymce/skins/ui/oxide/skin.css',
    'public/web/plugins/custom/tinymce/skins/ui/oxide/content.css',
    'public/web/plugins/custom/tinymce/skins/content/default/content.css',
    'node_modules/@yaireo/tagify/dist/tagify.css',
    'node_modules/emojionearea/dist/emojionearea.min.css',
], 'public/assets/css/third-party.css')

// light theme css
mix.styles('resources/theme/css/style.css','public/assets/css/style.css');
mix.styles('resources/theme/css/plugins.css', 'public/assets/css/plugins.css');

// dark theme css
mix.styles('resources/theme/css/style.dark.css','public/assets/css/style.dark.css');
mix.styles('resources/theme/css/plugins.dark.css', 'public/assets/css/plugins.dark.css');

// third-party js
mix.scripts([
    'resources/theme/js/vendor.js',
    'resources/theme/js/plugins.js',
    'node_modules/@yaireo/tagify/dist/tagify.js',
    'node_modules/chart.js/dist/chart.js',
    'node_modules/sortablejs/Sortable.js',
    'public/web/plugins/custom/tinymce/tinymce.bundle.js',
    'node_modules/@simonwep/pickr/dist/pickr.min.js',
    'node_modules/emojionearea/dist/emojionearea.min.js',
], 'public/assets/js/third-party.js').version();

mix.sass('resources/assets/css/full-screen.scss', 'assets/css/full-screen.css').version()
// sass('resources/assets/css/style.scss', 'assets/css/style.css').
//     sass('resources/assets/css/web/custom.scss', 'assets/css/web/custom.css').
//     sass('resources/assets/css/custom.scss', 'assets/css/custom.css').
//     sass('resources/assets/css/app.scss', 'assets/css/app.css').
//     sass('resources/assets/css/web/homepage.scss',
//         'assets/css/web/homepage.css').
//     sass('resources/assets/css/web/gallery-page.scss',
//         'assets/css/web/gallery-page.css').
//     sass('resources/assets/css/full-screen.scss', 'assets/css/full-screen.css').
//     version();

// mix.js('resources/assets/js/custom/custom.js',
//         'public/assets/js/custom/custom.js').
//     js('resources/assets/js/custom/helpers.js',
//         'public/assets/js/custom/helpers.js').
//     js('resources/assets/js/roles/roles.js',
//         'public/assets/js/roles/roles.js').
//     js('resources/assets/js/settings/settings.js',
//         'public/assets/js/settings/settings.js').
//     js('resources/assets/js/categories/categories.js',
//         'public/assets/js/categories/categories.js').
//     js('resources/assets/js/seoTools/seoTools.js',
//         'public/assets/js/seoTools/seoTools.js').
//     js('resources/assets/js/sub_category/sub_category.js',
//         'public/assets/js/sub_category/sub_category.js').
//     js('resources/assets/js/poll/poll.js',
//         'public/assets/js/poll/poll.js').
//     js('resources/assets/js/dashboard/dashboard.js',
//         'public/assets/js/dashboard/dashboard.js').
//     js('resources/assets/js/staff/staff.js',
//         'public/assets/js/staff/staff.js').
//     js('resources/assets/js/page/page.js',
//         'public/assets/js/page/page.js').
//     js('resources/assets/js/page/creat-edit.js',
//         'public/assets/js/page/creat-edit.js').
//     js('resources/assets/js/album-category/album-category.js',
//         'public/assets/js/album-category/album-category.js').
//     js('resources/assets/js/users/user-profile.js',
//         'public/assets/js/users/user-profile.js').
//     js('resources/assets/js/menu/menu.js',
//         'public/assets/js/menu/menu.js').
//     js('resources/assets/js/navigation/navigation.js',
//         'public/assets/js/navigation/navigation.js').
//     js('resources/assets/js/album/album.js',
//         'public/assets/js/album/album.js').
//     js('resources/assets/js/comment/comment.js',
//         'public/assets/js/comment/comment.js').
//     js('resources/assets/js/languages/languages.js',
//         'public/assets/js/languages/languages.js').
//     js('resources/assets/js/languages/language_translate.js'
//         , 'public/assets/js/languages/language_translate.js').
//     js('resources/assets/js/gallery/gallery.js'
//         , 'public/assets/js/gallery/gallery.js').
//     js('resources/assets/js/gallery/create_edit.js'
//         , 'public/assets/js/gallery/create_edit.js').
//     js('resources/assets/js/side_bar_menu_search/side_bar_menu_search.js'
//         , 'public/assets/js/side_bar_menu_search/side_bar_menu_search.js').
//     js('resources/assets/js/add_post/create_edit.js'
//         , 'public/assets/js/add_post/create_edit.js').
//     js('resources/assets/js/app.js'
//         , 'public/assets/js/app.js').
//     js('resources/assets/js/web/custom.js'
//         , 'public/assets/js/web/custom.js').
//     js('resources/assets/js/news_letter/news_letter.js'
//         , 'assets/js/news_letter/news_letter.js').
//     js('node_modules/lightbox2/src/js/lightbox.js'
//         , 'public/assets/js/lightbox2/lightbox.js').
//     js('resources/assets/js/front/home.js'
//         , 'assets/js/front/home.js').
//     js('resources/assets/js/front/gallery-page.js'
//         , 'assets/js/front/gallery-page.js').
//     js('resources/assets/js/contact/contact.js'
//         , 'assets/js/contact/contact.js').
//     js('resources/assets/js/fullscreen/fullscreen.js',
//     'public/assets/js/fullscreen/fullscreen.js');

mix.copyDirectory('node_modules/lightbox2/src/images',
    'public/front_web/images').version();

mix.sass('resources/assets/scss/custom.scss', 'public/front_web/css/custom.css');
mix.sass('resources/assets/scss/custom-dark.scss', 'public/front_web/css/custom-dark.css');

//front theme
// mix.sass('resources/assets/front/scss/custom.scss', 'public/front_web/build/scss/custom.css');
// mix.sass('resources/assets/front/scss/dark-mode.scss', 'public/front_web/build/scss/dark-mode.css');
// mix.sass('resources/assets/front/scss/contact-us.scss', 'public/front_web/build/scss/contact-us.css');
// mix.sass('resources/assets/front/scss/gallery.scss', 'public/front_web/build/scss/gallery.css');
// mix.sass('resources/assets/front/scss/gallery-details.scss', 'public/front_web/build/scss/gallery-details.css');
// mix.sass('resources/assets/front/scss/home.scss', 'public/front_web/build/scss/home.css');
// mix.sass('resources/assets/front/scss/layout.scss', 'public/front_web/build/scss/layout.css');
// mix.sass('resources/assets/front/scss/news-details.scss', 'public/front_web/build/scss/news-details.css');
// mix.sass('resources/assets/front/scss/sports.scss', 'public/front_web/build/scss/sports.css');
// mix.sass('resources/assets/front/scss/terms&conditions.scss', 'public/front_web/build/scss/terms&conditions.css');


mix.sass('resources/assets/front/scss/custom.scss', 'public/front/scss/custom.css');
// mix.sass('resources/assets/front/scss/dark-mode.scss', 'public/front/scss/dark-mode.css');
// mix.sass('resources/assets/front/scss/contact-us.scss', 'public/front/scss/contact-us.css');
// mix.sass('resources/assets/front/scss/gallery.scss', 'public/front/scss/gallery.css');
// mix.sass('resources/assets/front/scss/gallery-details.scss', 'public/front/scss/gallery-details.css');
// mix.sass('resources/assets/front/scss/home.scss', 'public/front/scss/home.css');
// mix.sass('resources/assets/front/scss/layout.scss', 'public/front/scss/layout.css');
// mix.sass('resources/assets/front/scss/news-details.scss', 'public/front/scss/news-details.css');
// mix.sass('resources/assets/front/scss/sports.scss', 'public/front/scss/sports.css');
// mix.sass('resources/assets/front/scss/terms&conditions.scss', 'public/front/scss/terms&conditions.css');

// mix.styles('node_modules/lightbox2/src/css/lightbox.css', 'public/front_web/css/lightbox.css');
//
mix.babel('node_modules/vanilla-lazyload/dist/lazyload.js',
    'public/assets/js/lazyload/lazyload.js');



mix.js([
    'resources/assets/js/turbo.js',
    'resources/assets/js/custom/helpers.js',
    'resources/assets/js/custom/custom.js',
    'resources/assets/js/roles/roles.js',
    'resources/assets/js/settings/settings.js',
    'resources/assets/js/categories/categories.js',
    'resources/assets/js/seoTools/seoTools.js',
    'resources/assets/js/sub_category/sub_category.js',
    'resources/assets/js/poll/poll.js',
    'resources/assets/js/dashboard/dashboard.js',
    'resources/assets/js/staff/staff.js',
    'resources/assets/js/page/page.js',
    // 'resources/assets/js/page/creat-edit.js',
    'resources/assets/js/album-category/album-category.js',
    'resources/assets/js/users/user-profile.js',
    'resources/assets/js/menu/menu.js',
    'resources/assets/js/navigation/navigation.js',
    'resources/assets/js/album/album.js',
    'resources/assets/js/comment/comment.js',
    'resources/assets/js/languages/languages.js',
    'resources/assets/js/languages/language_translate.js',
    'resources/assets/js/gallery/gallery.js',
    'resources/assets/js/gallery/create_edit.js',
    'resources/assets/js/side_bar_menu_search/side_bar_menu_search.js',
    'resources/assets/js/add_post/create_edit.js',
    'resources/assets/js/news_letter/news_letter.js',
    'resources/assets/js/contact/contact.js',
    'resources/assets/js/fullscreen/fullscreen.js',
    'resources/assets/js/rss-feed/create_edit.js',
    'resources/assets/js/ad_banner/ad_banner.js',
    'resources/assets/js/bulk_post/bulk-post.js',
    'resources/assets/js/plan/plans.js',
    'resources/assets/js/premium_doc/premiumDoc.js',
    'resources/assets/js/subscription/upgrade.js',
    'resources/assets/js/emoji/emoji.js',
],'public/assets/js/pages.js').version();

mix.scripts([
    'resources/theme/js/vendor.js',
    'resources/theme/js/plugins.js',
    'public/front_web/js/swiper.min.js',
    'public/front_web/js/slick.min.js',
    'public/front_web/js/toastr.min.js',
    'public/front_web/js/lightbox.js',
    'public/messages.js',
    'node_modules/masonry-layout/dist/masonry.pkgd.min.js',
    'node_modules/amplitudejs/dist/amplitude.js',
    'public/front_web/js/jquery.mixitup.min.js',
    'node_modules/vanilla-lazyload/dist/lazyload.js'
    ],'public/assets/js/front-third-party.js');

mix.js([
    'resources/assets/js/turbo.js',
    'resources/assets/js/custom/helpers.js',
    'resources/assets/js/web/custom.js',
    'resources/assets/js/front/gallery-page.js',
    'resources/assets/js/front/video-page.js',
    'resources/assets/js/front/audio.js',
    'resources/assets/js/front/home.js',
    'resources/assets/js/post-reaction/post_reaction.js',
],'public/assets/js/front-pages.js')
//
mix.styles([
    'public/front_web/css/all.min.css',
    'public/front_web/scss/bootstrap.css',
    'public/front_web/css/toastr.css',
    'public/front_web/css/slick.css',
    'public/front_web/css/slick-theme.css',
    'node_modules/lightbox2/src/css/lightbox.css',
    'public/assets/css/lightbox.css',
    'public/front_web/css/swiper.min.css',
    'resources/assets/css/audio.css'
],'public/css/front-third-party.css');


mix.sass('resources/assets/front/scss/main.scss' ,'public/css/front-pages.css');

mix.js([
    'resources/assets/js/custom/helpers.js',
    'resources/assets/js/users/user-profile.js',
    'resources/assets/js/custom/custom.js',
    'resources/assets/js/side_bar_menu_search/side_bar_menu_search.js',
],'public/assets/js/auth-pages.js')
