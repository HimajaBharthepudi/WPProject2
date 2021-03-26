<!DOCTYPE html >
<?php
session_start();
?>

<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Do you wanna bet??</title>
<link rel="stylesheet" type="text/css" href="style.css" title="style" />
<link rel="shortcut icon" type="image/png" href="icon.png"/>
</head>
<body>
<center><h1>Lucky Dice</h1></center>
<br>
<table width="100%"><tr>
<td><img src="bet1.gif" height="100px" width="100px"/></td>
<td><div id="nav">
<ul id="menu">
 <li><a href="./home.php">Home</a></li>
 <li><a href="./h2p.php">How to Play</a></li>
 <li><a href="./summary.html">Summary of the Project</a></li>
</ul>
</div></td>
<td align="right"><img src="dice1.gif" height="100px" width="100px"/></td></tr></table>
<table border="1px" width="100%" height="100%">

<tr>  <td bgcolor="red"></td><td bgcolor="blue"></td><td bgcolor="yellow"></td><td bgcolor="green"></td><td bgcolor="orange"></td><td>

<table>
<tr>
<td><img src="1.png" height="60px" width="60px"/>One</td></tr>
<tr><td><img src="2.png" height="60px" width="60px"/>Two</td></tr>
<tr><td><img src="3.png" height="60px" width="60px"/>Three</td></tr>
</tr>
<tr>
<td><img src="4.png" height="60px" width="60px"/>Four</td></tr>
<tr><td><img src="5.png" height="60px" width="60px"/>Five</td></tr>
<tr><td><img src="6.png" height="60px" width="60px"/>Six</td></tr>
</tr>
</table>
<br>


</td> <td>
<p><center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <b>Choice:</b>
  <input type="radio" name="bet" value="1" checked>One
  <input type="radio" name="bet" value="2">Two
  <input type="radio" name="bet" value="3">Three
  <input type="radio" name="bet" value="4"> Four
  <input type="radio" name="bet" value="5">Five
    <input type="radio" name="bet" value="0">Six<br>


  <br><br>
  <b>BET Amount:</b>
  <input type="radio" name="betmoney" value="10" checked>$10
  <input type="radio" name="betmoney" value="20">$20
  <input type="radio" name="betmoney" value="40">$40
  <input type="radio" name="betmoney" value="80">$80
  <input type="radio" name="betmoney" value="100">$100
  <input type="radio" name="betmoney" value="500">$500<br>

  <br><br>
<div class="myButton">
  <input type="submit" name="" value="ROLL">
  </div>
</form></center>
</p> </td>
<td><center>
<?php
function generate()
{
$random0 = rand(0,5);
$random1 = rand(0,5);
$random2 = rand(0,5);

$rvariable = array();
$rvariable[0]=$random0;
$rvariable[1]=$random1;
$rvariable[2]=$random2;

 $_SESSION["random0"] = $random0;
 $_SESSION["random1"] = $random1;
 $_SESSION["random2"] = $random2;


return $rvariable;
}



if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	$next = array();
	$next=generate();
	$selected_value= test_input($_POST["bet"]);
	$money=test_input($_POST["betmoney"]);
	$total=0;
	$i=0;
	$bet_value="no selection";
	$status="LOST";
	while($i<3)
	{
		if($selected_value == $next[$i])
		{
			$total=$total+1;
			$status="WIN";
		}

		$i=$i+1;

	}
	$total = $money * $total;
	if( $selected_value == 0)
	{
		$bet_value="Six";
	}
	else if( $selected_value == 1)
	{
		$bet_value="One";
	}
	else if( $selected_value == 2)
	{
		$bet_value="Two";
	}
	else if( $selected_value == 3)
	{
		$bet_value="Three";
	}
	else if( $selected_value == 4)
	{
		$bet_value="Four";
	}else if( $selected_value == 5)
	{
		$bet_value="Five";
	}
	echo "<b>Selection:</b>".$bet_value."<br><br><b>Amount Won:</b>$".$total."<br><br><b>Status:</b>".$status."<br>";

}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</center></td></tr>

</table>
<table width=100%>
<tr>
<td> 
<td><center> <img src="<?php echo $_SESSION["random0"];?>.png" height="60px" width="60px" /></td>
<td><img src="<?php echo $_SESSION["random1"];?>.png" height="60px" width="60px" /></td>
<td><img src="<?php echo $_SESSION["random2"];?>.png" height="60px" width="60px" /></td>
</center></td>
</tr>
</table>
</body>
</html>


