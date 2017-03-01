<?php
/*
 * ��ȡexcel-demo
 * date:2014-10-19
 * author:liangxifeng 
 */
header("Content-Type:text/html; charset=utf-8");
require_once('Classes/PHPExcel.php');
set_time_limit(0);
ini_set("memory_limit","-1");
function touft8($content)
{
	return iconv("GBK","UTF-8",$content);
}
//excel����ת������
function excelTime($days){
	if(is_numeric($days)){
		//based on 1900-1-1
		$jd = GregorianToJD(1, 1, 1970);
		$gregorian = JDToGregorian($jd+intval($days)-25569);
		$myDate = explode('/',$gregorian);
		$myDateStr = str_pad($myDate[2],4,'0', STR_PAD_LEFT)
		."-".str_pad($myDate[0],2,'0', STR_PAD_LEFT)
		."-".str_pad($myDate[1],2,'0', STR_PAD_LEFT);
		return $myDateStr;
	}
	return $days;
}
$phpreader = new PHPExcel_Reader_Excel5();
$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;   
$cacheSettings = array('memoryCacheSize'=>'200MB'); 
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
$excel = $phpreader->load('data.xls');
$cursheet = $excel->getSheet(0);
$col = PHPExcel_Cell::columnIndexFromString($cursheet->getHighestColumn());
$row = $cursheet->getHighestRow();

$file_write = fopen('excel.sql','a');
for($currow=2;$currow<=$row;$currow++)
{
	//$pro_model = addslashes(trim($cursheet->getCellByColumnAndRow(1,$currow)->getValue()));
	$enterprice		= $cursheet->getCellByColumnAndRow(0,$currow)->getValue();//��ҵ����
	$category_name	= $cursheet->getCellByColumnAndRow(1,$currow)->getValue();//��Ʒ���
	$division_name	= $cursheet->getCellByColumnAndRow(2,$currow)->getValue();//ϸ�����
	$pro_brand		= $cursheet->getCellByColumnAndRow(3,$currow)->getValue();//��ƷƷ��
	$pro_model		= $cursheet->getCellByColumnAndRow(4,$currow)->getValue();//��Ʒ�ͺ�
	$pro_price		= sprintf('%.2f',$cursheet->getCellByColumnAndRow(5,$currow)->getValue());//����ʵ�ۼ۸�
	$merchant_name	= $cursheet->getCellByColumnAndRow(6,$currow)->getValue();//������ҵ�򳧼�
	$remark			= $cursheet->getCellByColumnAndRow(7,$currow)->getValue();//��ע
	$start_time		= excelTime($cursheet->getCellByColumnAndRow(8,$currow)->getValue());//��ʼʱ��
	$end_time		= excelTime($cursheet->getCellByColumnAndRow(9,$currow)->getValue());//����ʱ��
	$inset_sql = 'INSERT INTO csv_2 (enterprice,category_name,division_name,pro_brand,pro_model,pro_price,merchant_name,remark,start_time,end_time) VALUES(\''.$enterprice.'\',\''.$category_name.'\',\''.$division_name.'\',\''.$pro_brand.'\',\''.addslashes($pro_model).'\',\''.$pro_price.'\',\''.$merchant_name.'\',\''.$remark.'\',\''.$start_time.'\',\''.$end_time.'\');';
	fwrite($file_write,$inset_sql."\n");
	//var_dump($enterprice,$category_name,$division_name,$pro_brand,$pro_model,$pro_price,$start_time,$end_time);exit;
}
fclose($file_write);
