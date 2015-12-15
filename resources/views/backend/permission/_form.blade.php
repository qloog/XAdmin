                <div class="form-group">
                    {!! Form::label('permission_name', '权限名', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('permission_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('permission_slug', '权限slug', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('permission_slug', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('permission_description', '权限描述', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('permission_description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->