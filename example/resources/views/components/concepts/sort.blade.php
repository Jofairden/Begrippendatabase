@if(isset($withTitle) and $withTitle)
    <h3>
        Sorteren
    </h3>
@endif
<ul class="sort-list mb-0">
    <li class="sort-opt"><a href="{{route('concepts.index') . '?sort=asc'}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Oplopend alfabet</a></li>
    <li class="sort-opt"><a href="{{route('concepts.index') . '?sort=desc'}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Aflopend alfabet</a></li>
</ul>
@if(isset($withHr) and $withHr)
    <hr>
@endif