      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown();

        var h = $(window).height();

        $('.side-bar').css('height',h);
        $('.panel').css('height',h);
        $('.base-card').css('height',h*0.80);

        $(window).resize(function(){
          var h = $(window).height();

          $('.side-bar').css('height',h);
          $('.panel').css('height',h);
          $('.base-card').css('height',h*0.80);
        });

        var page_base = $('#main-card');
        $.ajax({
                url: "../templates/pa-showcase.html",
                context: page_base
              }).done(function(data) {
                $( this ).addClass( "done" );
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
            },500);
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



      });
