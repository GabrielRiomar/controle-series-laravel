<x-layout title="Episodes">

  @isset($addMessage)
  <div class="alert alert-success">
    {{$addMessage}}
  </div>
  @endisset

  <form method="post">
    @csrf
    <ul class="list-group mt-3">
      @foreach ($episodes as $episode)
      <li class="list-group-item d-flex justify-content-between align-content-center">
        Episode {{ $episode->number }}

        <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" @if ($episode->watched) checked @endif>
      </li>
      @endforeach

    </ul>
    <button class="btn btn-success mt-3">Save</button>
  </form>
  <a href="{{ route('series.index')}}" class="btn btn-danger mt-3">Back</a>
</x-layout>