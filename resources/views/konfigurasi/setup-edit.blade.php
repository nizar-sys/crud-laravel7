<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="id" value="{{$setup->id}}" id="id_data"/>
        <div class="form-group">
            <label>Jumlah hari kerja</label>
            <input type="number" name="jumlah_hari_kerja" class="form-control" value="{{$setup->jumlah_hari_kerja}}">
            @error('jumlah_hari_kerja')
                {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Nama aplikasi</label>
            <input class="form-control" name="nama_aplikasi" value="{{$setup->nama_aplikasi}}"></input>
            @error('nama_aplikasi')
                {{$message}}
            @enderror
        </div>
    </div>
</div>