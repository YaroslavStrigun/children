$(document).ready(function () {
    $(function () {
        $(".videos-block").repeatable({
            template: "#videos-repeater",
            itemContainer: '.field-group-video',
            addTrigger: '.add-video',
            deleteTrigger: '.delete-video',
        });
    })
});