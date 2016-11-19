<?php
/*
	������ ��� ��������� �������� "��-����" �� ������ Minecraft. (c) synthetic.
	������ �������: http://mysite.ru/getavatar.php?login=synthetic
*/

// ========== ��������� ===========
$skins_path = 'fmx/Skins/'; // ���� � ����� �� �������. ���� � ����� ����������.
$default_skin = 'Default.png'; // ��� ����� ���������� �����
$variable_size = true; // ���������� �� ������ ������� ��������, � ����������� �� ������� �����?
// ���� variable_size = true, �� �������� �������� �������, �� ����� ����� ������� CSS: https://www.google.ru/search?q=css+disable+resize+antialiasing
// ���� variable_size = false, �� �������� ����� ������� �� ������ �������, ����������� ���������, �� �� ����� ������� � CSS.
$constant_size = 64; // ������ ������ �������� ��� ������ variable_size = false
// ================================
// ����������� ������������ ������: https://github.com/minotar/skin-spec

$login = filter_input(INPUT_GET, 'login', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

$filename = $skins_path.$login.'.png';

if (!file_exists($filename)) {
	$filename = $skins_path.$default_skin;
	if (!file_exists($filename)) {
		http_response_code(404);
		exit;
	}
}

header('Content-type: image/png');
header('Content-Disposition: inline; filename="'.$login.'.png" ');
header('Cache-control: public, max-age=3600');

$skin = imagecreatefrompng($filename);

// ���� ������������ png ����
if ($skin === false) {
	http_response_code(404);
	exit;
}

$width = imagesx ($skin);
$height = imagesy ($skin);

// ��������� ������� ����� �� ������������
if ($width < 64 || $height != $width && $height * 2 != $width) {
	http_response_code(404);
	exit;
}

// ���������, �������� �� ���� ���������� �������
$transparency = false;
for($i = 0; $i < $width; $i++) {
    for($j = 0; $j < $height; $j++) {
        $rgba = imagecolorat($skin, $i, $j);
        if(($rgba & 0x7F000000) >> 24) {
            $transparency = true;
            break 2;
        }
    }
}

$size_src = intval($width / 64) * 8;
$size_dst = $variable_size ? $size_src : $constant_size;

// ������ ����������� � ������ ����� (��-��������� ���� ����� ������)
$img = imagecreatetruecolor($size_dst, $size_dst);
imagefill($img, 0, 0, imagecolorallocate($img, 0, 0, 0));

// �������� ����
imagecopyresized ($img, $skin, 0, 0, $size_src, $size_src, $size_dst, $size_dst, $size_src, $size_src);
// ���� ������������ ��������������, ����������� ����
if ($transparency)
	imagecopyresized ($img, $skin, 0, 0, $size_src * 5, $size_src, $size_dst, $size_dst, $size_src, $size_src);

imagepng($img);
imagedestroy($img);

?>
