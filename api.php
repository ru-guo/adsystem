<?php
$conn=mysql_connect("localhost", "root", "root");
$result=mysql_db_query("zygg", "SELECT * FROM zyads_ads", $conn);
// ��ȡ��ѯ���
$row=mysql_fetch_array($result);
echo "<pre>";
var_dump($row);