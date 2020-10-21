$(document).ready(function () {
    $("#edul").change(function () {
        var edu = $(this).val();
        $.ajax({
            url: "JobCategory.php",
            data: {c_id: edu},
            type: 'POST',
            success: function (response) {
                var resp = $.trim(response);
                $("#jobcat").html(resp);
            }
        });
    });
});
