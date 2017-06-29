        // deal with window hash
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                let page = window.location.hash.replace('#', '');

                if (page === Number.NaN || page <= 0)
                    return false;
                else
                    getConcepts(page, $("#query").val(), $("input:radio[id^='sortName']:checked").attr('id'));
            }
        });

        // override for pagination urls
        $(document).ready(function() {

            let hash = document.location.hash;
            if (hash)
            {
                $('a[href="'+ hash +'"]').click();
            }

            $('.pagination a').click(function(e){
                let url = $(this).attr('href');
                getConcepts(url.split('page=')[1], url.split('query=')[1], url.split('sort=')[1]);
                e.preventDefault();
            });

            $('[data-toggle="popover"]').popover({
                delay: {"show" : 250, "hide" : 250},
                placement: "top",
                trigger: "hover",
                //offset: "0 48px", // tether
                template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><div class="popover-content"></div></div>',
                container: 'body',
            });

            var id = null;

            // $('.toggle-removal').click(function() { 
            //     id = $(this).attr('data-id');
            //     console.log(id);
            // });

            $('body').on('click', '.toggle-removal', function() {
                id = $(this).attr('data-id');
                console.log(id);
            });

            $('body').on('click', '.remove-begrip', function() {
                var url = window.location.origin + '/concepts/delete/' + id;
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: { '_token' : window.Laravel.csrfToken },
                    success: function(response) { 
                        $(".toggle-removal[data-id="+ id +"]").closest(".card-header").closest('.row').fadeOut(500);
                    },
                }); 
            });
        });



        // ajax function to get concepts
        function getConcepts(page, query, sort) {
            let url = window.location.origin + '/concepts/ajax/request' + '?page=' + page;
            let hash = page;
            if (query && query.trim().length > 0)
                url += '&query=' + query;
            if (sort && sort.trim().length > 0)
                url += '&sort=' + sort;

            $.ajax({
                url : url,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function (data) {
                $('.ajaxHolder').html(data.html);
                $('.ajaxStats-first').html(data.from || 0);
                $('.ajaxStats-last').html(data.to || 0);
                $('.ajaxStats-total').html(data.total || 0);
                $('.ajaxStats-page').html(data.current_page || 1);
                location.hash = hash;
            }).fail(function () {
                console.log("concepts could not be loaded through ajax");
            });
        }

        // Allows for a small delay before getting concepts when searching
        // This to minimize the network load
        // The ajax request will fire 200ms after the user stops giving input
        $("#query").on("input", function () {
            delay(function () {
                getConcepts(1, $("#query").val(), $("input:radio[id^='sortName']:checked").attr('id'));
            }, 200);
        });

        // Allows for sorting
        $(document).on('change', 'input:radio[id^="sortName"]', function (event) {
            getConcepts(window.location.hash.substr(1) || 1, $("#query").val(), $("input:radio[id^='sortName']:checked").attr('id'));
        });