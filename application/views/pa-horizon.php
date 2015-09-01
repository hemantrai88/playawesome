  <!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="../deps/css/shell.css"  media="screen,projection"/>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
      <script type="text/javascript" src="../bower_components/materialize/dist/js/materialize.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown();

        var h = $(window).height();
        console.log(h);

        $('.sideBar').css('height',h);
        $('.sideBar-mini').css('height',h);
        $('.base-card').css('height',h-30);

        $(window).resize(function(){
          var h = $(window).height();
          console.log(h);

          $('.sideBar').css('height',h);
          $('.sideBar-mini').css('height',h);
          $('.base-card').css('height',h-30);
        });
      });
      </script>
    </head>

    <body>
  <div class="row">

  <div class="sideBar hide-on-med-and-down">
    <ul>
      <li class="menu-item-li"><i class="material-icons menu-item-icon">search</i><span class="menu-item-label">Search</span></li>
      <li class="menu-item-li"><i class="material-icons menu-item-icon">add</i><span class="menu-item-label">Add new</span></li>
      <li class="menu-item-li"><i class="material-icons menu-item-icon">settings</i><span class="menu-item-label">Settings</span></li>
    </ul>
  </div>

  <div class="side-nav sideBar-mini hide-on-large-only">
    <ul>
      <li class="menu-mini-item-li"><i class="material-icons">search</i></li>
      <li class="menu-mini-item-li"><i class="material-icons">add</i></li>
      <li class="menu-mini-item-li"><i class="material-icons">settings</i></li>
    </ul>
  </div>

  <div class="row">
        <div class="col s2 m2">
          &nbsp;
        </div>
        <div class="col s10 m10">
          <div class="base-card card blue-grey darken-1">
            <div class="card-content white-text">
            </div>
          </div>
          

        </div>
      </div>
    </body>
  </html>