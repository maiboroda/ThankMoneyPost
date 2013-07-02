<?php

/*
Plugin Name: Thank Money Post
Plugin URI: http://www.maiboroda.ru/myapp/thank_money_post
Description: Плагин для вывод кнопки пожертвовать через Яндекс.Деньги в публикации. 
Version: 1.0
Author: Maiboroda V. A.
Author URI: http://www.maiboroda.ru
*/

/*  Copyright 2012  Maiboroda V. A.  (email: maiboroda-vladimir@yandex.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Вывод страницы настроек для плагина
function thank_admin_menu(){
    add_options_page('Кнопка пожертвовать', 'Кнопка пожертвовать', 8, basename(__FILE__), 'edit_buttom_thank');
}

add_action('admin_menu', 'thank_admin_menu');

// Сама страница настроек
function edit_buttom_thank() {

print '
<div class="wrap">
    <h2>Настройка кнопки пожетвовать</h2>
     <p>Для настройки плагина <a href="/wp-admin/plugin-editor.php?file=thank_money_post/thank_money_post.php">отредактируйте файл</a> <em>/wp-content/plugins/thank_money_post/thank_money_post.php</em></p>

<p><strong>Измените значение следующих переменных:</strong>
<br/><br/>
$number — номер вашего кошелька (строка 60)<br/>
$sum — сумма пожертвования (строка 62)<br/>
$target — назначение платежа (строка 64)<br/>
</p>

<p><strong>Для вызова в публикации используйте следующий код:</strong> [thank_post]</p>
</div>
';
}

// Функциональная часть плагина
function thank_shortcode () {
	
		// Номер вашего счета в Яндекс.Деньгах
		$number =  '00000000000000';
		// Сумма пожертвования
		$sum = '0';
		// Назначение платежа
		$target = 'Спасибо за пост!';
		
		return "<div id=\"thank_money_post\"><iframe frameborder=\"0\" allowtransparency=\"true\" scrolling=\"no\" src=\"https://money.yandex.ru/embed/small.xml?uid=$number&amp;button-text=06&amp;button-size=s&amp;button-color=white&amp;targets=$target&amp;default-sum=$sum\" width=\"auto\" height=\"31\"></iframe></div>";
}

add_shortcode('thank_post', 'thank_shortcode');
?>