@extends('layout.master')
@section('title', 'Pesona digital - setup aplikasi')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col">
            @if (sizeof($setups) == 0)
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Add article</button>
            @endif
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
                    <th scope="col">Hari kerja</th>
                    <th scope="col">Nama aplikasi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($setups as $setup)
                        <tr>
                            <td>{{$setup->jumlah_hari_kerja}}</td>
                            <td>{{$setup->nama_aplikasi}}</td>
                            <td>
                                <a href="#" data-id="{{$setup->id}}" class="badge badge-warning btn-edit"><i class="fas fa-edit"></i></a>
                                {{-- <a href="#" data-id="{{$setup->id}}" class="badge badge-danger" id="swal-6"><i class="fas fa-trash-alt"></i>
                                    <form action="{{route('crud.destroy', $setup->id)}}" id="delete{{$setup->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    </form>
                                </a> --}}
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
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('konfigurasi.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah hari kerja</label>
                                <input type="number" name="jumlah_hari_kerja" class="form-control" value="{{old('jumlah_hari_kerja')}}">
                                @error('jumlah_hari_kerja')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama aplikasi</label>
                                <textarea class="form-control" name="nama_aplikasi" value="{{old('nama_aplikasi')}}"></textarea>
                                @error('nama_aplikasi')
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
                <h5 class="modal-title">Edit data kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('konfigurasi.update', $setup)}}" method="POST" id="form-edit">
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

        @if($errors->any())
            $('#exampleModal').modal('show')
        @endif

        $('.btn-edit').on('click', function (){
            console.log($(this).data('id'))

            let id = $(this).data('id')
            $.ajax({
                url: `konfigurasi/${id}/edit`,
                method: "GET",
                success: function(data){
                    // console.log(data)


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
                url: `konfigurasi/${id}`,
                method: "PATCH",
                data: formData,
                success: function(data){
                    // console.log(data)


                    // $('#modal-edit').find('.modal-body').html(data)
                    $('#modal-edit').modal('hide')
                    window.location.assign('konfigurasi')

                },
                error: function(err){
                    console.log(err.responseJSON)
                    let err_log = err.responseJSON.errors
                    if(err.status == 422){
                        if(typeof(err_log.jumlah_hari_kerja) !== 'undefined'){
                            $('#modal-edit').find('[name = "jumlah_hari_kerja"]').prev().html('<span style="color: red;">Error! '+err_log.jumlah_hari_kerja[0]+'</span>')
                        }else{
                            $('#modal-edit').find('[name = "jumlah_hari_kerja"]').prev().html('<span>Hari kerja</span>')
                        }
                        if(typeof(err_log.nama_aplikasi) !== 'undefined'){
                            $('#modal-edit').find('[name = "nama_aplikasi"]').prev().html('<span style="color: red;">Error! '+err_log.nama_aplikasi[0]+'</span>')
                        }else{
                            $('#modal-edit').find('[name = "nama_aplikasi"]').prev().html('<span>Nama aplikasi</span>')
                        }
                    }
                }
            })
        })

    </script>
@endpush