<h1><a href="{{url('/categories/' . $category->id)}}">{{$category->name}}</a></h1>
@component('components.categories.relationcount')
    @slot('category', $category)
@endcomponent
<hr>