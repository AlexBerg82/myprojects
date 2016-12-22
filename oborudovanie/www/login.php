<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Вход </title></head>
<body background="fon.jpg">

	<div id="parent" style="position:absolute; left:530; top:230">

		<h2> Регистрация пользователя </h2>

		<form action="testreg.php" method="post" align=center>

		<p>
		<label>Ваш логин:<br></label>
		<input name="login" type="text" size="15" maxlength="15"></p>
		<p>

		<label>Ваш пароль:<br></label>
		<input name="password" type="password" size="15" maxlength="15"></p>

		<p>
		<input type="submit" name="submit" value="Войти">
		<br>
		</p>
		</form>
	</div>

<script language="JavaScript">
document.getElementById("parent").style.background="#1E90FF";
</script>

</body>
</html>