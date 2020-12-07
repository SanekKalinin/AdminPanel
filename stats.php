<?include("includes/db.php");
$width = 400;
$height = 200;
$canv = imagecreatetruecolor($width, $height);
//Цвета
$white = imagecolorallocate($canv, 255, 255, 255);
$gray = imagecolorallocate($canv, 150, 150, 150);
$black = imagecolorallocate($canv, 0, 0, 0);
$red = imagecolorallocate($canv, 255, 0, 0);
$blue = imagecolorallocate($canv, 0, 0, 255);
imagefill($canv,0,0,$white);
//Рисуется квадрат
imagerectangle($canv, 15, 5, $width-5, $height-15, $gray);
//Горизонтальные линии
for($i = 1; $i <= 5; $i++) {
imageline($canv, 15, $height-$i*35, $width-5, $height-$i*35, $gray);
}
//Вертикальные линии
for($i = 1; $i <= 15; $i++) {
imageline($canv, 15+($i*30), 5, 15+($i*30), $height-15, $gray);
}
//Получение статистики из базы данных
$stats_result = mysqli_query($db,"SELECT * FROM statistics");
if($stats_result) {
$last_y = [0,0];
$x = 15;
//Рисуется график
while($stats = mysqli_fetch_array($stats_result)) {
imageline($canv, $x, ($height-15)-$last_y[0], $x+30, ($height-15)-($stats['views']/10), $red);
imageline($canv, $x, ($height-15)-$last_y[1], $x+30, ($height-15)-($stats['comments']/10), $blue);
$last_y[0] = $stats['views']/10;
$last_y[1] = $stats['comments']/10;
$x += 30;
}
} else {echo mysqli_error($db);}
//Вывод изображения
header("Content-type: image/png");
imagepng($canv);
//Освобождение памяти
imagedestroy($canv);
?>