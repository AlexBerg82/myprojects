<?php
session_start();

unset($_SESSION["login"]);
unset($_SESSION["id"]);
unset($_SESSION);

echo '
<script type="text/javascript">
   window.location.href="login.php";
</script>
';
?>