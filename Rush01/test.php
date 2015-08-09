<html>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="tictactoe.js"></script>

<style>

table.board {
  border: 1px solid green;
  height: 600px;
  width: 600px;
}

body {
  text-align: center;
  align: center;
}

td {
  height: 200px;
  width: 200px;
  text-align: center;
  vertical-align: middle;
  font-size: 100px;
  font-weight: bold;
  font-color: green;
  font-family: geniva, verdana, helvetica;
  border: 1px solid green;
}

#menu {
  text-align: center;
  position: absolute;
  width: 400;
  height: 400;
  margin-left: 100px;
  margin-top: 100px;
  border: 5px double red;
  display: none;
  vertical-align: middle;
  background-color: white;
}

#play_again {
  font-size: 20px;
  color: green;
}

</style>


</head>
<body>

<table align="center" border="0px">
<tr><td>
<div id="menu"></div>
<div id="board"></div>
</td></tr>
</table>

</body>
</html>