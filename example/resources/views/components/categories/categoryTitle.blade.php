<h1>
    @if(isset($withLink) and $withLink)
        <a href="{{url('/categories/' . $category->id)}}">
    @endif
    {{$category->name}}
    @if(isset($withLink) and $withLink)
        </a>
    @endif
</h1>
@if (isset($withRelations) and $withRelations)
    @foreach($category->educations as $education)
        <span class="badge badge-primary">
            {{ $education->name }}
        </span>
    @endforeach
@endif