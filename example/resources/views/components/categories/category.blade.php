@component('components.categories.categoryTitle')
    @slot('category', $category)
    @slot('withLink', true)
    @slot('withRelations', true)
@endcomponent
@component('components.categories.relationcount')
    @slot('category', $category)
@endcomponent