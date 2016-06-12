<?php
include_once '../Helpers/CheckRole.php';
Checkrole("/WebPages/Admin/", 1);

$page_content = '../ContentPages/AdminContent.php';
include '../../Index.php';
