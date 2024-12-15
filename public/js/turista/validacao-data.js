$(document).ready(function () {
    var today = new Date();
    var maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
    var maxDateString = maxDate.toISOString().split('T')[0];

    $('#turista_data_nascimento').datepicker({
        format: 'yyyy-mm-dd',
        endDate: maxDateString,
        autoclose: true,
        todayBtn: 'linked',
        clearBtn: true
    });

    $('#turista_data_nascimento').on('change', function () {
        var selectedDate = new Date($(this).val());

        if (selectedDate > maxDate) {
            $('#date-error').show();
            $(this).val('');
        } else {
            $('#date-error').hide();
        }
    });
});
