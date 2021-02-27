@extends('layout.master')
@section('title', 'Pesona digital - divisi')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col">
            @can('crud_divisi')
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Add data</button>
            @endcan
            {{-- @can('crud_divisi', App\Models\Divisi::class)
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Add data</button>
            @endcan --}}
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
                    <th scope="col">Divisi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $divisi)
                        <tr>
                            <td>{{$divisi->nama}}</td>
                            <td>
                                <a href="#" data-id="{{$divisi->id}}" class="badge badge-warning btn-edit"><i class="fas fa-edit"></i></a>
                                @can('crud_divisi')
                                    <a href="#" data-id="{{$divisi->id}}" class="badge badge-danger" id="swal-6"><i class="fas fa-trash-alt"></i>
                                        <form action="{{route('divisi.destroy', $divisi->id)}}" id="delete{{$divisi->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        </form>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('divisi.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Divisi</label>
                                <input class="form-control" name="nama" value="{{old('nama')}}"></input>
                                @error('nama')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('divisi.store')}}" method="POST" id="form-edit">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btn-update">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    
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
                text: 'Once deleted, you will not to able to recover this imaginary file! If data not deleted in once submission, i should for submit again',
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

        @if($errors->any())
            $('#exampleModal').modal('show')
        @endif

        $('.btn-edit').on('click', function (){
            let id = $(this).data('id')
            $.ajax({
                url: `/divisi/${id}/edit`,
                method: "GET",
                success: function(data){
                    $('#modal-edit').find('.modal-body').html(data)
                    $('#modal-edit').modal('show')
                },
                error: function(error){
                    console.log(error)
                }
            })
        })

        $('.btn-update').on('click', function (){
            // console.log($(this).data('id'))

            let id = $('#form-edit').find('#id_data').val()
            let formData = $('#form-edit').serialize()
            console.log(formData)
            $.ajax({
                url: `/divisi/${id}`,
                method: "PATCH",
                data: formData,
                success: function(data){
                    // console.log(data)


                    // $('#modal-edit').find('.modal-body').html(data)
                    $('#modal-edit').modal('hide')
                    window.location.assign('divisi')

                },
                error: function(err){
                    console.log(err.responseJSON)
                    let err_log = err.responseJSON.errors
                    if(err.status == 422){
                        if(typeof(err_log.nama) !== 'undefined'){
                            $('#modal-edit').find('[name = "nama"]').prev().html('<span style="color: red;">Error! '+err_log.nama[0]+'</span>')
                        }else{
                            $('#modal-edit').find('[name = "nama"]').prev().html('<span>Divisi</span>')
                        }
                    }
                }
            })
        })

    </script>
@endpush