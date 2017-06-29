<h1>
    @if(isset($withLink) and $withLink)
        <a href="{{url('/categories/' . $category->id)}}">
    @endif
    {{$category->name}}
    @if(isset($withLink) and $withLink)
        </a>
    @endif
</h1>
