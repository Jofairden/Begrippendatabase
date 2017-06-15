@extends('layouts.app')
@section('title', 'Welkom')

@section('styles')
    <style>
        #accordion
        {
            height: calc(60vh);
            overflow-y: scroll;
        }

        @media (max-width: 978px) {
            .container {
                padding:0;
                margin:0;
            }

            body {
                padding:0;
            }

            .navbar-fixed-top, .navbar-fixed-bottom, .navbar-static-top {
                margin-left: 0;
                margin-right: 0;
                margin-bottom:0;
            }
        }
    </style>
@endsection

@section('content')
    <hr>
    <hr>
    <h1>Zoek naar begrippen</h1>
    @component('components.concepts.searchbar')
    @endcomponent

    <hr>
    <hr>

    @component('components.accordion')
    @endcomponent
@endsection

@section('scripts')
    <script>
        $("#query").on("keyup", function() {
            let value = $(this).val();
            $.ajax({
                url: '{{route('concepts.ajax')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: {query:value},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    $('#accordion').empty();
                    $.each(data, function()
                    {
                        $('#accordion').append(
                            '<div class="card">' +
                                '<div id="heading' + this.id + '" class="card-header" role="tab">' +
                                    '<h5 class="mb-0">' +
                                        '<a data-toggle="collapse" data-parent="#accordion" href="#collapse' + this.id +'" aria-expanded="true" aria-controls="collapse' + this.id + '">'+this.name+'</a>' +
                                    '</h5>' +
                                '</div>' +
                                '<div id="collapse'+this.id+'" class="collapse" role="tabpanel" aria-labelledby="heading'+this.id+'">' +
                                    '<div class="card-block">' +
                                        '<div class="col-sm-12 col-md-8 col-lg-6 p-0">' +
                                            '<p class="p-0 m-0">' + this.info + '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>')
                    });
                },
                error:function(){
                    console.log("An error has occured !");
                }
            });
        });
    </script>
@endsection