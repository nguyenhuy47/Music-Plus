<script>
    jQuery(document).ready(function ($) {
        $("#list_singer").tokenInput("{{asset('api/singers?q=singer')}}", {
            hintText: 'Nhập tên ca sỹ',
            noResultsText: "Không tìm thấy ca sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addSinger\">\n" +
                "    Thêm mới\n" +
                "</a>",
            searchingText: 'Đang tìm kiếm...',
            theme: 'facebook',
            preventDuplicates: true,
            prePopulate: '',
        });

        $("#list_artist").tokenInput("{{asset('api/artists?q=artist')}}", {
            hintText: 'Nhập tên nhạc sỹ',
            noResultsText: "Không tìm thấy nhạc sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addArtist\">\n" +
                "    Thêm mới\n" +
                "</a>",
            searchingText: 'Đang tìm kiếm...',
            theme: 'facebook',
            preventDuplicates: true,
            prePopulate: '',
        })

        $(".btn-search-filter").click(function () {
            $(".search-list").each(function () {
                $(this).removeClass("active");
            });
            alert($(this).attr('value'));
            $('.' + $(this).attr('value')).addClass("active");
        });
    });
    // =================================search===========================================================

    // $(document).ready(function($) {
    //     var engine1 = new Bloodhound({
    //         remote: {
    //             url: '/search/name?value=%QUERY%',
    //             wildcard: '%QUERY%'
    //         },
    //         datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
    //         queryTokenizer: Bloodhound.tokenizers.whitespace
    //     });
    //
    //     // var engine2 = new Bloodhound({
    //     //     remote: {
    //     //         url: '/search/name?value=%QUERY%',
    //     //         wildcard: '%QUERY%'
    //     //     },
    //     //     datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
    //     //     queryTokenizer: Bloodhound.tokenizers.whitespace
    //     // });
    //     //
    //     // var engine3 = new Bloodhound({
    //     //     remote: {
    //     //         url: '/search/name?value=%QUERY%',
    //     //         wildcard: '%QUERY%'
    //     //     },
    //     //     datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
    //     //     queryTokenizer: Bloodhound.tokenizers.whitespace
    //     // });
    //
    //     $(".search-input").typeahead({
    //         hint: true,
    //         highlight: true,
    //         minLength: 1
    //     }, [
    //         {
    //             source: engine1.ttAdapter(),
    //             name: 'songs-name',
    //             display: function(data) {
    //                 return data.name;
    //             },
    //             templates: {
    //                 empty: [
    //                     '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
    //                 ],
    //                 header: [
    //                     '<div class="header-title">Name</div><div class="list-group search-results-dropdown"></div>'
    //                 ],
    //                 suggestion: function (data) {
    //                     return '<a href="/songs/' + data.id + '" class="list-group-item">' + data.name + '</a>';
    //                 }
    //             }
    //         },
    //         // {
    //         //     source: engine2.ttAdapter(),
    //         //     name: 'singers-name',
    //         //     display: function(data) {
    //         //         return data.email;
    //         //     },
    //         //     templates: {
    //         //         empty: [
    //         //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
    //         //         ],
    //         //         header: [
    //         //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"></div>'
    //         //         ],
    //         //         suggestion: function (data) {
    //         //             return '<a href="/students/' + data.id + '" class="list-group-item">' + data.email + '</a>';
    //         //         }
    //         //     }
    //         // },
    //         //
    //         // {
    //         //     source: engine3.ttAdapter(),
    //         //     name: 'splaylists-name',
    //         //     display: function(data) {
    //         //         return data.email;
    //         //     },
    //         //     templates: {
    //         //         empty: [
    //         //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
    //         //         ],
    //         //         header: [
    //         //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"></div>'
    //         //         ],
    //         //         suggestion: function (data) {
    //         //             return '<a href="/students/' + data.id + '" class="list-group-item">' + data.email + '</a>';
    //         //         }
    //         //     }
    //         // }
    //     ]);
    // });

</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                console.log(e);
                $('#blaha').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            console.log('khong co file');
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
</script>
