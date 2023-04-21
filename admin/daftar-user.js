$(document).ready(function () {

   $('#keyword').on('keyup', function () {
      $('#container').load('ajax/daftar-user.php?keyword=' + $('#keyword').val())
   })

});