@extends('layout.master')
@section('title', 'Pesona digital - crud create')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-10">
            <div class="card">
                <div class="card-body">
                  <form action="{{route('crud.update', $article->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="alert alert-info">
                        <b>Article creating!</b> Please add submision
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" 
                                @if (old('title'))
                                    value="{{$article->title}}"
                                @else
                                    value="{{$article->title}}"
                                @endif
                                class="form-control">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" 
                                @if (old('description'))
                                    value="{{$article->description}}"
                                @else
                                    value="{{$article->description}}"
                                @endif
                                class="form-control">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('page-scripts')
    
@endpush