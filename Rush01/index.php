<html>
<head>
  <link rel="stylesheet" type="text/css" href="map.css">
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="map.js"></script>
  <meta charset="utf-8">
 
</head>

<?php
require_once 'Ship.class.php';
require_once 'Weapon.class.php';
include 'build_map.php';
include 'select_ship.php';
include 'action.php';
session_start();
 ?>
  <header>
      <a id="logo" href="../index.php">Awesome Starships Battles II</a>
      <ul>
        <?php
          if ($_SESSION['loggued_on_user'])
            echo ('
              <li><a href="../lobby.php">Lobby</a></li>
              <li><a href="Account/manage.php">'.$_SESSION['loggued_on_user'].'</a></li>
              <li><a href="Account/logout.php">Déconnexion</a><br /></li>');
          else
            echo ('
              <li><a href="Account/Create_account.php">Inscription</a></li>
              <li><a href="Account/login_page.php">Connexion</a><br /></li>');
        ?>
      </ul>
    </header>
    <?php
//	$map = array_fill(0, 100, array_fill(0, 150, 0));
//if (!$_SESSION['loggued_on_user'])
  //header("Location: ../Account/login_page.php");
//echo $_POST['row'];
  /*if (!$_SESSION['fleet'])
  {
    $_SESSION['fleet'] = array();
  	$_SESSION['fleet'][0] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE1, "POSITION" => Array(7, 25), "ORIENTATION" => S));
  	$_SESSION['fleet'][1] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE1, "POSITION" => Array(7, 20), "ORIENTATION" => S));
  	$_SESSION['fleet'][2] = new Ship(Array("PRESET" => IMPERIAL_DESTROYER, "POSITION" => Array(7, 15), "ORIENTATION" => S));
  	$_SESSION['fleet'][3] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE2, "POSITION" => Array(7, 10), "ORIENTATION" => S));
  	$_SESSION['fleet'][4] = new Ship(Array("PRESET" => IMPERIAL_CRUISER, "POSITION" => Array(7, 5), "ORIENTATION" => S));
  	$_SESSION['fleet'][5] = new Ship(Array("PRESET" => ORK_FRIGATE1, "POSITION" => Array(93, 125), "ORIENTATION" => N));
  	$_SESSION['fleet'][6] = new Ship(Array("PRESET" => ORK_FRIGATE2, "POSITION" => Array(93, 130), "ORIENTATION" => N));
  	$_SESSION['fleet'][7] = new Ship(Array("PRESET" => ORK_FRIGATE1, "POSITION" => Array(93, 135), "ORIENTATION" => N));
  	$_SESSION['fleet'][8] = new Ship(Array("PRESET" => ORK_FRIGATE2, "POSITION" => Array(93, 140), "ORIENTATION" => N));
  	$_SESSION['fleet'][9] = new Ship(Array("PRESET" => ORK_FRIGATE1, "POSITION" => Array(93, 145), "ORIENTATION" => N));
    $map = update_map();
  }*/
  $map = update_map();
//	echo " a" . $_SESSION['fleet'][$_SESSION['select']]; //useless but necesary
  echo " b" . $_SESSION['phase'] . " ";
 // $_SESSION['fleet'][1]->orientation = S;
	if (($map[$_GET['row']][$_GET['col']] != null) && $_SESSION['phase'] == 0)
	{
    $_SESSION['phase'] = 1;
		$_SESSION['select'] = select_ship($_GET['row'], $_GET['col'], $_SESSION['fleet']);
    $_SESSION['pp'] = $_SESSION['fleet'][$_SESSION['select']]->_pp;

    //$_SESSION['pp'] = 2;

    echo $_SESSION['fleet'][$_SESSION['select']]->_name . "Selected";
	}
  if ($_SESSION['phase'] == 1)
  {
    echo "<input method=\"post\" type=\"submit\" value=\"Turn left\"  name=\"left\"  onClick='location.href=\"?action=left\"' >";
    echo "<input method=\"post\" type=\"submit\" value=\"Advance\"  name=\"advance\"  onClick='location.href=\"?action=advance\"' >";
    echo "<input method=\"post\" type=\"submit\" value=\"Turn right\"  name=\"right\"  onClick='location.href=\"?action=right\"' >";
  //  echo "<input method=\"post\" type=\"submit\" value=\"Shoot\"  name=\"shoot\"  onClick='location.href=\"?action=shoot\"' >";
    //echo "<input method=\"post\" type=\"submit\" value=\"Shield\"  name=\"shield\"  onClick='location.href=\"?action=shield\"' >";
    if ($_GET['action'])
    {
     // print_r($map);
       $_SESSION['pp']--;
      action($_GET['action'], $map);
    }
   
    echo "PP = " . $_SESSION['pp'];
    if ($_SESSION['pp'] == 0)
    {
      unset($_SESSION['select']);
      $_SESSION['phase'] = 2;
    }
  }
	else
  {
		echo $map[$_GET['row']][$_GET['col']];
   echo $_SESSION['fleet'][select_ship($_GET['row'], $_GET['col'], $_SESSION['fleet'])]->_name . "NOT SELECTED";
}

  if ($_SESSION['phase'] == 2)
    $_SESSION['phase'] = 0;
	//if ($_GET['ship'])
  $map = update_map();
	//{

	//}
?>




<script>
var lastClicked;
var grid = clickableGrid(100,150, <?php echo json_encode($map); ?>, function(el,row,col,i)
{
  console.log("You clicked on element:",el);
  console.log("You clicked on row:",row);
  console.log("You clicked on col:",col);
  console.log("You clicked on item #:",i);
//var javascript_variable = <?php echo(json_encode($myVariable)); ?>;
  //  grid.rows[0].cells[1].innerHTML = javascript_variable;

  el.className='clicked';
  if (lastClicked)
    lastClicked.className='';
  lastClicked = el;
 // window.some_variable = '<?=$_POST['some_value']?>'; 
//$.post( "index.php", { row: row, col: col } );
   // $.post("index.php", function(data, status){
     //   alert("row: " + row + "\ncol: " + col);
    //});
  var string_url = "index.php?row=" + row + "&col=" + col;
  window.location = string_url;
});

document.body.appendChild(grid);
</script>


</head>
<body>
<form action="test.php" method="post" onsubmit="return doStuff()">
  <input type="hidden" name="user_answer" id="Attack" value="Advance" />
  <input type="submit" value="Click me" />
</form>

<body>
</body>
</html>