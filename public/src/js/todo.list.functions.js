
/*
* jQuery
* */
swal({
    title: "Excluir",
    text: "Confirma a exclusão da tarefa?",
    type: "error",
    showCancelButton: true,
    confirmButtonText: "Sim",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false,
    closeOnCancel: true
}, function () {
    swal("Finalizado", "Tarefa excluída com sucesso", "success");
})

