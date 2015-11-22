                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="title"> 用户名 </label>
                    <div class="col-sm-10">
                        <div class="clearfix">
                            <input type="text" name="username" id="username" placeholder="标题" class="col-xs-10 col-sm-5" value="{{ $user->username }}">
                        </div>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-2 control-label no-padding-right" for="category_id"> 所属分类 </label>--}}
                    {{--<div class="col-sm-10">--}}
                        {{--<div class="clearfix">--}}
                        {{--<select name="category_id" id="category_id">--}}
                            {{--<option value="">请选择</option>--}}
                            {{--@foreach ($selectCategory as $item)--}}
                            {{--<option value="{{ $item['id'] }}">{{ $item['html'] }}{{ $item['name'] }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="meta_keyword"> Email </label>
                    <div class="col-sm-10">
                        <div class="clearfix">
                            <input type="text" name="email" id="email" placeholder="蜘蛛侠、煎饼侠" class="col-xs-10 col-sm-5" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>


