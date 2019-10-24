<?php
require "views/html_top.views.php";
echo "<div class=\"container-fluid pt-3\">";
echo "<div class=\"row\">";
echo "<div class=\"col-6 offset-3\">";
for ($i = 0; $i < 10; $i++) {
    echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
}
for ($i = 0; $i < 3; $i++) {
    echo "</div>";
}
require "views/html_bot.views.php";