<?php
    setcookie('id', $id, time() - 3600*5, "/");
    echo "<script>location.href = 'index.php';</script>"
?>