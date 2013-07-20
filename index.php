<?php
// ************************************************************************** //
// Project: return (to_life); development website                             //
// Author: db0 (db0company@gmail.com, http://db0.fr/)                         //
// Latest Version is on GitHub: https://github.com/ReturnToLife/Dev           //
// ************************************************************************** //

$pages = array('home'     => array('name' => 'Short presentation',
                                   'icon' => 'home',
                                   'content' => 'https://docs.google.com/document/d/1yTeGzE57fRWVcqIVqUHC72L_nBz-WHHvN-ZgDf43qpA/pub?embedded=true',
                                   'iframe' => true),
               'doc'      => array('name' => 'Full documentation',
                                   'icon' => 'book',
                                   'content' => 'https://docs.google.com/document/d/1B3lAgtmkN3CF6BAe331fz9xPUiOnCXzvPp7CZ3Dv750/pub?embedded=true',
                                   'iframe' => true),
               'api'      => array('name' => 'API web-service',
                                   'icon' => 'share',
                                   'content' => 'https://docs.google.com/document/d/1H7FrCQJen_pwQSjZ93bPfwQo9umWkrQCDS2dsN8TyDQ/pub?embedded=true',
                                   'iframe' => true),
               'src'      => array('name' => 'Sources, contact, contribute!',
                                   'icon' => 'cog',
                                   'content' => '      <h3>Sources</h3>
      <ul>
	<li>Source of the Website:
	  <a href="https://github.com/ReturnToLife/Portal5">
	    https://github.com/ReturnToLife/Portal5
	  </a>
	</li>
	<li>Source of the Web-service:
	  <a href="https://github.com/ReturnToLife/Portal4_API">
	    https://github.com/ReturnToLife/Portal4_API
	  </a>
	</li>
	<li>Source of <b>this</b> Website:
	  <a href="https://github.com/ReturnToLife/Dev">
	    https://github.com/ReturnToLife/Dev
	  </a>
	</li>
      </ul>
      <h3>Contribute!</h3>
      Feel free to contribute by forking these projects on GitHub and make pull requests.<br />
      You can also help us by creating issues for features requests and bugs reports, on GitHub too.<br>
      <br>
      The list of current contributors is on the <a href="?p=team">Team page</a>.
      <h3>Contact us</h3>
      <ul>
         <li>Contact the dev team: <a href="mailto:return-dev@googlegroups.com">return-dev@googlegroups.com</a></li>
         <li>Contact the general team (writers, reporters, ...): <a href="mailto:return-to_life@googlegroups.com">return-to_life@googlegroups.com</a></li>
      </ul>',
                                   'iframe' => false),
               'team'     => array('name' => 'Team',
                                   'icon' => 'user',
                                   'content' => '      <div class="row-fluid">
	<div class="span6 team">
	  <img class="img-circle" width="150"  src="img/team/lepage_b.jpg" />
	</div>
	<div class="span6 team">
	  <img class="img-circle" width="150"  src="img/team/corfa_u.jpg" />
	</div>
      </div>
      <div class="row-fluid">
	<div class="span6 team">
	  Barbara Lepage
	</div>
	<div class="span6 team">
	  Uriel Corfa
	</div>
      </div>
      <div>
         <a href="?p=src"><center><button class="btn btn-success">
           <h4>Want to join the team?</h4>
           <p>Contribute on GitHub or contact us!</p>
         </button></center></a>
      </div>
',
                                   'iframe' => false),
               );
$page = 'home';
if (isset($_GET['p']) && array_key_exists($_GET['p'], $pages))
  $page = $_GET['p'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>return (to_life); - Development page</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        background: #eee;
      }
      .wrap {
        margin: auto;
        margin-top: 2%;
        padding-bottom: 3%;
        width: 80%;
        border: 1px solid #ccc;
        background-color: white;
      }
      iframe {
        width: 100%;
        height: 600px;
        border: none;
      }
      .smalliframe {
        height: 480px;
      }
      .team {
        text-align: center;
	font-weight: bold;
      }
      .team img {
        margin-bottom: 10%;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid wrap">
      <header class="page-header">
	<div class="row-fluid">
          <div class="span1 logo">
            <img src="logo_home.png" alt="return (to_life);" class="logo" />
          </div>
          <div class="span11">
            <h1>return (to_life); <small>/* The Epitech Communication Portal */</small></h1>
          </div>
	</div>
      </header>
      <ul class="nav nav-tabs">
<?php;
foreach ($pages as $id => $info) {
  echo '       <li';
  if ($id == $page)
    echo ' class="active"';
  echo '><a href="?p=';
  echo $id;
  echo '">';
  echo '<i class="icon-';
  echo $info['icon'];
  echo '"></i> ';
  echo $info['name'];
  echo '</a></li>
';
    }
?>
      </ul>

<?php;
if ($pages[$page]['iframe'] === true)
  echo '<iframe src="';
echo $pages[$page]['content'];
if ($pages[$page]['iframe'] === true)
  echo '"></iframe>
';
?>


    </div>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
