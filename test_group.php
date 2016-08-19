
function check_array(arr)
{
	var req=new XMLHttpRequest();
	req.onreadystatechange=function(){alert(req.readyState);
			if(req.readyState == 4 && req.status == 200)
			{
				var str=req.responseText;
				if(str!="done")
				{
				var s="' "str+" ' are not registered users!!";
					Materialize.toast(s,2000,'rounded');
					reg_err=true;
				}
				else
				{
					reg_err=false;
				}
			}
			
	};
	req.open("POST","check_entered_user.php?array="+arr,true);
	req.send();
}