$(function () {
    // Mostrar ou ocultar o contador baseado no checkbox
    $('#toggleCounter').change(function () {
        if ($(this).is(':checked')) {
            $('#counterContainer').removeClass('d-none');
        } else {
            $('#counterContainer').addClass('d-none');
        }
    });

    // Função para aumentar o contador
    $('#increaseButton').click(function () {
        let currentValue = parseInt($('#counter').val());
        $('#counter').val(currentValue + 1);
    });

    // Função para diminuir o contador
    $('#decreaseButton').click(function () {
        let currentValue = parseInt($('#counter').val());
        if (currentValue > 0) {
            $('#counter').val(currentValue - 1);
        }
    });
});