                <div class="form-group">
                    {!! Form::label('name', '相册名称', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            {!! Form::text('name', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '相册名']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('status', '所属分类', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('type', ['0' => '请选择', '1' => '励志', '2' => '运动', '3' => '美女', '4' => '豪车'], '1') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('description', '相册描述', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            {!! Form::text('description', null, ['class' => 'col-xs-10 col-sm-5', 'placeholder' => '励志型相册']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('cover_image', '封面图', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            <input type="file" name="file" id="file"  class="col-xs-10 col-sm-5" />
                            <input type="hidden" name="cover_image" id="cover_image"  class="col-xs-10 col-sm-5" />
                            {{--<img id="upload_image_preview" src="{{ $page_image }}" width="200px" />--}}
                        </div>
                    </div>
                </div>