<form method="get" action="{{route('concepts.index')}}" class="form @if(isset($inline) and $inline) form-inline @endif">
    <div class="form-group">
        <input class="hidden" type="hidden" class="form-control" id="sort" name="sort" value="@if(isset($_GET['sort'])){{strip_tags($_GET['sort'])}}@endif" disabled>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="query" name="query" value="@if(isset($_GET['query'])){{strip_tags($_GET['query'])}}@endif">
    </div>

    @if (isset($withSubmit) and $withSubmit)
        <button type="submit" class="btn btn-primary mx-sm-3">
            @if (isset($submitText) and $submitText)
                {{$submitText}}
            @else
                Zoeken
            @endif
        </button>
    @endif
</form>