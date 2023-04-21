$(document).ready(function () {

   $('#keyword').on('keyup', function () {
      $('#container').load('ajax/admin.php?keyword=' + $('#keyword').val())
   })

});
