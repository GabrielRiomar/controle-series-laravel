<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFromRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request)
    {
        // $series = Series::query()->orderBy('name')->get();
        $series = Series::all();
        $deleteMessage = session('delete.message');
        $addMessage = session('add.message');
        // $deleteMessage = $request->session()->get('delete.message');
        // $addMessage = $request->session()->get('add.message');
        // $request->session()->forget('success.message');
        return view('series.index')->with('series', $series)->with('deleteMessage', $deleteMessage)->with('addMessage', $addMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFromRequest $request)
    {
        $series = $this->repository->add($request);
        // $request->validate([
        //     'name' => ['required', 'min:3']
        // ]);
        // $request->session()->flash('add.message', "Series '{$serie->name}'  added with success");
        return redirect(route('series.index'))->with('add.message', "Series '{$series->name}'  added with success");
    }

    public function destroy(Series $series)
    {
        // Series::find($request->series);
        $series->delete();
        // Series::destroy($request->series);
        // $request->session()->flash('delete.message', "Series '{$series->name}' removed with success");

        return redirect(route('series.index'))->with('delete.message', "Series '{$series->name}' removed with success");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFromRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        // Optional: Update seasons and episodes (similar to the store method)
        // Note: This is just a suggestion, and you may need to modify it based on your data structure
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $season = $series->seasons()->updateOrCreate(
                ['number' => $i],
                ['series_id' => $series->id]
            );

            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $season->episodes()->updateOrCreate(
                    ['number' => $j],
                    ['season_id' => $season->id]
                );
            }
        }

        return redirect(route('series.index'))->with('add.message', "Series '{$series->name}' updated with success");
    }
}
