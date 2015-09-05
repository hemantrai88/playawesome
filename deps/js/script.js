      $(document).ready(function(){

        var h = $(window).height();

        $('.side-bar').css('height',h);
        $('.panel').css('height',h);

        $(window).resize(function(){
          var h = $(window).height();

          $('.side-bar').css('height',h);
          $('.panel').css('height',h);
        });

        var page_base = $('#main-card');
        $.ajax({
                url: "../templates/pa-showcase.html",
                context: page_base
              }).done(function(data) {
                $( this ).addClass( "done" );
                $('#working').fadeOut();
                $( this ).html(data);
              });

          $('.side-menu-button').mouseover(function(){
            
              var item = '#'+this.id+'-label';
              var this_item = '#'+this.id;
            _.delay(function(){
              $(this_item).css('left','0');
              $(item).show();
              _.delay(function(){
                if(!$(item).is(":hover")){
                  $(this_item).css('left','14%');
                  $(item).hide();
                }
              },500);
            },1000);
          });

        var menu_items = $('.side-menu-label');

        

        _.each(menu_items, function(item){
            $('#'+item.id).mouseout(function(){
                var id = this.id;
                var menu_item = '#'+id.replace('-label','');
                var menu_item_label = '#'+this.id;

                $(menu_item).css('left','14%');
                $(menu_item_label).hide();
            });

        });

        $('#menu-factory-link, #menu-factory').click(function(){
          $('#working').fadeIn();
          $('#main-card').html('');
          var page_base = $('#main-card');
          $.ajax({
                url: "../templates/pa-factory.html",
                context: page_base
          }).done(function(data) {
                $( this ).addClass( "done" );
                $('#working').fadeOut();
                $( this ).html(data);
          });


        });

        $('#menu-lists-link, #menu-lists').click(function(){
          $('#working').fadeIn();
          $('#main-card').html('');
          var page_base = $('#main-card');
          $.ajax({
                url: "../templates/pa-showcase.html",
                context: page_base
          }).done(function(data) {
                $( this ).addClass( "done" );
                $('#working').fadeOut();
                $( this ).html(data);
          });


        });



      });
