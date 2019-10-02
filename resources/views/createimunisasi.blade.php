
<div class="card-body">
    <div id="result-form-konten"></div>
    <form action="{{ route('createimunisasi.create') }}" method="POST" id="form-konten" class='form-horizontal'>

        <div class="form-group">

            <label class="form-control-label" for="exampleFormControlSelect1">Tahun</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_jatim">
            <label class="dropdown btn-danger" for="formTahun">
                    @for($i = 2013 ; $i <= date('Y'); $i += 1)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
            </label>
            </select>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlSelect2">Kabupaten</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_jatim">
                @foreach($kabupaten as $key =>$item)
                    <option value="{{$item->gid}}">{{$item->nama_kab}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label form-control-label">DPT 1</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name=dpt_1" value="{{$item->dpt_1}}" required="" >
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label form-control-label">DPT 2</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name=dpt_2" value="{{$item->dpt_2}}" required="" >
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label form-control-label">DPT 3</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name=dpt_3" value="{{$item->dpt_3}}" required="" >
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Bayi lahir</label>
            <div class="col-md-10">
                <input class="form-control" name="bayi_lahir" type="bayi_lahir" value="{{$item->bayi_lahir}}" required="" >
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