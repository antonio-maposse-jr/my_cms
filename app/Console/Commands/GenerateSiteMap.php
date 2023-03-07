<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\URL;
use Spatie\Sitemap\Sitemap;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(URL::to('/'));


        $posts = Post::withoutGlobalScope(LanguageScope::class)
            ->where('status', '=', 1)->whereVisibility(1)
            ->get(['slug']);
        foreach ($posts as $post) {
            $sitemap->add(URL::to('/p/'.$post->slug));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $content = file_get_contents(public_path('robots.txt'));
        
        $content = str_replace('{{URL}}', URL::to('/'), $content);
        
        file_put_contents(public_path('robots.txt'), $content);

        return Command::SUCCESS;
    }
}
