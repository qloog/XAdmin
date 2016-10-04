                <div class="form-group">
                    {!! Form::label('title', '新闻标题', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-6">
                        <div class="clearfix">
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '标题']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label" for="category_id"> 所属分类 </label>
                    <div class="col-lg-3">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">请选择</option>
                            @if(isset($selectCategory) && count($selectCategory))
                                @foreach ($selectCategory as $item)
                                <option value="{{ $item['id'] }}" @if(isset($news->category_id) && $item['id'] == $news->category_id) selected="selected" @endif>{{ $item['html'] }}{{ $item['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_keyword', '页面关键词', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-6">
                        <div class="clearfix">
                            {!! Form::text('meta_keyword', null, ['class' => 'form-control', 'placeholder' => '蜘蛛侠、煎饼侠']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_description', '页面描述', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('meta_description', null, ['class' => 'form-control', 'placeholder' => '蜘蛛侠大超人']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('page_image', '封面图', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-6">
                        <div class="clearfix">
                            <input type="file" name="file" id="file"  class="col-xs-10 col-sm-5" />
                            <input type="hidden" name="page_image" id="page_image"  value="{!! isset($news->page_image) ? $news->page_image : '' !!}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('summary', '摘要', ['class' => 'col-lg-2 control-label ']) !!}
                    <div class="col-lg-6">
                        {!! Form::textarea('summary', null, ['size' => '20x5', 'class' => 'form-control', 'placeholder' => '简单描述']) !!}
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    {!! Form::label('content', '正文', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-8">
                        <div class="clearfix">
                            {!! isset($news->content) ? UEditor::content($news->content) : UEditor::content() !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('views', '浏览量', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('views', null, ['class' => 'form-control', 'placeholder' => '100']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('status', '发布状态', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::select('status', ['0' => '草稿', '1' => '已发布'], '1', ['class' => 'form-control']) !!}
                    </div>
                </div>

@section('styles')
    {!! UEditor::css() !!}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('scripts')
    {!! UEditor::js() !!}
    <script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-fileinput/js/locales/zh.js') }}"></script>

    {{--<script src="{{ asset('js/jquery-validate/jquery.validate.js') }}"></script>--}}
    {{--<script src="{{ asset('js/jquery-validate/additional-methods.js') }}"></script>--}}
    {{--<script src="{{ asset('js/jquery-validate/messages_zh.js') }}"></script>--}}

    <script type="text/javascript">
        $(function () {
            var page_img = '{!! isset($news->page_image) ? $news->page_image : '' !!}';

            $('#file').fileinput({
                language: 'zh',
                uploadUrl: "/admin/upload/image",
                uploadExtraData: {_token: '{{ csrf_token() }}'},
                initialCaption: "请选择一张封面图",
                allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                maxFilePreviewSize: 10240,
                @if(isset($news->page_image))
                initialPreview: [
                    "<img src="+ page_img +" class='file-preview-image' />",
                ],
                @endif
            }).on('fileuploaded', function(event, data, previewId, index) {
                var response = data.response;
                $('#page_image').val(response.data.image_path);
            });
//        //文件上传
//        $('#file').fileupload({
//            url: '/admin/upload/image',
//            dataType: 'json',
//            done: function (e, data) {
//                $('#upload_image_preview').attr('src', data.result.image);
//                $('#page_image').val(data.result.image);
//            }
//        });
//
//        //表单验证
//        $('#news_form').validate({
//            errorElement: 'div',
//            errorClass: 'help-block',
//            focusInvalid: false,
//            ignore: "",
//            rules: {
//                title: {
//                    required: true
//                },
//                category_id: {
//                    required: true
//                }
//            },
//
//            messages: {
//            },
//
//            highlight: function (e) {
//                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
//            },
//
//            success: function (e) {
//                $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
//                $(e).remove();
//            },
//
//            errorPlacement: function (error, element) {
//                if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
//                    var controls = element.closest('div[class*="col-"]');
//                    if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
//                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
//                }
//                else if(element.is('.select2')) {
//                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
//                }
//                else if(element.is('.chosen-select')) {
//                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
//                }
//                else error.insertAfter(element.parent());
//            },
//
//            submitHandler: function (form) {
//                form.submit();
//            },
//            invalidHandler: function (form) {
//            }
//        });

        });
        var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor

        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection

