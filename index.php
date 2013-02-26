<?php
// ************************************************************************** //
// Project: return (to_life); development website                             //
// Author: db0 (db0company@gmail.com, http://db0.fr/)                         //
// Latest Version is on GitHub: https://github.com/ReturnToLife/Dev           //
// ************************************************************************** //

function	progress() {
  // do not execute unless needed
  if ($_GET['p'] != 'progress')
    return '';

  // conf
  $dateformat = 'M j';
  $firstweek = 5;
  $totalweek = 19;
  $doclist = 'https://docs.google.com/spreadsheet/pub?key=0Ag8n0yHMUHF-dEVTd2FwazBYb29TT2JhdXF6NWFsSmc&single=true&gid=0&output=csv';

  // get document links list
  $f = fopen($doclist, 'r');
  while ($l = fgetcsv($f)) {
    $doclinks[intval($l[0])] = $l[1];
  }
  fclose($f);

  // calculate dates
  $menu = array();
  for ($nbweek = $firstweek; $nbweek <= $totalweek; $nbweek++) {
    $weekstart = strtotime('2013W'.($nbweek < 10 ? '0' : '').$nbweek);
    $menu[$nbweek] =
      array('start' => date($dateformat, $weekstart),
	    'end'   => date($dateformat, strtotime('+ 6 days', $weekstart)));
  }

  // which week will be displayed?
  $doc = intval(date('W')) - 1;
  if (isset($_GET['w']))
    $doc = $_GET['w'];
  if (!array_key_exists(intval($doc), $menu))
    $doc = $firstweek;

  $ret = '      <div class="row-fluid">
        <div class="span3">
          <ul class="nav nav-tabs nav-stacked">
';

  foreach ($menu as $nbweek => $week) {
    $ret .= '              <li';
    if ($doc == $nbweek)
      $ret .= ' class="active"';
    $ret .= '>';
    $ret .= '<a href="?p=progress&w='.$nbweek.'">';
    $ret .= $week['start'].' - '.$week['end'];
    $ret .= '</a></li>
';
  }

  $ret .= '          </ul>
        </div>
       <div class="span9">
         ';

  $available_formats =
    array('Excel'   => 'xls',
	  'CSV'     => 'csv',
	  'Text'    => 'txt',
	  'PDF'     => 'pdf',
	  'OpenDoc' => 'ods');
  if (!array_key_exists(intval($doc), $doclinks))
    $ret .= '<p>Not available.</p>
';
  else {
    $ret .= '<i class="icon-download"></i> Download this file 
';
    foreach ($available_formats as $format => $extension) {
      $ret .= '         - <a target="_blank" href="';
      $ret .= str_replace('output=html', 'output='.$extension, $doclinks[$doc]);
      $ret .= '">'.$format.'</a>
';
    }
    $ret .= '         <hr>
         <iframe class="smalliframe" src="'.$doclinks[$doc].'"></iframe>
';
  }

  $ret .= '       </div>
';

  return $ret;
  }

$pages = array('home'     => array('name' => 'Presentation',
                                   'icon' => 'home',
                                   'content' => 'https://docs.google.com/document/d/1yTeGzE57fRWVcqIVqUHC72L_nBz-WHHvN-ZgDf43qpA/pub?embedded=true',
                                   'iframe' => true),
               'doc'      => array('name' => 'Documentation',
                                   'icon' => 'book',
                                   'content' => 'https://docs.google.com/document/d/1B3lAgtmkN3CF6BAe331fz9xPUiOnCXzvPp7CZ3Dv750/pub?embedded=true',
                                   'iframe' => true),
               'src'      => array('name' => 'Sources, contributors',
                                   'icon' => 'cog',
                                   'content' => '      <h4>Sources</h4>
      <ul>
	<li>Source of the Website:
	  <a href="https://github.com/ReturnToLife/Portal4">
	    https://github.com/ReturnToLife/Portal4
	  </a>
	</li>
	<li>Source of the Web-service:
	  <a href="https://github.com/db0company/Ionis-Users-Informations-Web-Service">
	    https://github.com/db0company/Ionis-Users-Informations-Web-Service
	  </a>
	</li>
	<li>Source of <b>this</b> Website:
	  <a href="https://github.com/ReturnToLife/Dev">
	    https://github.com/ReturnToLife/Dev
	  </a>
	</li>
      </ul>
      <h4>Contributors</h4>
      Feel free to contribute by forking these projects on GitHub and make pull requests.<br />
      You can also help us by creating issues for features requests and bugs reports, on GitHub too.',
                                   'iframe' => false),
               'api'      => array('name' => 'API',
                                   'icon' => 'share',
                                   'content' => 'https://docs.google.com/document/d/1H7FrCQJen_pwQSjZ93bPfwQo9umWkrQCDS2dsN8TyDQ/pub?embedded=true',
                                   'iframe' => true),
               'progress' => array('name' => 'Progress',
                                   'icon' => 'tasks',
                                   'content' => progress(),
                                   'iframe' => false),
               'team'     => array('name' => 'Team',
                                   'icon' => 'user',
                                   'content' => '      <div class="row-fluid">
	<div class="span3 team">
	  <img class="img-circle" width="150"  src="img/team/lepage_b.jpg" />
	</div>
	<div class="span3 team">
	  <img class="img-circle" width="150"  src="img/team/bideau_s.jpg" />
	</div>
	<div class="span3 team">
	  <img class="img-circle" width="150"  src="img/team/munoz_v.jpg" />
	</div>
	<div class="span3 team">
	  <img class="img-circle" width="150"  src="img/team/meilha_v.jpg" />
	</div>
      </div>
      <div class="row-fluid">
	<div class="span3 team">
	  Barbara Lepage
	</div>
	<div class="span3 team">
	  Sofia Bideaux
	</div>
	<div class="span3 team">
	  Vincent Munoz
	</div>
	<div class="span3 team">
	  Vivien Meilhac
	</div>
      </div>',
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
