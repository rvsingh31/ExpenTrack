<?php

		$from=$_POST["from_date"];
		$to=$_POST["to_date"];
				if(empty($from) || empty($to))
				{
						header("location:single_event.php?msg=Please select dates for report generation!");
					exit;
				}
	session_start();
		include('connection.php');
		$un=$_SESSION["client_name"];
				$sql="select client_id from usersdb where name='$un'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row["client_id"];
		
		$sql="select exp_limit from singleevent where client_id='$id'";
	
		$result=mysqli_query($conn,$sql);

		$row=mysqli_fetch_assoc($result);
		$uplimit=$row["exp_limit"];
	
	
		
		$from_date=array();
		$from_date=explode("/",$from);
		
		$to_date=array();
		$to_date=explode("/",$to);
	
		$my_file = $un.'_file.txt';
		if(file_exists($my_file))
		{
			unlink($my_file);
		}
		
	if($from_date[0]!==$to_date[0])
	{
			header("location:single_event.php?msg=Error in Report Generation.Please select Appropriate dates!");
	}	
	else if($from_date[1]>$to_date[1])
	{
				header("location:single_event.php?msg=Error in Report Generation.Please select Appropriate dates!");
	}
	else
	{
	
		$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file); 
		
		if($from_date[0]==$to_date[0])
		{
			$total=0;
			$day_diff=$to_date[1]-$from_date[1];
			$count=0;
			for($a=$from_date[1];$a<=$to_date[1];$a++)
			{
				$count++;
				if($a===1 || $a===2 || $a===3 || $a===4 || $a===5 || $a===6 || $a===7 || $a===8 || $a===9 )
				{
					$b="0".$a;
					$d=$from_date[0]."/".$b."/".$from_date[2];
				}
				else
				{
					$d=$from_date[0]."/".$a."/".$from_date[2];	
				}
				echo "$d";
				$str="\nOn date:".$d.PHP_EOL;
				fwrite($handle,$str);
				$sql="select note,expense from singleevent where client_id='$id' and date='$d'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					echo "in if";
					while($row=mysqli_fetch_assoc($result))
					{
						echo "in while<br>";
						$exp=$row["expense"];
						$total+=$exp;
						$n=$row["note"];
						$sentence="You spent Rs.".$exp." on ".$n.PHP_EOL;
						fwrite($handle,$sentence);
					}
				}
				else
				{
						$str2="No Expenses on this day.".PHP_EOL;
						fwrite($handle,$str2);
				
				}
			
			}
			$total_limit=$uplimit*$count;
			$last="\nTOTAL EXPENSES:".$total.PHP_EOL;
			$last2="\nTOTAL BUDGET(total limit):".$total_limit.PHP_EOL;
			fwrite($handle,$last);
			fwrite($handle,$last2);
			if($total_limit>$total)
			{
				$x=$total_limit-$total;
				$last3="\nYou saved Rs.".$x." according to the BUDGET you had set!".PHP_EOL;
				fwrite($handle,$last3);
			}
			else if($total_limit<$total)
			{
				$x=$total-$total_limit;
				$last3="\nYou spent Rs.".$x." more than specified Budget!";
					fwrite($handle,$last3);
			}
			
		}
		
		header("location:single_event.php?msg=Report Generated. Click on VIEW REPORT to view/download!");
	}
?>