@if($errors->any())
<div class="alert alert-danger container mt-5">
  controlla i campi inseriti
</div>
@endif
<form class="container my-5" action="{{route($route, $project->slug)}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @method($method)

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" maxlength="100" name="title" value="{{old('title', $project->title) }}">
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">preview</label>
      <input type="file" class="form-control @error('preview') is-invalid @enderror" maxlength="250" name="preview" value="{{old('preview', $project->preview) }}">
      @error('preview')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date', $project->date) }}">
      @error('date')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">CREATE</button>
  </form>