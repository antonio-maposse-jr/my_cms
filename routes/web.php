<?php

use App\Http\Controllers\AdSpacesController;
use App\Http\Controllers\AlbumCategoriesController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CashPaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmojiController;
use App\Http\Controllers\DBDownloadController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailSettingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PremiumDocumentsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\seoToolsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\PremiumDocuments;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//
//Route::get('/', function () {
//    return (! Auth::check()) ? view('auth.login') : Redirect::to(getDashboardURL());
//})->name('login');

// Update profile
Route::middleware('auth', 'xss', 'verified.user')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.setting');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('update.profile.setting');
    Route::put('/change-user-password', [UserController::class, 'changePassword'])->name('user.changePassword');
});

Route::get('/login/{provider}', [SocialAuthController::class, 'redirectToSocial'])->name('social.login');
Route::get('/login/{provider}/callback', [SocialAuthController::class, 'handleSocialCallback']);

Route::prefix('admin')->middleware('auth', 'xss', 'verified.user')->group(function () {
    //admin dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/chart', [DashboardController::class, 'getChart'])->name('dashboard.chart');

    Route::get('/generate-sitemap', function () {
        \Illuminate\Support\Facades\Artisan::call('generate:sitemap');

        dump("Sitemap generated successfully");

        sleep(2);

        return redirect(route('admin.dashboard'));
    });

    //category
    Route::middleware('permission:manage_categories')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::post('categories/{category}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    Route::middleware('permission:cash_payment')->group(function () {
        Route::get('cash-payment', [CashPaymentController::class, 'index'])->name('cash-payment');
        Route::get('subscribed-user-plans',
            [SubscriptionController::class, 'subscribedUserPlans'])->name('subscribed.user.plans');
        Route::get('/subscribedPlan/{id}/edit',
            [SubscriptionController::class, 'userSubscribedPlanEdit'])->name('subscription.user.plan.edit');
        Route::get('/subscribedPlan/{id}/update',
            [SubscriptionController::class, 'userSubscribedPlanUpdate'])->name('subscription.user.plan.update');

        //sub category
        Route::get('/download-attachment/{id}', [SubscriptionController::class, 'downloadAttachment']);
    });
    Route::get('/planSubscription/{id}', [SubscriptionController::class, 'planStatus'])->name('subscription.status');
    Route::middleware('permission:manage_sub_categories')->group(function () {
        Route::resource('sub-categories', SubCategoryController::class);
    });

    //Page

    Route::middleware('permission:manage_pages')->group(function () {
        Route::resource('pages', PageController::class);
        Route::post('image-store', [PageController::class, 'imgUpload'])->name('editor.image-upload');
        Route::get('image-get', [PageController::class, 'imageGet'])->name('editor.image-get');
        Route::post('pages-visibility', [PageController::class, 'visibility'])->name('page.visibility');
        Route::get('page-image/{id}', [PageController::class, 'imageDelete'])->name('page-image.destroy');
    });

    //set Language
    Route::get('change-language/{key}', [UserController::class, 'setLanguage'])->name('change-Language');

    //update darkMode Field
    Route::get('update-dark-mode', [UserController::class, 'updateDarkMode'])->name('update-dark-mode');

    Route::get('comment-status/{key}', [CommentController::class, 'commentStatus'])->name('admin.comment-status');
    // Role route
    Route::middleware('permission:manage_roles|manage_roles_permission')->group(function () {
        Route::resource('roles', RoleController::class);
    });

    // Settings routes
    Route::middleware('permission:manage_settings')->group(function () {
        Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('setting.update');
        Route::post('/payment-settings', [SettingController::class, 'paymentUpdate'])->name('payment-setting.update');
    });

    // Contacts routes
    Route::middleware('permission:manage_contacts')->group(function () {
        Route::get('/contacts', [ContactController::class, 'listContact'])->name('contacts.index');
        Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{id}', [ContactController::class, 'removeContact'])->name('Contacts.destroy');
    });

    //Mail
    Route::middleware('permission:manage_mail_setting')->group(function () {
        Route::resource('/mails', MailSettingController::class);
        Route::post('/mails-verification', [MailSettingController::class, 'mail'])->name('mails-verification');
        Route::post('/mails-contact', [MailSettingController::class, 'contactMessage'])->name('mails.contact');
        Route::post('/mails-send-test', [MailSettingController::class, 'sendTestemail'])->name('mails-send-test');
    });
    // Staff route
    Route::middleware('permission:manage_staff')->group(function () {
        Route::resource('staff', StaffController::class);
        Route::get('resend-email/{id}', [StaffController::class, 'resendEmail'])->name('resend-email');
    });

    // album category route
    Route::middleware('permission:manage_albums_category')->group(function () {
        Route::resource('album-categories', AlbumCategoriesController::class);
    });
    //Plans
    Route::middleware('permission:manage_plans')->group(function () {
        Route::resource('plans',PlanController::class);
        Route::put('plans/{plan}/is_default',[PlanController::class, 'planMakeDefault'])->name('plan.make-default');
    });
    //Add-Post Route
    Route::middleware('permission:manage_all_post')->group(function () {
        Route::resource('posts', PostController::class);
        Route::post('posts/language', [PostController::class, 'language'])->name('posts.language');
        Route::post('posts/category', [PostController::class, 'category'])->name('posts.category');
        Route::post('posts-subcategory', [PostController::class, 'categoryFilter'])->name('posts.categoryFilter');
        Route::post('posts/image-store', [PostController::class, 'imgUpload'])->name('editor.post-image-upload');
        Route::get('post-upload-image-get', [PostController::class, 'imageGet'])->name('post-upload-image-get');
        Route::get('post/image/{id}', [PostController::class, 'imageDelete'])->name('post-image.destroy');
        Route::get('post-format', [PostController::class, 'postFormat'])->name('post_format');
        Route::get('post-type', [PostController::class, 'postType'])->name('post_type');
        Route::post('open-ai',[PostController::class, 'openAi'])->name('open_ai');
        Route::post('get-video', [PostController::class, 'getVideoByUrl'])->name('get-video-by-url');
        Route::get('bulk-post', [PostController::class, 'bulkPost'])->name('bulk-post-index');
        Route::get('bulk-post-ids-list', [PostController::class, 'idsList'])->name('bulk-post-ids-list');
        Route::get('bulk-post-documentation', [PostController::class, 'Documentation'])->name('bulk-post-documentation');
        Route::get('export', [PostController::class, 'export'])->name('export-csv');
        Route::post('bulk-post-store', [PostController::class, 'bulkPostStore'])->name('bulk-post-store');
        Route::resource('premium-documents', PremiumDocumentsController::class);
        // Route::get('premium-documents-create', [PremiumDocumentsController::class, 'create'])->name('premiumDocuments.create');
        // Route::post('premium-documents-store', [PremiumDocumentsController::class, 'store'])->name('premiumDocuments.store');
        // Route::get('premium-documents-edit', [PremiumDocumentsController::class, 'create'])->name('premiumDocuments.edit');

    });


    Route::middleware('permission:manage_rss_feeds')->group(function () {
        Route::resource('rss-feed', RssFeedController::class);
        Route::post('rss-feed/manuallyUpdate/{rssFeed}', [RssFeedController::class, 'manuallyUpdate'])->name('rss-feed.manuallyUpdate');
    });

    Route::middleware('permission:manage_albums')->group(function () {
        Route::resource('albums', AlbumController::class);
    });

    Route::middleware('permission:manage_language')->group(function () {
        Route::resource('languages', LanguageController::class);
        Route::get('languages/translation/{language}',
            [LanguageController::class, 'showTranslation'])->name('languages.translation');
        Route::post('languages/translation/{language}/update',
            [LanguageController::class, 'updateTranslation'])->name('languages.translation.update');
    });

    Route::middleware('permission:manage_menu')->group(function () {
        Route::resource('menus', MenuController::class);
        Route::post('get-menus', function () {
            return getMenus();
        })->name('get-menus');
    });


    Route::middleware('permission:manage_navigation')->group(function () {
        Route::get('navigation', [NavigationController::class, 'index'])->name('navigation.index');
        Route::post('navigation/update', [NavigationController::class, 'update'])->name('navigation.update');
        Route::post('language-change', [NavigationController::class, 'languageChange'])->name('language.change');
    });

    Route::middleware('permission:manage_polls')->group(function () {
        Route::resource('polls', PollController::class);
        Route::get('polls-vote-result/{id}', [PollController::class, 'pollResult'])->name('polls-vote-result');
    });

    //comment
    Route::middleware('permission:manage_polls')->group(function () {
        Route::get('post-comments', [CommentController::class, 'index'])->name('post-comments.index');
        Route::delete('post-comments/{comment}', [CommentController::class, 'delete'])->name('post-comments.destroy');
    });

    Route::resource('gallery-images', GalleryController::class);
    Route::get('album-list', [GalleryController::class, 'getAlbums'])->name('album-list');
    Route::get('album-category-list', [GalleryController::class, 'getCategory'])->name('album-category-list');
    Route::middleware('permission:manage_news_letter')->group(function () {
        Route::resource('news-letter', NewsLetterController::class);
    });

    // Emojis
    Route::middleware('permission:manage_emoji')->group(function () {
        Route::resource('emoji', EmojiController::class);
        Route::get('emoji-status/{id}', [EmojiController::class, 'changeEmojiStatus'])->name('emoji.status');
    });
});
Route::get('db-download', [DBDownloadController::class, 'DbDownload'])->name('db-download');
Route::prefix('admin')->middleware('auth', 'role:admin', 'verified.user')->group(function () {
    Route::middleware('permission:manage_seo_tools')->group(function () {
        // SEO tools
        Route::get('seo-tools', [seoToolsController::class, 'index'])->name('seo-tools.index');
        Route::Post('seo-tools', [seoToolsController::class, 'update'])->name('seo-tools.update');
    });

    // logs view route
//    Route::get('logs', [LogViewerController::class, 'index']);
});
Route::resource('admin/ad-spaces', AdSpacesController::class);

