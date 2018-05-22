<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h3>{{ trans('app.Forgot Password') }}?</h3>
		<p>{{ trans('app.email template text') }}</p>
		<span class="passno">
			<a href="{{ url('/password/changing/')."/".$uniqueid."/".Crypt::encrypt($email) }}"><button class="email-button" style="cursor: pointer;">{{ trans('app.RESET PASSWORD') }}</button></a>
		</span>
	</body>
</html>
