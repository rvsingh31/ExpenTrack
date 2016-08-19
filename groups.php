<?php
					include('connection.php');
					$colors=array("red","pink","yellow","green","amber");
					
					$client_name=$_SESSION["client_name"];
					$sql="select client_id from usersdb where name='$client_name'";
					$result=mysqli_query($conn,$sql);
					$id="";
					while($row=mysqli_fetch_assoc($result))
					{	
						$id=$row["client_id"];
					}
					
					$sql="select group_name,group_id from groupevent where user_id='$id'";
					$r=mysqli_query($conn,$sql);
					if(mysqli_num_rows($r)>0)
					{
						while($rw=mysqli_fetch_assoc($r))
						{	
							$rand_key=array_rand($colors,1);
							$name=$rw["group_name"];
							$i=$rw["group_id"];
							echo " <li><a href='intr_grp_main.php?id=$i&group=$name&color=$colors[$rand_key]' id='links' class='".$colors[$rand_key]."-text text-lighten-2' >".$name."</a></li>";
						}
					}
					else
					{
								$rand_key=array_rand($colors,1);
									echo " <li><a href='#!' id='links' class='".$colors[$rand_key]."-text text-lighten-2' >No Groups!</a></li>";
								
					}
				?>
              