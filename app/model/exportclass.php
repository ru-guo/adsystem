<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_ExportClass
{

		public $dbo = NULL;
		public $objPHPExcel = NULL;

		public function model_exportclass( )
		{
				require( LIB_DIR."/PHPExcel/Classes/PHPExcel.php" );
				$this->objPHPExcel = new PHPExcel( );
		}

		public function dopay( )
		{
				$tidate = $_GET['day'];
				$arrinfo = array( "icbc" => "工商银行", "cmbc" => "招商银行", "ccb" => "建设银行", "abc" => "农业银行", "boc" => "中国银行", "alipay" => "支付�", "tenpay" => "货m���" );
				$paycla = Z::getsingleton( "model_payclass" );
				$objPHPExcel = $this->objPHPExcel;
				$ii = $admingetusernamesumpay = 0;
				$cC = $paycla->getallsumpayuserpaylog( );
				foreach ( ( array )$cC as $value )
				{
						foreach ( $GLOBALS['GLOBALS']['GLOBALS']['C_Bank'] as $key => $value )
						{
								if ( $value['bank'] == $value[0] )
								{
										$bank = $arrinfo[$value[0]];
								}
						}
						$objPHPExcel->setactivesheetindex( $ii )->setcellvalue( "A1", "会员名称" )->setcellvalue( "B1", "收款银行" )->setcellvalue( "C1", "收款帐号" )->setcellvalue( "D1", "收款�" )->setcellvalue( "E1", "实发费用" )->setcellvalue( "F1", "状�" )->setcellvalue( "G1", "结算日期" );
						$sheet = $objPHPExcel->getactivesheet( );
						$sheet->getcolumndimension( "C" )->setautosize( TRUE );
						$sheet->getcolumndimension( "A" )->setautosize( TRUE );
						$sheet->getcolumndimension( "B" )->setwidth( 15 );
						$sheet->getcolumndimension( "D" )->setwidth( 15 );
						$sheet->getcolumndimension( "E" )->setwidth( 15 );
						$sheet->getcolumndimension( "F" )->setwidth( 15 );
						$sheet->getcolumndimension( "G" )->setwidth( 15 );
						$st = $sheet->getstyle( "A" )->getalignment( )->sethorizontal( PHPExcel_Style_Alignment::HORIZONTAL_LEFT )->setvertical( PHPExcel_Style_Alignment::VERTICAL_CENTER );
						$getst = $sheet->getstyle( "C" );
						$getst->getnumberformat( )->setformatcode( "@" );
						$ment = $getst->getalignment( );
						$ment->sethorizontal( PHPExcel_Style_Alignment::HORIZONTAL_LEFT );
						$ment->setvertical( PHPExcel_Style_Alignment::VERTICAL_CENTER );
						$objPHPExcel->getactivesheet( )->getstyle( "A1:G1" )->applyfromarray( array(
								"font" => array( "bold" => TRUE )
						) );
						$objPHPExcel->getactivesheet( )->getstyle( "E" )->getfill( )->setfilltype( PHPExcel_Style_Fill::FILL_SOLID )->getstartcolor( )->setrgb( "FFFF00" );
						$js = 2;
						$getusersemail = $paycla->getuserpaylogrows( $tidate, $value['bank'] );
						foreach ( ( array )$getusersemail as $array )
						{
								if ( $array['status'] )
								{
										$txt = "已支�";
								}
								else
								{
										$txt = "未支�";
								}
								$objPHPExcel->setactivesheetindex( $ii );
								$objPHPExcel->getactivesheet( )->setcellvalue( "A".$js, $array['username'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "B".$js, $bank );
								$objPHPExcel->getactivesheet( )->setcellvalue( "C".$js, $array['bankacc']." " );
								$objPHPExcel->getactivesheet( )->setcellvalue( "D".$js, $array['accountname'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "E".$js, $array['pay'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "F".$js, $txt );
								$objPHPExcel->getactivesheet( )->setcellvalue( "G".$js, $array['addtime'] );
								++$js;
						}
						$contentx = $js;
						$objPHPExcel->setactivesheetindex( $ii );
						$objPHPExcel->getactivesheet( )->settitle( !$bank ? "�" : $bank );
						$objPHPExcel->getactivesheet( )->gettabcolor( )->setargb( "FF0094FF" );
						if ( $ii < count( $cC ) - 1 )
						{
								$objPHPExcel->createsheet( );
						}
						++$ii;
				}
				$xstring = $tidate ? "pay-".$tidate : "pay-all";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-Disposition: attachment;filename=\"".$xstring.".xls\"" );
				header( "Cache-Control: max-age=0" );
				$handle = PHPExcel_IOFactory::createwriter( $objPHPExcel, "Excel5" );
				$handle->save( "php://output" );
				exit( );
		}

		public function doemail( )
		{
				$usercla = Z::getsingleton( "model_userclass" );
				$getusersemail = $usercla->getusersemail( );
				$objPHPExcel = $this->objPHPExcel;
				$objPHPExcel->setactivesheetindex( 0 );
				$sheet = $objPHPExcel->getactivesheet( );
				$sheet->getcolumndimension( "A" )->setautosize( TRUE );
				$js = 1;
				foreach ( ( array )$getusersemail as $array )
				{
						if ( $array )
						{
								$objPHPExcel->getactivesheet( )->setcellvalue( "A".$js, $array['email'] );
								++$js;
						}
				}
				$xstring = "useremail";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-Disposition: attachment;filename=\"".$xstring.".xls\"" );
				header( "Cache-Control: max-age=0" );
				$handle = PHPExcel_IOFactory::createwriter( $objPHPExcel, "Excel5" );
				$handle->save( "php://output" );
				exit( );
		}

		public function dostats( )
		{
				$type = $_GET['type'];
				$statscla = Z::getsingleton( "model_statsclass" );
				$plancla = Z::getsingleton( "model_planclass" );
				$objPHPExcel = $this->objPHPExcel;
				$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "A1", iconv( "gb2312", "gbk", "����" ) )->setcellvalue( "B1", iconv( "gb2312", "gbk", "�����Ŀ" ) )->setcellvalue( "C1", iconv( "gb2312", "gbk", "�����" ) )->setcellvalue( "D1", iconv( "gb2312", "gbk", "������" ) );
				if ( $type == "a" )
				{
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "E1", "点击�" );
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "F1", "扣量" );
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "G1", "二次点击" );
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "H1", "效果�" );
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "I1", "应付金额" );
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "J1", "盈利" );
				}
				else
				{
						$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "E1", "支付" );
				}
				$sheet = $objPHPExcel->getactivesheet( );
				$objPHPExcel->getactivesheet( )->getstyle( "A1:J1" )->applyfromarray( array(
						"font" => array( "bold" => TRUE )
				) );
				$sheet->getcolumndimension( "A" )->setautosize( 30 );
				$js = 3;
				$timerange = $_GET['timerange'];
				if ( $timerange == "a" )
				{
						$text = "�有时间段";
				}
				else if ( $timerange == "t" )
				{
						$text = "昨天";
				}
				else if ( $timerange == "w" )
				{
						$text = "过去�周内";
				}
				else if ( $timerange == "m" )
				{
						$text = "本月�";
				}
				else if ( $timerange == "l" )
				{
						$text = "上月�";
				}
				else
				{
						$text = $timerange;
				}
				$objPHPExcel->getactivesheet( )->mergecells( "A2:J2" );
				$objPHPExcel->getactivesheet( )->setcellvalue( "A2", $text );
				if ( $type == "a" )
				{
						$getusersemail = $statscla->adsplanstatussqlsnums( );
				}
				else
				{
						$getusersemail = $statscla->tplanstatsqlsandnum( );
				}
				foreach ( ( array )$getusersemail as $array )
				{
						$admingetplanone = $plancla->admingetplanone( $array['planid'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "A".$js, $array['day'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "B".$js, $admingetplanone['planname'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "C".$js, $array['views']." " );
						$objPHPExcel->getactivesheet( )->setcellvalue( "D".$js, floor( $array['num'] * ( 1 - $array['dosage'] / 100 ) ) );
						if ( $type == "a" )
						{
								$objPHPExcel->getactivesheet( )->setcellvalue( "E".$js, $array['clicks'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "F".$js, $array['deduction'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "G".$js, $array['do2click'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "H".$js, $array['orders'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "I".$js, $array['sumpay'] );
								$objPHPExcel->getactivesheet( )->setcellvalue( "J".$js, $array['sumprofit'] );
						}
						else
						{
								$objPHPExcel->getactivesheet( )->setcellvalue( "E".$js, round( $array['sumadvpay'] * ( 1 - $array['dosage'] / 100 ), 2 ) );
						}
						++$js;
				}
				$objPHPExcel->getactivesheet( )->settitle( "报表" );
				$xstring = "stats";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-Disposition: attachment;filename=\"".$xstring.".xls\"" );
				header( "Cache-Control: max-age=0" );
				$handle = PHPExcel_IOFactory::createwriter( $objPHPExcel, "Excel5" );
				$handle->save( "php://output" );
				exit( );
		}

		public function dostatsuaz( )
		{
				$type = $_GET['type'];
				$statscla = Z::getsingleton( "model_statsclass" );
				$plancla = Z::getsingleton( "model_planclass" );
				if ( $type == "user" )
				{
						$text = "会员ID";
						$adsid = "uid";
				}
				else if ( $type == "ads" )
				{
						$text = "广告ID";
						$adsid = "adsid";
				}
				else if ( $type == "zone" )
				{
						$text = "广告位ID";
						$adsid = "zoneid";
				}
				$objPHPExcel = $this->objPHPExcel;
				$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "A1", "日期" );
				$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "B1", $text );
				$objPHPExcel->setactivesheetindex( 0 )->setcellvalue( "C1", "浏�M�" )->setcellvalue( "D1", "结算�" )->setcellvalue( "E1", "点击�" )->setcellvalue( "F1", "扣量" )->setcellvalue( "G1", "二次点击" )->setcellvalue( "H1", "效果�" )->setcellvalue( "I1", "应付金额" )->setcellvalue( "J1", "盈利" );
				$sheet = $objPHPExcel->getactivesheet( );
				$objPHPExcel->getactivesheet( )->getstyle( "A1:J1" )->applyfromarray( array(
						"font" => array( "bold" => TRUE )
				) );
				$sheet->getcolumndimension( "A" )->setautosize( 30 );
				$js = 3;
				$timerange = $_GET['timerange'];
				if ( $timerange == "a" )
				{
						$text = "�有时间段";
				}
				else if ( $timerange == "t" )
				{
						$text = "昨天";
				}
				else if ( $timerange == "w" )
				{
						$text = "过去�周内";
				}
				else if ( $timerange == "m" )
				{
						$text = "本月�";
				}
				else if ( $timerange == "l" )
				{
						$text = "上月�";
				}
				else
				{
						$text = $timerange;
				}
				$objPHPExcel->getactivesheet( )->mergecells( "A2:J2" );
				$objPHPExcel->getactivesheet( )->setcellvalue( "A2", $text );
				$getusersemail = $statscla->getdistinctdaystats( $type );
				foreach ( ( array )$getusersemail as $array )
				{
						$admingetplanone = $plancla->admingetplanone( $array['planid'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "A".$js, $array['day'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "B".$js, $array[$adsid] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "C".$js, $array['views']." " );
						$objPHPExcel->getactivesheet( )->setcellvalue( "D".$js, $array['num'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "E".$js, $array['clicks'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "F".$js, $array['deduction'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "G".$js, $array['do2click'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "H".$js, $array['orders'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "I".$js, $array['sumpay'] );
						$objPHPExcel->getactivesheet( )->setcellvalue( "J".$js, $array['sumprofit'] );
						++$js;
				}
				$objPHPExcel->getactivesheet( )->settitle( "报表" );
				$xstring = "stats".$type;
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-Disposition: attachment;filename=\"".$xstring.".xls\"" );
				header( "Cache-Control: max-age=0" );
				$handle = PHPExcel_IOFactory::createwriter( $objPHPExcel, "Excel5" );
				$handle->save( "php://output" );
				exit( );
		}

}

?>
