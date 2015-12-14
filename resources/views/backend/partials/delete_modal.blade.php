<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">请确认</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle"></i>
                    确认要删除该条记录吗？
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ $action }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default btn-xs"
                            data-dismiss="modal">否</button>
                    <button type="submit" class="btn btn-danger btn-xs">
                        <i class="fa fa-times-circle"></i> 是
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>