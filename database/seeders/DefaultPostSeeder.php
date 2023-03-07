<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostArticle;
use App\Models\PostGallery;
use App\Models\PostSortList;
use App\Repositories\PostRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class DefaultPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // articles
        try {
            DB::beginTransaction();

            $articles = [
                [
                    'created_by' => 1,
                    'title' => 'The Coelacanth May Live for a Century. That’s Not Great News',
                    'slug' => 'the-coelacanth-may-live-for-a-century-thats-not-great-news',
                    'description' => 'Easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best',
                    'keywords' => 'The, Coelacanth, May, Live, for, Century., That’s, Not, Great, News',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 0,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 1,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'News',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 3,
                    'sub_category_id' => 2,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-1.jpg'),
                    'article_content' => '
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="380" height="253" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Cordially convinced did incommode existence',
                    'slug' => 'cordially-convinced-did-incommode-existence',
                    'description' => 'Easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best',
                    'keywords' => 'incommode',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 0,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'Rare animal,wild life',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 3,
                    'sub_category_id' => 2,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-2.jpg'),
                    'article_content' => '
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="423" height="282" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
<p><img class="images" src="'.asset('assets/image/post-image/post-19.jpg').'" width="380" height="253" /></p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Situation admitting promotion at or to perceived be',
                    'slug' => 'situation-admitting-promotion-at-or-to-perceived-be',
                    'description' => 'Denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded',
                    'keywords' => 'promotion',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 1,
                    'recommended' => 0,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'wild life',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 3,
                    'sub_category_id' => 2,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-3.jpg'),
                    'article_content' => '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="423" height="282" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="380" height="253" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Are own design entire former get should',
                    'slug' => 'are-own-design-entire-former-get-should',
                    'description' => 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it',
                    'keywords' => 'design',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 1,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'Design,music',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 2,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-5.jpg'),
                    'article_content' => '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself</p>.

<p>Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>

<p>When our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'How well do you know the famous places in the world?',
                    'slug' => 'how-well-do-you-know-the-famous-places-in-the-world',
                    'description' => 'Sed bibendum gravida ipsum ac mattis. Morbi id felis a tellus faucibus tempor. Pellentesque tellus justo',
                    'keywords' => 'world',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 1,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'Environment, Nature',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-4.jpg'),
                    'article_content' => '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself</p>.',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Decisively advantages nor expression untrammelled',
                    'slug' => 'decisively-advantages-nor-expression-untrammelled',
                    'description' => 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled',
                    'keywords' => 'advantages',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'advantages,power',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-6.jpg'),
                    'article_content' => '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="423" height="282" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="380" height="253" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of.</p>
<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Far concluded not his something extremity',
                    'slug' => 'far-concluded-not-his-something-extremity',
                    'description' => 'Far concluded not his something extremity',
                    'keywords' => 'something',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'extremity',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 2,
                    'sub_category_id' => 3,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-7.jpg'),
                    'article_content' => '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="423" height="282" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="380" height="253" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Greatly hearted has who believe',
                    'slug' => 'greatly-hearted-has-who-believe',
                    'description' => 'Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated',
                    'keywords' => 'hearted',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 0,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'believe',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 2,
                    'sub_category_id' => 3,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-8.jpg'),
                    'article_content' => '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
<p><img class="images" src="'.asset('front_web/images/default.jpg').'" width="380" height="253" /></p>
<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Idea of denouncing pleasure and praising pain was born',
                    'slug' => 'idea-of-denouncing-pleasure-and-praising-pain-was-born',
                    'description' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete ',
                    'keywords' => 'denouncing',
                    'visibility' => 1,
                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 1,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'denouncing',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 3,
                    'sub_category_id' => 2,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-9.jpg'),
                    'article_content' => '
                <p>In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>

<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>

<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                ',
                ],
                [
                    'created_by' => 1,
                    'title' => 'There are many variations of passages available',
                    'slug' => 'there-are-many-variations-of-passages-available',
                    'description' => 'More recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                    'keywords' => 'available',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'extremity',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 3,
                    'sub_category_id' => 2,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-10.jpg'),
                    'article_content' => '
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'When an unknown printer took a galley of type and scrambled',
                    'slug' => 'when-an-unknown-printer-took-a-galley-of-type-and-scrambled',
                    'description' => 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for',
                    'keywords' => 'unknown',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'unknown',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 2,
                    'sub_category_id' => 3,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-11.jpg'),
                    'article_content' => '
<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Various versions have evolved over the years, sometimes by acciden',
                    'slug' => 'various-versions-have-evolved-over-the-years-sometimes-by-acciden',
                    'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour',
                    'keywords' => 'sometimes',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'evolved',
                    'post_types' => 1,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-12.jpg'),
                    'article_content' => '
<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'Contrary to popular belief, Lorem Ipsum is not simply random text',
                    'slug' => 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-random-text',
                    'description' => 'College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word',
                    'keywords' => 'popular',
                    'visibility' => 1,
                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'random',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 3,
                    'sub_category_id' => 2,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-13.jpg'),
                    'article_content' => '
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'لم يزعم المهندسون المعماريون البحريون أبدًا أن السفينة غير قابلة للغرق',
                    'slug' => 'لم-يزعم-المهندسون-المعماريون-البحريون-أبدا-أن-السفينة-غير-قابلة-للغرق',
                    'description' => 'لم يزعم المهندسون المعماريون البحريون أبدًا أن السفينة غير قابلة للإغراق ، لكن غرق عبّارة الركاب والسيارات إستونيا في بحر البلطيق بالتأكيد لم يكن ليحدث أبدًا.',
                    'keywords' => 'المهندسون',
                    'visibility' => 1,
                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'المهندسون, البحريون',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-14.jpg'),
                    'article_content' => '<p>
تقليديا ، شدد العديد من اللغويين على أهمية إتقان الهياكل النحوية أولاً أثناء تدريس اللغة الإنجليزية. في السنوات الأخيرة ، أصبح غالبية اختصاصيي التوعية أكثر وعيًا بأخطاء هذا النهج ، واكتسبت المناهج الأخرى التي تعزز تطوير المفردات شعبية. تم اكتشاف أنه بدون مفردات لوضعها على رأس نظام القواعد ، يمكن للمتعلمين في الواقع أن يقولوا القليل جدًا على الرغم من قدرتهم على التلاعب بالبنى النحوية المعقدة في التدريبات الرياضية. من الواضح أنه لتعلم اللغة الإنجليزية ، يحتاج المرء إلى تعلم العديد من الكلمات.
</p>
<p>
المتحدثون الأصليون لديهم مفردات من حوالي 20000 كلمة لكن المتعلمين الأجانب للغة الإنجليزية يحتاجون أقل بكثير. يحتاجون فقط إلى حوالي 5000 كلمة ليكونوا مؤهلين تمامًا في التحدث والاستماع. سبب هذا العدد الصغير على ما يبدو هو طبيعة الكلمات وتكرار ظهورها في اللغة. يبدو واضحًا أن الكلمات المتكررة يجب أن تكون من بين الكلمات الأولى التي يجب تعلمها لأنها ستقابل معظم الكلمات العشر وستكون مطلوبة في الكلام أو الكتابة.
</p>',
                ],
                [
                    'created_by' => 1,
                    'title' => 'تقليديا ، شدد العديد من اللغويين على أهمية الإتقان',
                    'slug' => 'تقليديا-شدد-العديد-من-اللغويين-على-أهمية-الإتقان',
                    'description' => 'يبدو من الواضح أن الكلمات المتكررة يجب أن تكون من بين الكلمات الأولى التي يجب تعلمها لأنها ستقابل معظم الكلمات العشر وستكون مطلوبة في الكلام أو الكتابة.',
                    'keywords' => 'أهمية',
                    'visibility' => 1,
                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 0,
                    'recommended' => 0,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'العديد, أهمية',
                    'post_types' => 1,
                    'lang_id' => 2,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-15.jpg'),
                    'article_content' => '<p>التوحد هو اضطراب في نمو الدماغ يضعف التفاعل الاجتماعي والتواصل ويسبب سلوكًا مقيدًا ومتكررًا ، كل ذلك يبدأ قبل أن يبلغ الطفل سن الثالثة. تعتبر جينات التوحد معقدة ومن غير الواضح بشكل عام الجينات المسؤولة عن ذلك. يؤثر التوحد على أجزاء كثيرة من الدماغ ولكن كيفية حدوث ذلك غير مفهومة بشكل جيد. يرتبط التوحد ارتباطًا وثيقًا بالعوامل التي تسبب تشوهات خلقية. الأسباب الأخرى المقترحة ، مثل لقاحات الطفولة ، مثيرة للجدل وتفتقر فرضيات اللقاح إلى أدلة علمية مقنعة.
زاد عدد الأشخاص المعروف أنهم مصابون بالتوحد بشكل كبير منذ الثمانينيات. عادة ما يلاحظ الآباء العلامات في العامين الأولين من حياة طفلهم. يمكن أن يساعد التدخل المعرفي السلوكي المبكر الأطفال على اكتساب مهارات الرعاية الذاتية ، ومهارات التواصل الاجتماعي ، ولكن لا يوجد علاج لذلك. قلة من الأطفال المصابين بالتوحد يعيشون بشكل مستقل بعد بلوغهم سن الرشد ، لكن الأمر نفسه أصبح ناجحًا وتطورت ثقافة التوحد ، مع السعي للحصول على علاج واعتقد آخرون أن التوحد هو حالة وليست اضطرابًا.</p>',
                ],
            ];
            foreach ($articles as $post) {

                // $postImage = $post['image'];
                if (isset($post['article_content'])) {
                    $postArticleContext = $post['article_content'];
                }
                unset($post['image']);
                unset($post['article_content']);
                $newPost = Post::create($post);

//                if (isset($postImage)) {
//                    $newPost->addMediaFromUrl($postImage)->toMediaCollection(Post::IMAGE_POST,
//                        config('app.media_disc'));
//                }

                if (isset($postArticleContext)) {
                    PostArticle::create([
                        'article_content' => $postArticleContext,
                        'post_id' => $newPost['id'],
                    ]
                    );
                }

                $postArticleContext = null;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        // galleries
        try {
            DB::beginTransaction();

            $galleries = [
                [
                    'created_by' => 1,
                    'title' => 'Through weakness of will, which is the same as saying through',
                    'slug' => 'through-weakness-of-will-which-is-the-same-as-saying-through',
                    'description' => 'There anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil',
                    'keywords' => 'weakness',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 0,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'weakness',
                    'post_types' => 2,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-16.jpg'),
                    'gallery_title' => [
                        'Contrary to popular belief, Lorem Ipsum is not simply random text',
                        'Implementing these goals requires a careful examination',
                    ],
                    'gallery_images' => [
                        ('assets/image/post-image/post-1.jpg'),
                        ('assets/image/post-image/post-2.jpg'),
                    ],
                    'image_description' => [
                        'Avoids a pain that produces no resultant pleasure',
                        'The standard chunk of Lorem Ipsum used since the',
                    ],
                    'gallery_content' => [
                        'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
                        'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains',
                    ],
                ],
                [
                    'created_by' => 1,
                    'title' => 'Implementing these goals requires a careful examination',
                    'slug' => 'implementing-these-goals-requires-a-careful-examination',
                    'description' => 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have',
                    'keywords' => 'goals',
                    'visibility' => 1,
                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'goals',
                    'post_types' => 2,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-17.jpg'),
                    'gallery_title' => [
                        'Class aptent taciti sociosqu ad litora torquent per conubia nostra',
                        'Vivamus sit amet turpis at nisl elementum pellentesque',
                    ],
                    'gallery_images' => [
                        ('assets/image/post-image/post-3.jpg'),
                        ('assets/image/post-image/post-8.jpg'),
                    ],
                    'image_description' => [
                        'Donec rhoncus feugiat magna ut hendrerit',
                        'Nam sapien neque, interdum at mi quis',
                    ],
                    'gallery_content' => [
                        'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec rhoncus feugiat magna ut hendrerit. Mauris non consectetur nunc. Nam scelerisque ex a posuere porttitor. Morbi tincidunt eget odio nec pretium. Morbi aliquam, elit nec interdum commodo, metus neque tincidunt tellus, a hendrerit risus magna sit amet turpis.',
                        'Integer non cursus ligula, et varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum auctor, tellus sit amet dapibus ultricies, lorem tortor efficitur enim, et gravida eros felis et lectus. Cras a condimentum felis. Sed congue mauris vel lectus scelerisque, id rutrum velit dictum. Nam sapien neque, interdum at mi quis, viverra pellentesque metus. Etiam in ante nunc.',
                    ],
                ],
                [
                    'created_by' => 1,
                    'title' => 'NASA and ESA Astronauts Continue Installing Space Station Solar Arrays',
                    'slug' => 'nasa-and-esa-astronauts-continue-installing-space-station-solar-arrays',
                    'description' => 'Spacewalkers Shane Kimbrough of NASA (left) and Thomas Pesquet of the European Space Agency worked to install new roll out solar arrays on the space station.',
                    'keywords' => 'Astronauts',
                    'visibility' => 1,
                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 1,
                    'recommended' => 1,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'Strength',
                    'post_types' => 2,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,

                    'status' => 1,
                    'image' => ('assets/image/post-image/post-18.jpg'),
                    'gallery_title' => [
                        'Effect twenty indeed beyond for not had county',
                        'Photography Greatly hearted has who believe',
                    ],
                    'gallery_images' => [
                        ('assets/image/post-image/post-4.jpg'),
                        ('assets/image/post-image/post-5.jpg'),
                    ],
                    'image_description' => [
                        'These cases are perfectly simple and easy to distinguish',
                        'variations of passages of Lorem Ipsum',
                    ],
                    'gallery_content' => [
                        'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.',
                        'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat',
                    ],
                ],
                [
                    'created_by' => 1,
                    'title' => 'Hubble Images a Dazzling Dynamic Duo',
                    'slug' => 'hubble-images-a-dazzling-dynamic-duo',
                    'description' => 'A cataclysmic cosmic collision takes center stage in this image taken with the NASA/ESA Hubble Space Telescope.',
                    'keywords' => 'Images',
                    'visibility' => 1,
                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 0,
                    'recommended' => 0,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'Adventure',
                    'post_types' => 2,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-19.jpg'),
                    'gallery_title' => [
                        'Quisque efficitur augue eget enim malesuada auctor',
                        'Nulla consequat est tellus, non sodales ante congue facilisis',
                    ],
                    'gallery_images' => [
                        ('assets/image/post-image/post-9.jpg'),
                        ('assets/image/post-image/post-10.jpg'),
                    ],
                    'image_description' => [
                        'Maecenas quis maximus ipsum',
                        'Praesent nec purus ac nulla mollis dapibus ac at dolor',
                    ],
                    'gallery_content' => [
                        'Cras hendrerit enim ut turpis commodo, eget porta massa ullamcorper. Maecenas quis maximus ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit magna ligula, nec malesuada lectus finibus vel. Praesent varius rutrum nunc, sit amet tincidunt dolor ultrices nec.',
                        'Phasellus cursus nec massa vel mollis. Sed ut nisl vitae elit blandit tempus at ut tortor. Nullam tempor, ligula non molestie elementum, mi metus imperdiet eros, eu dictum ante lectus sed ligula. Aliquam felis risus, vestibulum sagittis dolor dapibus, laoreet luctus arcu. Donec a eros malesuada, varius augue sit amet, iaculis felis. Praesent nec purus ac nulla mollis dapibus ac at dolor. Ut in vestibulum nibh.',
                    ],
                ],
            ];
            foreach ($galleries as $post) {

                // $postImage = $post['image'];
                unset($post['image']);
                $postInputArray = Arr::only($post, [
                    'created_by', 'title', 'slug', 'description', 'keywords', 'visibility', 'how_right_column',
                    'featured', 'breaking',
                    'slider', 'recommended', 'show_registered_user', 'tags', 'optional_url', 'additional_images ',
                    'files',
                    'lang_id', 'category_id', 'sub_category_id', 'scheduled_post', 'status', 'post_types', 'section',
                    'show_on_headline',
                ]);
                $newPost = Post::create($postInputArray);

//                if (isset($postImage)) {
//                    $newPost->addMediaFromUrl($postImage)->toMediaCollection(Post::IMAGE_POST,
//                        config('app.media_disc'));
//                }

                $postRepo = app()->make(PostRepository::class);
                $postGalleryArray = Arr::only($post,
                    ['gallery_title', 'image_description', 'gallery_content', 'gallery_images']);
                $galleyItemInputs = $postRepo->prepareInputForItem($postGalleryArray);
                foreach ($galleyItemInputs as $key => $data) {
                    $dataArray = Arr::only($data,
                        ['gallery_title', 'image_description', 'gallery_content']);
                    $gallery = new PostGallery($dataArray);

                    /** @var Post $newPost */
                    $postGallery = $newPost->postGalleries()->save($gallery);

//                    if (isset($data['gallery_images']) && ! empty($data['gallery_images'])) {
//                        $postGallery->addMediaFromUrl($data['gallery_images'])->toMediaCollection(PostGallery::IMAGES,
//                            config('app.media_disc'));
//                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        // sorted
        try {
            DB::beginTransaction();

            $sorted = [
                [
                    'created_by' => 1,
                    'title' => 'It is a long established fact that a reader will be distracted by the readable',
                    'slug' => 'it-is-a-long-established-fact-that-a-reader-will-be-distracted-by-the-readable',
                    'description' => 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infanc',
                    'keywords' => 'explorer',
                    'visibility' => 1,

                    'featured' => 1,
                    'breaking' => 1,
                    'slider' => 1,
                    'recommended' => 0,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'actual',
                    'post_types' => 3,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-1.jpg'),
                    'sort_list_title' => [
                        'Quisque efficitur augue eget enim malesuada auctor',
                        'Nulla consequat est tellus, non sodales ante congue facilisis',
                    ],
                    'sort_list_images' => [
                        ('assets/image/post-image/post-10.jpg'),
                        ('assets/image/post-image/post-11.jpg'),
                    ],
                    'image_description' => [
                        'Maecenas quis maximus ipsum',
                        'Praesent nec purus ac nulla mollis dapibus ac at dolor',
                    ],
                    'sort_list_content' => [
                        'Cras hendrerit enim ut turpis commodo, eget porta massa ullamcorper. Maecenas quis maximus ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit magna ligula, nec malesuada lectus finibus vel. Praesent varius rutrum nunc, sit amet tincidunt dolor ultrices nec.',
                        'Phasellus cursus nec massa vel mollis. Sed ut nisl vitae elit blandit tempus at ut tortor. Nullam tempor, ligula non molestie elementum, mi metus imperdiet eros, eu dictum ante lectus sed ligula. Aliquam felis risus, vestibulum sagittis dolor dapibus, laoreet luctus arcu. Donec a eros malesuada, varius augue sit amet, iaculis felis. Praesent nec purus ac nulla mollis dapibus ac at dolor. Ut in vestibulum nibh.',
                    ],
                ],
                [
                    'created_by' => 1,
                    'title' => 'Implementing these goals requires a careful examination',
                    'slug' => 'implementing-these-goals-requires-a-careful-examination',
                    'description' => 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have',
                    'keywords' => 'examination, careful, goals',
                    'visibility' => 1,

                    'featured' => 0,
                    'breaking' => 0,
                    'slider' => 1,
                    'recommended' => 0,
                    'show_on_headline' => 0,
                    'show_registered_user' => 0,
                    'optional_url' => '',
                    'tags' => 'sky',
                    'post_types' => 3,
                    'lang_id' => 1,
                    'category_id' => 1,
                    'sub_category_id' => 4,
                    'scheduled_post' => 0,
                    'status' => 1,
                    'image' => ('assets/image/post-image/post-10.jpg'),
                    'sort_list_title' => [
                        'Class aptent taciti sociosqu ad litora torquent per conubia nostra',
                        'Vivamus sit amet turpis at nisl elementum pellentesque',
                    ],
                    'sort_list_images' => [
                        ('assets/image/post-image/post-15.jpg'),
                        ('assets/image/post-image/post-20.jpg'),
                    ],
                    'image_description' => [
                        'Donec rhoncus feugiat magna ut hendrerit',
                        'Nam sapien neque, interdum at mi quis',
                    ],
                    'sort_list_content' => [
                        'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec rhoncus feugiat magna ut hendrerit. Mauris non consectetur nunc. Nam scelerisque ex a posuere porttitor. Morbi tincidunt eget odio nec pretium. Morbi aliquam, elit nec interdum commodo, metus neque tincidunt tellus, a hendrerit risus magna sit amet turpis.',
                        'Integer non cursus ligula, et varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum auctor, tellus sit amet dapibus ultricies, lorem tortor efficitur enim, et gravida eros felis et lectus. Cras a condimentum felis. Sed congue mauris vel lectus scelerisque, id rutrum velit dictum. Nam sapien neque, interdum at mi quis, viverra pellentesque metus. Etiam in ante nunc.',
                    ],
                ],
            ];
            foreach ($sorted as $post) {

//                $postImage = $post['image'];
                unset($post['image']);
                $postInputArray = Arr::only($post, [
                    'created_by', 'title', 'slug', 'description', 'keywords', 'visibility',
                    'featured', 'breaking', 'slider', 'recommended', 'show_registered_user', 'tags', 'optional_url',
                    'additional_images ', 'files', 'lang_id', 'category_id', 'sub_category_id', 'scheduled_post',
                    'status', 'post_types', 'section', 'show_on_headline',
                ]);
                $newPost = Post::create($postInputArray);

//                if (isset($postImage)) {
//                    $newPost->addMediaFromUrl($postImage)->toMediaCollection(Post::IMAGE_POST,
//                        config('app.media_disc'));
//                }

                $postRepo = app()->make(PostRepository::class);
                $postSortListArray = Arr::only($post,
                    ['sort_list_title', 'image_description', 'sort_list_content', 'sort_list_images']);
                $sortListItemInputs = $postRepo->prepareInputForItem($postSortListArray);
                foreach ($sortListItemInputs as $key => $data) {
                    $dataArray = Arr::only($data,
                        ['sort_list_title', 'image_description', 'sort_list_content']);

                    $sortList = new PostSortList($dataArray);
                    /** @var Post $newPost */
                    $postSortList = $newPost->postSortLists()->save($sortList);

//                    if (isset($data['sort_list_images']) && ! empty($data['sort_list_images'])) {
//                        $postSortList->addMediaFromUrl($data['sort_list_images'])->toMediaCollection(PostSortList::IMAGES,
//                            config('app.media_disc'));
//                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
