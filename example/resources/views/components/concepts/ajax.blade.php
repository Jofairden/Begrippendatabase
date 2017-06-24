<?php
    $sortNameASC = false;
    $sortNameDESC = false;

    if (request()->has('sort')){
	    $sortNameASC = request()->input('sort') === "sortNameASC";
	    $sortNameDESC = request()->input('sort') === "sortNameDESC";
    }
    else
    	$sortNameASC = true;
?>

<div class="row col-12 justify-content-center">
    <form id="#sortForm">
        @include('components.forms.error-messages')
        @include('components.forms.flash-messages')
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary @if($sortNameASC) active @endif" name="label_Sort" id="label_sortNameASC">
                <input type="radio" name="sort" id="sortNameASC" autocomplete="off" @if($sortNameASC) checked @endif>Oplopend
            </label>
            <label class="btn btn-primary @if($sortNameDESC) active @endif" name="label_Sort" id="label_sortNameDESC">
                <input type="radio" name="sort" id="sortNameDESC" autocomplete="off" @if($sortNameDESC) checked @endif>Aflopend
            </label>
        </div>
    </form>
</div>
<div class="row col-12 justify-content-center">
    {{$concepts->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4')}}
</div>


@component('components.accordion')
    @foreach($concepts as $concept)
        @component('components.accordioncard-concept',
            ['concept' => $concept])
        @endcomponent
    @endforeach
@endcomponent
