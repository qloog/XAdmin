                <div class="form-group">
                    {!! Form::label('role_name', '角色名', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('role_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('role_slug', '角色slug', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('role_slug', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('role_description', '角色描述', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('role_description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">权限</label>
                    <div class="col-lg-3">
                        @if (count($permissions) > 0)
                            @foreach($permissions as $perm)
                                <input type="checkbox" value="{{$perm->id}}" name="assignees_permissions[]" {{in_array($perm->id, $rolePermissions) ? 'checked' : ''}} id="perm-{{$perm->id}}" />
                                <label for="perm-{{$perm->id}}">{!! $perm->permission_name !!}</label>
                                <br/>
                            @endforeach
                        @else
                            No Permissions to set
                        @endif
                    </div>
                </div><!--form control-->