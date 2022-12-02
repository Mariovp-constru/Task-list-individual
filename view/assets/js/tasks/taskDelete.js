

$(document).on("click", ".excludeTask", function () {

    var title = $('.title-jquery').html();
    var teste = $(this).data('titulo');
    var pegandoId = $(this).val();

    Swal.fire({
        title: 'Você tem certeza que deseja excluir a tarefa: ' + teste + '?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: `Não, cancelar`,

    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: 'ajax-tarefas',
                
                type: 'POST',
                
                data: {
                    'id': pegandoId,
                    'titulo': teste,
                },

                success: function (result) {
                    $('#' + pegandoId).remove();
                },

            });
        }
    })
});