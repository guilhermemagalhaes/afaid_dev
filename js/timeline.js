$( document ).ready(function() {
    $("#btnsite").click(function() {
      $('#modalsite').modal('setting', 'scale').modal('show');
    });
    $("#btnlocal").click(function() {
      $('#modallocal').modal('setting', 'scale').modal('show');
    });

    $('#modaledit').modal('setting', 'scale').modal('show');

    


    
  });
  $(document)
  .ready(function() {
    $('.ui.dropdown')
    .dropdown({
      on: 'click'
    })
    ;
  })
  ;
  