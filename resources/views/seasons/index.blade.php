<x-layout title="Seasons">
  <ul class="list-group mt-3">
    @foreach ($seasons as $season)
    <li class="list-group-item d-flex justify-content-between align-content-center">
      Season {{ $season->number }}

      <span class='badge bg-secondary'>
        Episodes count = {{ $season->episodes->count() }}
      </span>
    </li>
    @endforeach

  </ul>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back()">Back</button>
</x-layout>