<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsLetterController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('news_letter.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::find($id)->firstorFail();
        $subscriber->delete();

        return $this->sendSuccess('Subscriber delete successfully.');
    }
}
