<div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4">
        <div class="pull-right">
    <!-- search form -->
    <form action="{{$route}}" method="get" id="admin-search">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="{{ $placeholder }}" value="{!! request()->input('keyword') !!}" required="required">
            <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> Search </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
</div>
    </div>
</div>

