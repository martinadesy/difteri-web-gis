
<div class="card-body">
    <div id="result-form-konten"></div>
    <form action="{{ route('crudkasus.create') }}" method="POST" id="form-konten" class='form-horizontal'>

        <div class="form-group">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Periode
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @for($i = 2013 ; $i <= date('Y'); $i += 1)
                    <a class="dropdown-item" value="{{$i}}">{{$i}}</a>
                @endfor
            </div>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlSelect1">Kabupaten</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_jatim">
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