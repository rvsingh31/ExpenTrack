<?php
	$amount=$_POST["money"];                                           //user_id in db-splitsettle is the one who paid.
//	echo $amount;                                                      // u_id is the one who need to pay back to user_id
	$amt=floatval($amount);
include('connection.php');
	session_start();
	$client_name=$_SESSION["client_name"];
//	echo $client_name;
	//get user_id from usersdb

	$sql="select client_id from usersdb where name='$client_name'";
//	echo "aftr sql";
	$result=mysqli_query($conn,$sql);
//	echo "aftr exe";

//			echo "before while";
			$id="";
			while($row=mysqli_fetch_assoc($result))
			{
	//			echo "in while" ;
				$id=$row["client_id"];
				echo $id;
			}
		
	//	echo $id;
		
		
		$group_id=$_SESSION["group_id"];
		
		
		echo "GRP ID: ".$group_id."<br>";
		
		$sql="select user_id from groupevent where group_id='$group_id'";
		$result=mysqli_query($conn,$sql);
		$arr=array();
		$count=0;
		while($row=mysqli_fetch_assoc($result))
			{
	//			echo "in while" ;
				array_push($arr,$row["user_id"]);
				echo $row["user_id"];
				$count=$count+1;
			}
			echo "<br>";
			$enter=$amt/($count);
			for($a=0;$a<$count;$a++)
			{
			if($arr[$a]!=$id)
			{
					$owe_id=$arr[$a];
					echo $owe_id;
				//	echo $owe_id."<br>";
						$sql="select money from split_settle where user_id='$owe_id' and owe_id='$id' and group_id='$group_id'";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0)
						{
							$row=mysqli_fetch_assoc($result);
							$owe_money=floatval($row["money"]);
							
								$sql="select money from split_settle where user_id='$id' and owe_id='$owe_id' and group_id='$group_id'";
								$r=mysqli_query($conn,$sql);
								if(mysqli_num_rows($r)>0)
								{
									$srow=mysqli_fetch_assoc($r);
									$user_money=floatval($srow["money"]);
									if($user_money>$owe_money)
									{
										$x=$user_money-$owe_money+$enter;
										$sql="update split_settle set money='$x' where user_id='$id' and group_id='$group_id' and owe_id='$owe_id'";
								//		echo $owe_money."  ".$owe_id." ".$id;
										if(mysqli_query($conn,$sql))
										{
											echo "updated user_id bill,decreased the bill ,now deleting the owe_id bill<br>";
										}
										$sql="delete from split_settle where user_id='$owe_id' and group_id='$group_id' and owe_id='$id'";
										if(mysqli_query($conn,$sql))
										{
											echo "deleted the owe_id bill<br>";
										}
									}
									else if($user_money<$owe_money)
									{
										$x=$owe_money-$user_money-$enter;
										$sql="update split_settle set money='$x' where user_id='$owe_id' and group_id='$group_id' and owe_id='$id'";
										if(mysqli_query($conn,$sql))
										{
											echo "updated owe_id bill,decreased the bill ,now deleting the id bill<br>";
										}
										$sql="delete from split_settle where user_id='$id' and group_id='$group_id' and owe_id='$owe_id'";
										if(mysqli_query($conn,$sql))
										{
											echo "deleted the id bill<br>";
										}
									}
									else
									{
										
									}
								}
								else
								{
									if($owe_money>$enter)
									{
										$v=$owe_money-$enter;
										$sql="update split_settle set money='$v' where user_id='$owe_id' and group_id='$group_id' and owe_id='$id'";
										if(mysqli_query($conn,$sql))
										{
											echo "updated owe_id bill,decreased the splitted amt.<br>";
										}
									}
									else if($owe_money<$enter)
									{
										$v=$enter-$owe_money;
										$sql="delete from split_settle where user_id='$owe_id' and group_id='$group_id' and owe_id='$id'";
										if(mysqli_query($conn,$sql))
										{
											echo "deleted the owe_id bill<br>";
										}
										$sql="insert into split_settle(user_id,group_id,owe_id,money) values('$id','$group_id','$owe_id',$v)";
										if(mysqli_query($conn,$sql))
										{
											echo "inserted new bill with money = amt<br>";
										}
									}
									else
									{
											$sql="delete from split_settle where user_id='$owe_id' and group_id='$group_id' and owe_id='$id'";
										if(mysqli_query($conn,$sql))
										{
											echo "deleted the owe_id bill as money = amt <br>";
										}
									}
								}
								
						}
				else
				{
						$sql="select money from split_settle where user_id='$id' and owe_id='$owe_id' and group_id='$group_id'";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0)
						{
							$row=mysqli_fetch_assoc($result);
							$temp=$row["money"];
							$prev_money=floatval($temp);
							$t=$enter+$prev_money;
							$sql="update split_settle set money='$t' where user_id='$id' and owe_id='$owe_id' and group_id='$group_id'";
							if(mysqli_query($conn,$sql))
							{
								echo "updated";
							//		header("location:splitsettle.php?res=Performed action successfully.");
							}
						}
						else
						{
								$sql="insert into split_settle(user_id,group_id,owe_id,money) values('$id','$group_id','$owe_id','$enter')";
								if(mysqli_query($conn,$sql))
								{
									echo "Added <br>";
							//		header("location:splitsettle.php?res=Performed action successfully.");
								}
								else
								{
									echo "could not add<br>";
								}
						}	
						
				}	
			}
				
		}	
			
			//------updating the database such that if a owes some money to b ,
			//and b also owes some money to a,boththe rows must be clubbed into one row.
				header("location:groupmain.php?msg=Performed action successfully.");
			
		
?>