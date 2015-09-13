$(function() {

    $(".delete-news").click(function(e) {
        var $delLink = $(this);
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          height:180,
          width:400,
          modal: true,
          buttons: {
            "Delete": function() {
              $( this ).dialog( "close" );
              window.location.href="newsmanagement.php?del=" + $delLink.attr("id");
            },
            Cancel: function() {
              $( this ).dialog( "close" );
              e.preventDefault();
            }
          }
        });
    });

    $(".delete-game").click(function(e) {
        var $delLink = $(this);
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          height:180,
          width:400,
          modal: true,
          buttons: {
            "Delete": function() {
              $( this ).dialog( "close" );
              window.location.href="gamemanagement.php?del=" + $delLink.attr("id");
            },
            Cancel: function() {
              $( this ).dialog( "close" );
              e.preventDefault();
            }
          }
        });
    });

  });
