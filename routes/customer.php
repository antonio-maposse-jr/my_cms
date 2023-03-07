<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerPostController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware('auth', 'xss', 'verified.user')->group(function () {
    Route::group(['middleware' => ['subscription']], function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
        Route::resource('customer-posts', PostController::class);
        Route::post('posts/image-store', [PostController::class, 'imgUpload'])->name('editor.post-image-upload');
        Route::get('post-upload-image-get', [PostController::class, 'imageGet'])->name('customer-post-upload-image-get');
        Route::post('open-ai',[PostController::class, 'openAi'])->name('customer-open_ai');
        Route::get('post/image/{id}', [PostController::class, 'imageDelete'])->name('post-image.destroy');
        Route::get('post-format', [PostController::class, 'postFormat'])->name('customer.post_format');
        Route::get('post-type', [PostController::class, 'postType'])->name('customer.post_type');
        Route::get('post-comments', [CommentController::class, 'index'])->name('customer.post-comments.index');
        Route::delete('post-comments/{comment}',
            [CommentController::class, 'delete'])->name('customer.post-comments.destroy');
        Route::get('customer-comment-status/{key}', [CommentController::class, 'commentStatus'])->name('customer.comment-status');
    });
    Route::post('get-video', [PostController::class, 'getVideoByUrl'])->name('get-video-by-url');
    Route::post('posts-subcategory', [PostController::class, 'categoryFilter'])->name('posts.categoryFilter');
    Route::post('posts/language', [PostController::class, 'language'])->name('posts.language');
    Route::post('posts/category', [PostController::class, 'category'])->name('posts.category');
    Route::get('/manage-subscription', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::get('manage-subscription/upgrade',
        [SubscriptionController::class, 'upgrade'])->name('subscription.upgrade');
    Route::get('choose-payment-type/{planId}/{context?}/{fromScreen?}',
        [SubscriptionController::class, 'choosePaymentType'])->name('choose.payment.type');
    //stripe
    Route::post('stripe/subscription-purchase', [StripeController::class, 'purchase'])->name('stripe.purchase');
    Route::post('purchase-subscription',
        [SubscriptionController::class, 'purchaseSubscription'])->name('purchase-subscription');
    Route::get('payment-success', [SubscriptionController::class, 'paymentSuccess'])->name('payment-success');


//paypal
    Route::get('paypal-onboard', [PaypalController::class, 'onBoard'])->name('paypal.init');
    Route::get('paypal-payment-success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('paypal-payment-failed', [PaypalController::class, 'failed'])->name('paypal.failed');

    //manual
    Route::post('subscription-purchase/{plan}/manual',
        [SubscriptionController::class, 'manualPay'])->name('subscription.manual');
});
Route::middleware('auth', 'verified.user', 'xss')->group(function () {
    Route::get('failed-payment', [StripeController::class, 'handleFailedPayment'])->name('failed-payment');
});
