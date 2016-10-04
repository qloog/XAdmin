                <div class="form-group">
                    {!! Form::label('username', '用户名', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => '用户名']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-3">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">角色</label>
                    <div class="col-lg-3">
                        <select class="form-control role-select" multiple="multiple" name="assignees_roles[]">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{in_array($role->id, $userRoles) ? 'selected' : ''}}>{!! $role->name !!}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">是否启用</label>
                    <div class="col-lg-3">
                        {!! Form::checkbox('status', 1, true) !!}
                    </div>
                </div><!--form control-->