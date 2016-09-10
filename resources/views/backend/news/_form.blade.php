                <div class="form-group">
                    {!! Form::label('title', '新闻标题', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            {!! Form::text('title', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '标题']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="category_id"> 所属分类 </label>
                    <div class="col-sm-10">
                        <div class="clearfix">
                        <select name="category_id" id="category_id">
                            <option value="">请选择</option>
                            @if(isset($selectCategory) && count($selectCategory))
                                @foreach ($selectCategory as $item)
                                <option value="{{ $item['id'] }}">{{ $item['html'] }}{{ $item['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_keyword', '页面关键词', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            {!! Form::text('meta_keyword', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '蜘蛛侠、煎饼侠']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_description', '页面描述', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('meta_description', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '蜘蛛侠大超人']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('page_image', '封面图', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            <input type="file" name="file" id="file"  class="col-xs-10 col-sm-5" />
                            <input type="hidden" name="page_image" id="page_image"  class="col-xs-10 col-sm-5" />
                            {{--<img id="upload_image_preview" src="{{ $page_image }}" width="200px" />--}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('summary', '摘要', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        {{--<textarea name="summary" id="form-field-1-1" placeholder="简单描述" class="col-xs-10 col-sm-5">{{ $summary }}</textarea>--}}
                        {!! Form::text('summary', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '简单描述']) !!}
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    {!! Form::label('content', '正文', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                        @if(isset($news->content))
                            {!! UEditor::content($news->content) !!}
                        @else
                            {!! UEditor::content() !!}
                        @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('views', '浏览量', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('views', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '100']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('tags', '标签', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="inline">
                            {{--{!! Form::text('tags', null, ['placeholder' => '请输入标签名，回车即可']) !!}--}}
                    	</div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('status', '发布状态', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('status', ['0' => '草稿', '1' => '已发布'], '1') !!}
                    </div>
                </div>