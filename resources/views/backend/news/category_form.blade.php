    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称 </label>
        <div class="col-sm-9">
            <input type="text" name="name" id="name" placeholder="分类名称" class="col-xs-10 col-sm-5" required value="{{ $category['name'] }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 上级分类 </label>
        <div class="col-sm-9">
            <select name="pid">
                <option value="0">顶级分类</option>
                @foreach ($selectCategory as $item)
                <option value="{{ $item['id'] }}" {{ $item['id'] == $category['id'] ? 'checked'  : '' }}>{{ $item['html'] }}{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>