<form action="{{ url('loginCheck') }}" method="post">
   {{ csrf_field() }}
	user<input type="text" name="username">
	pass<input type="text" name="password">
	<input type="submit" name="submit">
</form>