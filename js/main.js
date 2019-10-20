$(document).ready(function(){
    $('#delete-modal').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);
      var id = button.data('funcionario');

      var modal = $(this);
      modal.find('.modal-title').text('Excluir Funcionário #' + id);
      modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    });
    
    $('button[type="submit"]').on('click', function(e){
        e.preventDefault();
        
    });
});
