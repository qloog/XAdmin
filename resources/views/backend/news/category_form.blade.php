    <div class="form-group">
        <label class="col-sm-3 control-label" for="name"> 分类名称 </label>
        <div class="col-sm-3">
            <input type="text" name="name" id="name" placeholder="分类名称" class="form-control" required value="{{ $category['name'] }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="pid"> 上级分类 </label>
        <div class="col-sm-3">
            <select name="pid" class="form-control">
                <option value="0">顶级分类</option>
                @foreach ($selectCategory as $item)
                <option value="{{ $item['id'] }}" {{ isset($category['pid']) && $item['id'] == $category['pid'] ? 'selected="selected"'  : '' }}>{{ $item['html'] }}{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>