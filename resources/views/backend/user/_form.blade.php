                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="title"> 用户名 </label>
                    <div class="col-sm-10">
                        <div class="clearfix">
                            <input type="text" name="username" id="username" placeholder="标题" class="col-xs-10 col-sm-5" value="{{ $user->username }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="category_id"> 拥有角色 </label>
                    <div class="col-sm-10">
                        <div class="clearfix">
                            @foreach ($roles as $role)
                                <label for="role_id">{{ $role->role_name }}</label>
                                <input type="checkbox" name="role_id" value="{{ $role->id }}"
                                      {{ in_array($role->id, $userRole) ? 'checked' : '' }}
                                />{{ $role['role_name'] }}
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="meta_keyword"> Email </label>
                    <div class="col-sm-10">
                        <div class="clearfix">
                            <input type="text" name="email" id="email" placeholder="蜘蛛侠、煎饼侠" class="col-xs-10 col-sm-5" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>