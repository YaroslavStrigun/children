$(document).ready(function () {
    $(function () {
        $(".attachments-block").repeatable({
            template: "#attachments-repeater",
            itemContainer: '.field-group-attachment',
            addTrigger: '.add-attachment',
            deleteTrigger: '.delete-attachment',
        });

        $('.custom-delete-attachment').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        });
    });
});
