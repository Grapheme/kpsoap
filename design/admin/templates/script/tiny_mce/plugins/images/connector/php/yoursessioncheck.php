<?php

/**
 * Файл служит проверкой доступа по сессии,
 * вместо user подставьте ваше значение.
 * 
 * Если вы понятия не имеете о чем идет речь
 * и вам безразлична явная уязвимость в безопасности,
 * просто закомментируйте или удалите этот код.
 * 
 */

if(!isset( $_SESSION['login'] )) {
	echo 'В доступе отказано, проверьте файл '.basename(__FILE__);
	exit();
}

?>