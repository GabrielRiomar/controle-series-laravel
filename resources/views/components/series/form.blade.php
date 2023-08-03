<form action="{{ $action }}" method="post">
  @csrf
  @if($update)
  @method('PUT')
  @endif

  <div class="row mb-3">
    <div class="col-8">
      <label for="name" class="form-label">Title Name</label>
      <input autofocus type="text" id="name" name="name" class="form-control" @isset($name) value="{{ $name }}" @endisset>
    </div>

    <div class="col-2">
      <label for="seasonsQty" class="form-label">Nº Seasons</label>
      <input type="text" id="seasonsQty" name="seasonsQty" class="form-control" @isset($seasonsQty) value="{{ $seasonsQty }}" @endisset>
    </div>

    <div class="col-2">
      <label for="episodesPerSeason" class="form-label">Episodes</label>
      <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control" @isset($episodesPerSeason) value="{{ $episodesPerSeason }}" @endisset>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <button type="button" class="btn btn-danger" onclick="history.back()">Back</button>
</form>