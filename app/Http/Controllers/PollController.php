<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollReqeust;
use App\Models\Poll;
use App\Models\PollResult;
use App\Repositories\PollRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PollController extends AppBaseController
{
    /**
     * @var PollRepository
     */
    private $PollRepository;

    /**
     * PollRepository constructor.
     *
     * @param  PollRepository  $PollRepository
     */
    public function __construct(PollRepository $PollRepository)
    {
        $this->PollRepository = $PollRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Polls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePollReqeust $request)
    {
        $input = $request->all();
        $this->PollRepository->create($input);

        Flash::success('Poll created successfully.');

        return redirect(route('polls.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        return view('Polls.edit', compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePollReqeust $request, Poll $poll)
    {
        $request['status'] = isset($request['status']);
        $this->PollRepository->update($request->all(), $poll->id);

        Flash::success('Poll updated successfully.');

        return redirect(route('polls.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();

        return $this->sendSuccess('Poll deleted successfully.');
    }

    public function status($id)
    {
        $poll = Poll::findOrFail($id);

        $status = ! $poll->status;

        $poll->update(['status' => $status]);

        return $this->sendSuccess('Status updated successfully.');
    }

    public function votePoll(Request $request)
    {
        $input = $request->all();
        $input['ip_address'] = $request->ip();

        $poll = Poll::findOrFail($input['poll_id']);
        if ($poll->vote_permission == 2 && ! Auth::check()) {
            return $this->sendError('Please login');
        }
        $isExist = PollResult::wherePollId($poll->id)->whereIpAddress($input['ip_address'])->exists();
        if ($isExist) {
            return $this->sendError('You already voted !!', ['poll_id' => $poll->id]);
        }

        PollResult::create($input);

        $statistics = getPollStatistics($poll->id);

        return $this->sendResponse($statistics, 'Poll voted successfully.');
    }

    public function pollResult($id)
    {
        return view('Polls.poll_result', compact('id'));
    }
}
