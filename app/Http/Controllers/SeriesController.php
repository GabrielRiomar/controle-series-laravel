<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::query()->orderBy('name')->get();
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

    public function store(Request $request)
    {
        $series = Series::create($request->all());
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
        return redirect(route('series.edit'))->with('series', $series);
    }

    public function update(Series $series, Request $request)
    {
        return redirect(route('series.edit'))->with('series', $series);
    }
}
