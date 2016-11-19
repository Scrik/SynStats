<?php

// ���� � ����� servers.php
// Path to servers.php
$server_path = 'http://mysite.com/stats/server.php';

// ���� � ����� avatar.php
// Path fo avatar.php
$avatar_path = 'http://mysite.com/avatar.php';

// ������������ �� �� ��� ��������� ������ �������������. ����� ����� �������������� ��������� ����.
// Should we use a database to get a players list. Text file will be used instead.
$use_database = true;

// ���� � ����� �� ������� �������������. ����� �������������� ���� $use_database == false
// Path fo text file with list of logins. Will be used if $use_database == false
$players_list_filename = 'players_list.txt';

// �������� ����� ��������� ���������� � server.php, � ��������
// Interval between updates of all stats with query to server.php, in seconds
$update_time = 3500;

// ������� ������� ���������� �� ����� ��������
// How many players should be displayed at one page
$players_at_page = 20;

// ���������� ������ ��� ������������ ���������. �������� ����� ������� ��� ������ 7.
// A number of buttins in page navigation. Must be an odd number greater or equal to 7.
$buttons_count = 9;

// ������������ ���������� � ��������
// A location of directory with images
$img_dir = '/stats/img/';

// ��� ����� ���� ������ �������������
// Players toplist cache file name
$cache_toplist = 'client_data_cache_toplist.json';

// ��� ����� ���� �������
// Time cache file name
$time_cache = 'client_time_cache.json';

// ��� ����� ���� ������
// Data cache file name
$cache_stats = 'client_data_cache_stats.json';

// === ��������� �� ===
// === Database Settings ===

// �������� ���� ������
// Database name
$db_name = 'mydatabase';

// ��� ������������
// Username to connect
$db_username = 'myusername';

// ������
// Password to connect
$db_password = 'mypassword';

// �����
// DB Address
$db_host = 'localhost';

// SQL-������ �� ��������� ������ �������������
// SQL-query for getting a players list
$user_list_query = 'SELECT username FROM users';

?>
