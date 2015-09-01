      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown();

        var h = $(window).height();

        $('.side-bar').css('height',h);
        $('.side-bar-mini').css('height',h);
        $('.base-card').css('height',h*0.80);

        $(window).resize(function(){
          var h = $(window).height();

          $('.side-bar').css('height',h);
          $('.side-bar-mini').css('height',h);
          $('.base-card').css('height',h*0.80);
        });

        var page_base = $('#page');
        $.ajax({
                url: "../templates/pa-showcase.html",
                context: page_base
              }).done(function(data) {
                $( this ).addClass( "done" );
                $( this ).html(data);
              });

      });
