<?php
include_once '../Helpers/CheckRole.php';
Checkrole("/WebPages/Admin/", 0);

$page_content = '../ContentPages/AdminContent.php';
include '../../Index.php';
