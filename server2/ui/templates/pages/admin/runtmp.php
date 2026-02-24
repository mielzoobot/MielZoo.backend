<?php
shell_exec("/var/www/mielzoo.cloud/crypte/runtmp.sh");
header('Location: https://mielzoo.cloud/crypte/index.html?success=true');
?>