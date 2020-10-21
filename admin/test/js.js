$(document).ready(function () {
    $("#country").change(function () {
        var country_id = $(this).val();
        $.ajax({
            url: "JobCategory.php",
            data: {c_id: country_id},
            type: 'POST',
            success: function (response) {
                var resp = $.trim(response);
                $("#state").html(resp);
            }
        });
    });
});
