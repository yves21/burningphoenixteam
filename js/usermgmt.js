$(document).ready(function () {
    $("#bt_submit").click(function (e) {
        $(":checkbox[name='roles']").each(function () {
            var $nexthidden = $(this).next();
            if ($(this).prop("checked")) {
                $nexthidden.val($(this).val() + "/checked");
            } else {
                $nexthidden.val($(this).val() + "/unchecked");
            }
        });
    });
});
