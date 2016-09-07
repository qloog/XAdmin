                <div class="form-group">
                    {!! Form::label('name', '角色名', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('display_name', '显示名', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('description', '描述', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">权限</label>
                    <div class="col-lg-3">
                        @if (count($permissions) > 0)
                            @foreach($permissions as $perm)
                                <input type="checkbox" value="{{$perm->id}}" name="assignees_permissions[]" {{in_array($perm->id, $rolePermissions) ? 'checked' : ''}} id="perm-{{$perm->id}}" />
                                <label for="perm-{{$perm->id}}">{!! $perm->name !!}</label>
                                <br/>
                            @endforeach
                        @else
                            No Permissions to set
                        @endif
                    </div>
                </div><!--form control-->