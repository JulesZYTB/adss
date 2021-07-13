
<?php
$filename = 'https://businesshamad.sa/server/php/files/thumbnail/taiba.png';

if (file_exists($filename)) {
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}
?>
