                <div class="form-group">
                    {!! Form::label('username', '用户名', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => trans('strings.full_name')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">角色</label>
                    <div class="col-lg-3">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" {{in_array($role->id, $userRoles) ? 'checked' : ''}} id="role-{{$role->id}}" />
                                <label for="role-{{$role->id}}">{!! $role->role_name !!}</label>
                                {{--<a href="#" data-role="role_{{$role->id}}" class="show-permissions small">(<span class="show-hide">Show</span> Permissions)</a>--}}
                                <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">{{ $role->name }}</a>
                                <br/>
                            @endforeach
                        @else
                            No Roles to set
                        @endif
                    </div>
                </div><!--form control-->