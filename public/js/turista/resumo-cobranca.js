// Script para alternar a seta
$('#collapseContent').on('show.bs.collapse', function () {
    $('.arrow').removeClass('fa-chevron-down').addClass('fa-chevron-up');
}).on('hide.bs.collapse', function () {
    $('.arrow').removeClass('fa-chevron-up').addClass('fa-chevron-down');
});

$('#collapseContentResumo').on('show.bs.collapse', function () {
    $('.arrow').removeClass('fa-chevron-down').addClass('fa-chevron-up');
}).on('hide.bs.collapse', function () {
    $('.arrow').removeClass('fa-chevron-up').addClass('fa-chevron-down');
});
