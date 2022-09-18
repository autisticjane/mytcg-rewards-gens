<?php
	include("mytcg/settings.php");
	include("$header");
if(!$_SERVER['QUERY_STRING']) {
		?>
<h1>bbcode activity randomizer</h1>
<div class="random-gen">
	<form method="post" action="<?php $_SERVER['PHP_SELF'];?>?pickup">
		<table width="100%">
			<tr><td><label for="activity">Activity:</label></td><td><input id="activity" type="text" name="activity" value="" /></td></tr>
	<tr><td><label="number">Number of Cards:</label></td><td><input id="number" type="text" name="number" value="" /></td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="Generate" /></td></tr>
			</table>
			</form>
</div>
		<?php
	}

elseif($_SERVER['QUERY_STRING']=="pickup") {
				?>
				<h1>Activity rewards</h1>
<div class="random-rewards">
	<textarea onclick="this.focus();this.select()" style="width: 75%;" rows="5">
		<?php
			$result=mysql_query("SELECT * FROM `$table_cards` WHERE `worth`='1'") or die("Unable to select from database.");
			$min=1;
			$max=mysql_num_rows($result);
				for($cards=0; $cards<$_POST['number']; $cards++) {
					mysql_data_seek($result,rand($min,$max)-1);
					$row=mysql_fetch_assoc($result);
					$digits = rand(01,$row['count']);
					if ($digits < 10) {
						$_digits = "0$digits";
					}
					else {
						$_digits = $digits;
					}
					$card = "$row[filename]$_digits";
					echo "[img]$tcgcardurl$card.png[/img]";
					$rewards1 .= $card.", ";
				}
			$rewards1 = substr_replace($rewards1,"",-2);
			echo "{$_POST['activity']}: $rewards1";
		?>
	</textarea>

				<?php
			}
			else {
				?>
				<h1>Error</h1>
				It looks like there was an error in processing the form. Go back and try again.
				<?php
			}
	include("$footer");
?>
