<?php
//excel file
header('Content-Type:application/vnd.ms-excel');
header('Content-disposition:attachment;filename='.rand().'.xls');
echo $_GET["data"];

?>