Route::middleware('xss','setLanguage')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('front.home');

    Route::get('/semario-pdf', [LandingPageController::class, 'semanario'])->name('front.semanarioPdf');
    Route::get('/diario-pdf', [LandingPageController::class, 'diario'])->name('front.diarioPdf');

    Route::post('/comments', [LandingPageController::class, 'saveCommentsUser'])->name('comment.store');
    Route::delete('/comments/{comment}', [LandingPageController::class, 'destroyComment'])->name('comment.destroy');
    Route::post('subscribe', [LandingPageController::class, 'saveSubscribeUser'])->name('subscribe.store');
    Route::post('language-change-home', [LandingPageController::class, 'detailPage'])->name('language.change.home');

    Route::get('p', [LandingPageController::class, 'allPosts'])->name('allPosts');
    Route::get('p/{data}', [LandingPageController::class, 'detailPage'])->name('detailPage')->middleware('analytic');
    Route::get('p/{data}/{id}', [LandingPageController::class, 'detailPage'])->name('detailPage.gallery');
    Route::get('c/{category?}/{slug?}', [LandingPageController::class, 'categoryPage'])->name('categoryPage');
    Route::get('t/{tag}', [LandingPageController::class, 'popularTagPage'])->name('popularTagPage');
    Route::get('/g/{id?}', [LandingPageController::class, 'galleryPage'])->name('galleryPage');
    Route::post('audio-detail-page', [LandingPageController::class, 'audioDetails'])->name('audioDetailPage');

    Route::get('/terms-conditions', [LandingPageController::class, 'displayTerms'])->name('page.Terms');
    Route::get('/support', [LandingPageController::class, 'displayTerms'])->name('page.support');
    Route::get('/privacy', [LandingPageController::class, 'displayTerms'])->name('page.privacy');

    Route::get('/contact-save', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    //vote poll route
    Route::post('vote-poll', [PollController::class, 'votePoll'])->name('vote.poll');

    //pages
    Route::get('page/{slug}', [PageController::class, 'showPageSlug'])->name('pages.show-page-slug');

    //reaction
    Route::post('post-reaction', [LandingPageController::class, 'postReaction'])->name('post-reaction');

    //cookie
    Route::get('cookie', [LandingPageController::class, 'declineCookie'])->name('declineCookie');

});

require __DIR__.'/auth.php';
require __DIR__.'/upgrade.php';
require __DIR__.'/customer.php';
