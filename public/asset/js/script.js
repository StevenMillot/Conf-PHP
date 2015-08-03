$(function() {

    jQuery('#datetimepickerCreateStart').datetimepicker({
        format: 'Y-m-d H:i:s',
        lang: 'fr',
        onChangeDateTime: function (dp, $input) {
            $input.attr("value", $input.val() + ":00");
        }
    });
    jQuery('#datetimepickerCreateEnd').datetimepicker({
        format: 'Y-m-d H:i:s',
        lang: 'fr',
        onChangeDateTime: function (dp, $input) {
            $input.attr("value", $input.val() + ":00");
        }
    });

    jQuery('#datetimepickerEditStart').datetimepicker({
        format: 'd-m-Y H:i:s',
        lang: 'fr',
        onChangeDateTime: function (dp, $input) {
            $input.attr("value", $input.val() + ":00");
        }
    });

    jQuery('#datetimepickerEditEnd').datetimepicker({
        format: 'd-m-Y H:i:s',
        lang: 'fr',
        onChangeDateTime: function (dp, $input) {
            $input.attr("value", $input.val() + ":00");
        }
    });

});