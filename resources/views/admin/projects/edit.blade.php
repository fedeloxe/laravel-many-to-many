@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <form action="{{route('admin.projects.update', ['project' => $project['slug']])}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                  @if ($errors->any())
                      <ul class="text-danger">
                          @foreach ($errors->all() as $error)
                              <li>
                                  {{ $error }}
                              </li>
                          @endforeach
                      </ul>
                  @endif
              </div>
              

                <div class="mb-3">
                  <label for="" class="form-label">Aggiungi titolo</label>
                  <input type="text" class="form-control" id="" aria-describedby="" name="title" value="{{old('title') ?? $project->title}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Aggiungi contenuto</label>
                    <textarea rows="5" class="form-control" id="" aria-describedby="" name="content"></textarea value="{{old('content') ?? $project->content}}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Seleziona type</label>
                    <select name="type_id" id="type_id">
                      @foreach ($types as $item)
                      <option value="{{ $item['id']}}" {{$item['id'] == old('type_id', $project['type_id']) ? 'selected' : ''}}>{{$item['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                
                
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">Crea il nuovo Post</button>
                </div>
              </form>

        </div>
    </div>
</div>
@endsection