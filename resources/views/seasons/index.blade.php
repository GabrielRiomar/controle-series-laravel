<x-layout title="Seasons">
  <ul class="list-group mt-3">
    @foreach ($seasons as $season)
    <li class="list-group-item d-flex justify-content-between align-content-center">

      <a href="{{ route('episodes.index', $season->id) }}" class="text-decoration-none text-black">
        Season {{ $season->number }}
      </a>

      <span class='badge bg-success'>
        Episodes count = <span class="text-warning">{{ $season->numberOfWatchedEpisodes() }}</span> / {{ $season->episodes->count() }}
      </span>


    </li>
    @endforeach

  </ul>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back()">Back</button>
</x-layout>