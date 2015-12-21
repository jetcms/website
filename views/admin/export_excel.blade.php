<div class="row">
    <div class="col-md-12">
        <form class="form-inline" method="post" target="_blank" role="form">

            <div class="form-group">
                <label class="sr-only">Model</label>
                <select name="model" class="form-control">
                    @foreach($table as $val)
                        <option value="{{$val}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="sr-only">Model</label>
                <input type="text" name="where_key" class="form-control"  placeholder="Калонка">
            </div>

            <div class="form-group">
                <label class="sr-only">Model</label>
                <input type="text" name="where_value" class="form-control"  placeholder="Значение">
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="btn btn-default">Сгенерировать</button>
        </form>
    </div>
</div>

<hr />

<div class="row">
    <div class="col-md-4">
        <form class="form-inline" action="upload" method="post" target="_blank" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label>Загрузить</label>
                <input name="file" type="file">
            </div>
            <br /><br />
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-default">Обновить таблицу</button>
            </div>

        </form>
    </div>
</div>

<hr />

<div class="row">
    <div class="col-md-12">
        <form class="form-inline" method="post" target="_blank" role="form" action="drop">

            <div class="form-group">
                <label class="sr-only">Model</label>
                <select name="model" class="form-control">
                    @foreach($table as $val)
                        <option value="{{$val}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="sr-only">Model</label>
                <input type="text" name="protected" class="form-control"  placeholder="напишите названия таблици">
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="btn btn-default">Сбросить таблицу</button>
        </form>
    </div>
</div>
