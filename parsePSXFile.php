<?php
foreach ($_FILES["files"] as $file) {
	echo $file['tmp_name'];
}