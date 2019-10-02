
<div class="card-body">
    <div id="result-form-konten"></div>
    <form action="{{ route('update.update', ['id' => $data->id]) }}" method="POST" id="form-konten" class='form-horizontal'>

        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlSelect1">Periode</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_periode" value="tahun">
                @for($i = 2013 ; $i <= date('Y'); $i += 1)
                    <option value="{{$i}}" >{{$i}}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlSelect1">Kabupaten</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_jatim" value="">
                @foreach($kabupaten as $key =>$item)
                    <option value="{{$item->gid}}">{{$item->nama_kab}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Jumlah Penderita</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="jml_penderita" value="{{$item->jml_penderita}}" required="" >
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kematian</label>
            <div class="col-md-10">
                <input class="form-control" name="kematian" type="Kematian" value="{{$item->kematian}}" required="" >
            </div>
        </div>
        <div class='form-group'>

            <div class='col-sm-9 col-xs-12'>
                <input type="submit" class="btn btn-primary" value="Simpan Data">
            </div>
        </div>



        {{--<input type='hidden' name='id' value='{{ $data->id }}'>--}}
        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
    </form>

    <script>
        // $(document).ready(function () {
        //     $('#form-konten').submit(function () {
        //         var data = getFormData('form-konten');
        //         ajaxTransfer('/save-crudkasus', data, '#result-form-konten');
        //     })
        // })
    </script>
</div>