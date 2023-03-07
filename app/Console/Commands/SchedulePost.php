<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SchedulePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This artisan command is used to post schedule data change ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::withoutGlobalScope(AuthoriseUserActivePostScope::class)->withoutGlobalScope(LanguageScope::class)
            ->withoutGlobalScope(PostDraftScope::class)
            ->whereStatus(0)
            ->where('scheduled_post', 1)
            ->where('scheduled_post_time', '!=', null)
            ->get();
        foreach ($posts as $scheduleTime) {
            if (Carbon::parse($scheduleTime->scheduled_post_time) >= Carbon::now()) {
                $scheduleTime->update(['status' => 1, 'scheduled_post' => 0, 'scheduled_post_time' => null]);
            }
        }

        $this->info('Post schedule update successfully');
    }
}
