<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id" value="{{$divisi->id}}" id="id_data"/>
        <div class="form-group">
            <label>Divisi</label>
            <input type="text" name="nama" class="form-control" value="{{$divisi->nama}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label>Nama aplikasi</label>
            <input class="form-control" name="nama_aplikasi" value="{{$divisi->nama_aplikasi}}"></input>
            @error('nama_aplikasi')
                {{$message}}
            @enderror
        </div>
    </div> --}}
</div>