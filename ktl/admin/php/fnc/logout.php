<?php
require_once '../../../session/loggedUser.php';
logoutLoggedUser();
?>
<script>
    window.location.href = '/admin';
</script>
