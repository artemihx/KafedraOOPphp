<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<?php
$title = $title ?? 'Мой блог';
?>
<title><?= $title ?></title>
<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td>