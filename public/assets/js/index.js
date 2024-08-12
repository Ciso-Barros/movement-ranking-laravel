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
    $('.ver-dados').click(function () {
        var id = $(this).attr('id');
//         Envia uma solicitação AJAX para carregar a view
        $.ajax({
            url: '/tarefa/' + id,
            type: 'GET',
            success: function (response) {
                // Atualiza o conteúdo da modal com a resposta
                $('.modal-body').html(response);
            },
            error: function (xhr) {
                // Trata erros
                $('.modal-body').html('<p>Ocorreu um erro ao carregar os dados.</p>');
            }
        });
    });
});