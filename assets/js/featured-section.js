jQuery(function($) {

    $("li[data-filter]").click(function(e) {

        // alert(wfs.ajaxurl);
        var data_filter = $(this).attr('data-filter');
        var data_nonce = $("#fr").val();

        var data = {
            action: "form_field",
            woodpress_data_filter: data_filter,
            woodpress_data_nonce: data_nonce,

        };

        // console.log(data);

        $.ajax({
            url: wfs.ajaxurl,
            data: data,
            type: "post",

            success: function(result) {
                $('#woodpress_featured__filter').html(result)
            }
        })

    });

    // for all product show 1st technique
    var data_filter = '*';

    if (data_filter == '*') {
        var data_filter = $(this).attr('data-filter');
        var data_nonce = $("#fr").val();

        var data = {
            action: "form_field",
            woodpress_data_filter: data_filter,
            woodpress_data_nonce: data_nonce,

        };

        // console.log(data);

        $.ajax({
            url: wfs.ajaxurl,
            data: data,
            type: "post",

            success: function(result) {
                $('#woodpress_featured__filter').html(result)
            }
        })
    }

    // for all product show 2nd technique
    // var data_filter = $(this).attr('data-filter');
    // var data_nonce = $("#fr").val();

    // var data = {
    //     action: "form_field",
    //     woodpress_data_filter: data_filter,
    //     woodpress_data_nonce: data_nonce,

    // };

    // // console.log(data);

    // $.ajax({
    //         url: wfs.ajaxurl,
    //         data: data,
    //         type: "post",

    //         success: function(result) {
    //             $('#woodpress_featured__filter').html(result)
    //         }
    //     })
    // end 





});