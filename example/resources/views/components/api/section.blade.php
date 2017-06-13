<section class="{{$header}}">
    <h2>{{$header}}</h2>
    <hr>
    @foreach($content as $item)
        <div class="api-item card">
            <div class="card-block">
                <p class="card-text">
                    {!!html_entity_decode($item[0], ENT_QUOTES, 'UTF-8')!!}
                </p>
                <p class="card-text">
                    {!! html_entity_decode($item[1], ENT_QUOTES, 'UTF-8')!!}
                </p>
            </div>
        </div>
        <br>
    @endforeach
    {{--<p class="info">--}}
        {{--{!!html_entity_decode($info)!!}--}}
    {{--</p>--}}
    {{--<p class="format">--}}
        {{--{!!html_entity_decode($format)!!}--}}
    {{--</p>--}}
    {{$slot or ''}}
</section>