@extends('layout.master')
@section('title', 'Pesona digital - crud')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col">
            <a href="{{route('crud.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i>Add article</a>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                           <span>X</span>
                        </button>
                        {{session('message')}}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-12 mt-2">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tb_article as $article)
                    <tr>
                        <td>{{$article->title}}</td>
                        <td>{{$article->description}}</td>
                        <td>
                            <a href="{{route('crud.edit', $article->id)}}" class="badge badge-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="{{$article->id}}" class="badge badge-danger" id="swal-6"><i class="fas fa-trash-alt"></i>
                                <form action="{{route('crud.destroy', $article->id)}}" id="delete{{$article->id}}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$tb_article->links()}}
        </div>
    </div>
</div>
    
@endsection

@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
@endpush

@push('after-scripts')
    <script>
        $("#swal-6").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not to able to recover this imaginary file!',
                icon: 'warning',
                buttons: true,
                dangerMode: true
            })
            .then((willDelete)=>{
                if(willDelete){
                    swal('Poof! Your imaginary file has deleted', {
                        icon: 'success',
                    });
                    $(`#delete${id}`).submit();
                } else {
                    swal('Your imaginary file is safe!');
                }
            });
        });
    </script>
@endpush