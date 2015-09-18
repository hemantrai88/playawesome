  <!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="../deps/css/shell.css"  media="screen,projection"/>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
      <script type="text/javascript" src="../bower_components/materialize/dist/js/materialize.min.js"></script>
      <script type="text/javascript" src="../bower_components/underscore/underscore-min.js"></script>
      <script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
      <script type="text/javascript" src="../deps/js/script.js"></script>

    </head>

    <body>
      <div id="working" class="progress">
        <div class="indeterminate"></div>
      </div>
    <div class="row">

      <div class="col s1 m2 l2 side-bar init teal lighten-2 z-depth-5">
        <div id="main-badge" class="row">
          <!-- <img id="main-logo" src="../deps/images/logo/logo.svg"> -->
          <h5 id="logo-text">playAweso.me</h5>
          <div class="divider"></div>
          <div>
            <img id="profile-img" src="../deps/images/profile-img.png" alt="Profile image" class="circle responsive-img">
          </div>
        </div>
        <div id="side-menu" class="row">
          <ul>
            <li id="lists" class="side-menu-item">
              <a id="menu-lists-link" href="javascript:void(0)"><span id="menu-lists-label" class="side-menu-label">Lists</span></a>
              <a id="menu-lists" title="Lists" class="btn-floating btn-large waves-effect waves-light  teal darken-4 side-menu-button"><i class="material-icons">library_music</i></a>
            </li>
            <li id="feed" class="side-menu-item">
              <a id="menu-feed-link" href="javascript:void(0)"><span id="menu-feed-label" class="side-menu-label">Feed</span></a>
              <a id="menu-feed" title="Feed" class="btn-floating btn-large waves-effect waves-light  teal darken-4 side-menu-button"><i class="material-icons">library_books</i></a>
            </li>
            <li id="factory" class="side-menu-item">
              <a id="menu-factory-link" href="javascript:void(0)"><span id="menu-factory-label" class="side-menu-label">Factory</span></a>
              <a id="menu-factory" title="Factory" class="btn-floating btn-large waves-effect waves-light  teal darken-4 side-menu-button"><i class="material-icons">library_add</i></a>
            </li>
            <li id="profile" class="side-menu-item">
              <a id="menu-profile-link" href="javascript:void(0)"><span id="menu-profile-label" class="side-menu-label">Profile</span></a>
              <a id="menu-profile" title="Profile" class="btn-floating btn-large waves-effect waves-light  teal darken-4 side-menu-button"><i class="material-icons">perm_identity</i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col offset-s1 offset-m2 offset-l2 s11 m10 l10 panel teal lighten-5">
        

          <div id="main-card"></div>

      </div>
    </div>

    </body>
  </html>