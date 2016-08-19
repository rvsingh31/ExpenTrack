<?php
					include('connection.php');
					$colors=array("blue","red","pink","yellow","green");
					
					$client_name=$_SESSION["client_name"];
					$id=$_SESSION["id"];
					$arr_id=array();
					$sql="select friends_id from friends where user_id='$id'";
					$r=mysqli_query($conn,$sql);
					if(mysqli_num_rows($r)>0)
					{
						while($rw=mysqli_fetch_assoc($r))
						{
							$rand_key=array_rand($colors,1);
							$f_id=$rw["friends_id"];
							array_push($arr_id,$f_id);
						}
						for($a=0;$a<count($arr_id);$a++)
						{
							$q="select name from usersdb where client_id='$arr_id[$a]'";
							$r=mysqli_query($conn,$q);
						
								while($rw=mysqli_fetch_assoc($r))
								{		
									$rand_key=array_rand($colors,1);
									$name=ucfirst($rw["name"]);
									$x=$colors[$rand_key];
									echo " <li><a href='intr_friendsmodal.php?name=$name&id=$arr_id[$a]&color_single=$x' id='links' class='".$colors[$rand_key]."-text text-lighten-2' >".$name."</a></li>";
								}
						}

					}
					$arr2_id=array();
					$sql="select user_id from friends where friends_id='$id'";
					$r=mysqli_query($conn,$sql);
					if(mysqli_num_rows($r)>0)
					{
						while($rw=mysqli_fetch_assoc($r))
						{
							$rand_key=array_rand($colors,1);
							$f_id=$rw["user_id"];
							array_push($arr2_id,$f_id);
						}
						for($a=0;$a<count($arr2_id);$a++)
						{
							$q="select name from usersdb where client_id='$arr2_id[$a]'";
							$r=mysqli_query($conn,$q);
						
								while($rw=mysqli_fetch_assoc($r))
								{		
									$rand_key=array_rand($colors,1);
									$name=ucfirst($rw["name"]);
									$x=$colors[$rand_key];
									echo " <li><a href='intr_friendsmodal.php?name=$name&id=$arr2_id[$a]&color_single=$x' id='links' class='".$colors[$rand_key]."-text text-lighten-2' >".$name."</a></li>";
									
								}
						}	
					}
					
				
				?>
              