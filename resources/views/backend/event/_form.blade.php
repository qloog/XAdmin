                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="title"> 活动标题 </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="title" placeholder="标题" class="col-xs-10 col-sm-5" value="{{ $title }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 活动时间 </label>
                    <div class="col-sm-10">
                    <div class="input-daterange input-group">
                        <input type="text" name="begin_time" id="form-field-1" placeholder="开始时间" class="input-sm form-control" value="{{ $begin_time }}">
                        <span class="input-group-addon">
                            <i class="fa fa-exchange"></i>
                        </span>
                        <input type="text" name="end_time" id="form-field-1" placeholder="结束时间" class="input-sm form-control" value="{{ $end_time }}">
                    </div>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> 活动图 </label>
                    <div class="col-sm-10">
                        <input type="file" name="file" id="file"  class="form-control" />
                        <input type="hidden" name="event_image" id="event_image"  class="form-control" value="{{ !empty($event_image) ?$event_image: ''}}"/>
                        <p></p>
                        <img id="upload_image_preview" data-src="holder.js/200x200" class="img-rounded" alt="200x200"
                        src="{{ !empty($event_image) ?$event_image: 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNGYyZjk4MDhiYyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE0ZjJmOTgwOGJjIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA0Njg3NSIgeT0iNzQuNSI+MTQweDE0MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==' }}"
                        data-holder-rendered="true" style="width: 200px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> 摘要 </label>
                    <div class="col-sm-10">
                        <textarea name="summary" id="form-field-1-1" placeholder="简单描述" class="form-control">{{ $user_id }}</textarea>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-tags">正文</label>
                    <input name="content" type="hidden" id="content">
                    <div class="col-sm-10">
                        {!! UEditor::content($content) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 浏览量 </label>
                    <div class="col-sm-10">
                        <input type="text" name="user_count" id="form-field-1" placeholder="100" class="col-xs-10 col-sm-5" value="{{ $user_count }}">
                    </div>
                </div>

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/date-time/datepicker.min.css') }}" />
    {!! UEditor::css() !!}
@endsection

@section('scripts')
    {!! UEditor::js() !!}
    {{--<script src="{{ asset('js/date-time/bootstrap-datepicker.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/date-time/datepicker.zh-CN.js') }}"></script>--}}
    <script type="text/javascript">

        var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor
        /* 自定义路由 */
        /*
         var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
         var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
         */

        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection
