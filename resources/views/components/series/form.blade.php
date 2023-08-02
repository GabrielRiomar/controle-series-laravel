<form action="{{ $action }}" method="post">
  @csrf
  @isset($name)
  @method('PUT')
  @endisset

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" id="name" name="name" class="form-control" @isset($name) value="{{ $name }}" @endisset>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <button type="button" class="btn btn-danger" onclick="history.back()">Back</button>
</form>