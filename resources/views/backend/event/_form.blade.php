                <div class="form-group">
                    {!! Form::label('title', '活动标题', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '标题']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title', '活动时间', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('event_time', null, ['class' => 'form-control', 'id' => 'event_time', 'placeholder' => '活动开始到结束时间']) !!}
                        {!! Form::hidden('begin_time', null, ['id' => 'begin_time']) !!}
                        {!! Form::hidden('end_time', null, ['id' => 'end_time']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title', '活动图', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        <input type="file" name="file" id="file"  class="form-control" />
                        <input type="hidden" name="event_image" id="event_image"  value="{!! isset($event->event_image) ? $event->event_image : '' !!}" />
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('summary', '摘要', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::textarea('summary', null, ['size' => '20x5', 'class' => 'form-control', 'placeholder' => '简单描述']) !!}
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    {!! Form::label('content', '正文', ['class' => 'col-sm-2 control-label']) !!}
                    <input name="content" type="hidden" id="content">
                    <div class="col-sm-7">
                        {!! isset($event->content) ? UEditor::content($event->content) : UEditor::content() !!}
                    </div>
                </div>

@section('styles')
    {!! UEditor::css() !!}
    <!-- date-range-picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('scripts')
    {!! UEditor::js() !!}
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- bootstrap-fileinput -->
    <script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-fileinput/js/locales/zh.js') }}"></script>
    <script type="text/javascript">

        // ueditor
        var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor
        /* 自定义路由 */
        /*
         var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
         var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
         */
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

        // date
        $('input[name="event_time"]').daterangepicker({
            timePicker: true,
            timePickerIncrement: 5,
            timePicker24Hour: true,
            timePickerSeconds: true,
            autoUpdateInput: false,
            locale: {
                applyLabel: '应用',
                cancelLabel: '清除'
            }
        });

        $('input[name="event_time"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' 到 ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
            $('#begin_time').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
            $('#end_time').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
        });

        $('input[name="event_time"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        // upload
        var page_img = '{!! isset($event->event_image) ? $event->event_image : '' !!}';

        $('#file').fileinput({
            language: 'zh',
            uploadUrl: "/admin/upload/image",
            uploadExtraData: {_token: '{{ csrf_token() }}'},
            initialCaption: "请选择一张封面图",
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            maxFilePreviewSize: 10240,
            @if(isset($event->event_image))
            initialPreview: [
                "<img src="+ page_img +" class='file-preview-image' width='200px' />",
            ],
            @endif
        }).on('fileuploaded', function(event, data, previewId, index) {
            var response = data.response;
            $('#event_image').val(response.data.image_path);
        });
    </script>
@endsection
