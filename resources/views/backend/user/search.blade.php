<div class="row">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="username" class="col-md-1 control-label">用户名</label>
            <div class="col-md-2">
                <input type="text" name="username" class="form-control"  id="username" />
            </div>
            <label for="email" class="col-md-1 control-label">Email</label>
            <div class="col-md-2">
                <input type="text" name="email" class="form-control"  id="email" />
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-default btn-xs">{{ trans('strings.search_button') }}</button>
            </div>
        </div>
    </form>
</div>