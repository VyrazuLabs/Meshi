<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<p class="newpass">Click this link to change your password <span class="passno"><a href="{{ url('/password/changing/')."/".$uniqueid."/".Crypt::encrypt($email) }}"> 'link for new password'</a></span></p>
	</body>
</html>