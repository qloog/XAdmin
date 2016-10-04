                <div class="form-group">
                    {!! Form::label('name', '名称', ['class' => 'col-lg-2 control-label']) !!}
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
                        {!! Form::textarea('description', null, ['cols' => 100, 'rows' => 5, 'class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div><!--form control-->

                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-2 control-label">已关联角色</label>--}}
                    {{--<div class="col-lg-3">--}}
                        {{--@if (count($roles) > 0)--}}
                            {{--@foreach($roles as $role)--}}
                                {{--<input type="checkbox" {{ in_array($role->id, $permissionRoles) ? 'checked' : ''}} value="{{$role->id}}" name="permission_roles[]" id="role-{{$role->id}}" />--}}
                                {{--<label for="role-{{$role->id}}">{!! $role->display_name !!}({!! $role->name !!})</label>--}}
                                {{--<br/>--}}
                            {{--@endforeach--}}
                        {{--@else--}}
                            {{--No Roles to set--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div><!--form control-->--}}