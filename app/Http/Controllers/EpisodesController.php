<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Models\Season;
use App\Repositories\EpisodesRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function __construct(private EpisodesRepository $repository)
    {
    }

    public function index(Season $season)
    {
        $addMessage = session('add.message');
        return view('episodes.index', ['episodes' => $season->episodes])->with('addMessage', $addMessage);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        $this->repository->watchUpdate($season, $watchedEpisodes);
        return redirect(route('episodes.index', $season->id))->with('add.message', 'Episodes marked with success');
    }
    // public function update(Request $request, Season $season)
    // {
    //     $watchedEpisodes = $request->episodes;
    //     $season->episodes->each(function (Episodes $episode) use ($watchedEpisodes) {
    //         $episode->watched = in_array($episode->id, $watchedEpisodes);
    //     });
    //     $season->push();

    //     return redirect('episodes.index', $season->id);
    // }
}
