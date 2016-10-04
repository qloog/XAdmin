                <div class="form-group">
                    {!! Form::label('name', '角色名称', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('display_name', '显示名称', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('description', '描述', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::textarea('description', null, ['cols' => 100, 'rows' => 5, 'class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">权限</label>
                    <div class="col-lg-3">
                        <ul class="list-unstyled">
                        @if (count($permissions) > 0)
                            @foreach($permissions as $perm)
                                <li class="pull-left">
                                <input type="checkbox" value="{{$perm->id}}" name="assignees_permissions[]" {{in_array($perm->id, $rolePermissions) ? 'checked' : ''}} id="perm-{{$perm->id}}" />
                                <label for="perm-{{$perm->id}}">{!! $perm->display_name !!}({!! $perm->name !!})</label>
                                </li>
                            @endforeach
                        @else
                            No Permissions to set
                        @endif
                        </ul>
                    </div>
                </div><!--form control-->