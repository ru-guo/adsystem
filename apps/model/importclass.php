<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_ImportClass
{

		public $dbo = NULL;

		public function model_importclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function plandata( $text = "" )
		{
				$plancla = Z::getsingleton( "model_planclass" );
				$usercla = Z::getsingleton( "model_userclass" );
				$text = $text == "" ? $_POST['postdata'] : $text;
				$planid = ( integer )$_POST['planid'];
				$admingetplanone = $plancla->admingetplanone( $planid );
				$plantype = $admingetplanone['plantype'];
				if ( is_array( $text ) )
				{
						$content = $text;
				}
				else
				{
						$content = explode( chr( 10 ), $text );
				}
				if ( !$admingetplanone )
				{
						return "请选择一个广告计划";
				}
				if ( !$text )
				{
						return "数据为空";
				}
				foreach ( ( array )$content as $key => $value )
				{
						$darr = explode( "|", $value );
						$day = trim( $darr['0'] );
						if ( $day && !pregdate( $day ) )
						{
								return "第".( $key + 1 )."行数据：".$content[$key]."中的".$day." 的日期错误";
						}
						$nfuid = ( integer )$darr['1'];
						$i = $usercla->getusersuidrow( ( integer )$nfuid );
						if ( !$i || $i['type'] == 2 )
						{
								return "第".( $key + 1 )."行数据：".$content[$key]." 没有这个网站主Id ".$nfuid;
						}
						if ( $plantype == "cps" )
						{
								$da2 = $darr['2'];
								if ( !$da2 )
								{
										return "第".( $key + 1 )."行数据：".$content[$key]." 没有订单号";
								}
								$da3 = floatval( $darr['3'] );
								if ( $da3 <= 0 )
								{
										return "第".( $key + 1 )."行数据：".$content[$key]." 订单价格不正确";
								}
								$da4 = ( integer )$darr['4'];
								if ( 99 < $da4 )
								{
										return "第".( $key + 1 )."行数据：".$content[$key]." 网站主分成比例不能大于99";
								}
								$da5 = ( integer )$darr['5'];
								if ( 99 < $da4 )
								{
										return "第".( $key + 1 )."行数据：".$content[$key]." 广告商分成比例不能大于99";
								}
								if ( 1 < $da4 && !( $da5 < 1 ) && !( $da4 < 1 ) || !( 1 < $da5 ) )
								{
										continue;
								}
								return "第".( $key + 1 )."行数据：".$content[$key]." 填写了分成比例，但是只有网站主或是广告商分成一个，必需两个一起填";
						}
						$url_num = ( integer )$darr['2'];
						if ( $url_num && !( 10000 < $url_num ) )
						{
						}
						else
						{
								return "第".( $key + 1 )."行数据：".$content[$key]." 结算数必须为整数或是小于10000的数字";
						}
				}
				return "ok";
		}

		public function planstat( )
		{
				$statscla = Z::getsingleton( "model_statsclass" );
				$plancla = Z::getsingleton( "model_planclass" );
				$planid = ( integer )$_POST['planid'];
				$files = $_POST['files'];
				$admingetplanone = $plancla->admingetplanone( $planid );
				if ( $files == "up" )
				{
						$string = $_FILES['importfile']['tmp_name'];
						$name = $this->extvaliad( $_FILES['importfile']['name'] );
						if ( !in_array( $name, array( "txt", "xls" ) ) && $files == "up" )
						{
								alert( "只是能是txt和xls文档" );
						}
						if ( $name == "txt" )
						{
								$content = file( $string );
						}
						else
						{
								$content = $this->readxlstodata( $string );
						}
				}
				else
				{
						$text = $_POST['postdata'];
						$content = explode( chr( 10 ), $text );
				}
				$plandata = $this->plandata( $content );
				if ( $plandata == "ok" )
				{
						foreach ( ( array )$content as $key => $value )
						{
								$darr = explode( "|", $value );
								$day = trim( $darr['0'] );
								$nfuid = ( integer )$darr['1'];
								if ( $admingetplanone['plantype'] == "cps" )
								{
										$da2 = $darr['2'];
										$darr3 = $darr['3'];
										$da4 = ( integer )$darr['4'];
										$darr5 = ( integer )$darr['5'];
										$this->createimportlog( $planid, $nfuid, 1, $day, $da2, $darr3, $da4, $darr5 );
								}
								else
								{
										$url_num = ( integer )$darr['2'];
										$this->createimportlog( $planid, $nfuid, $url_num, $day );
								}
						}
				}
				header( "Location:do.php?action=import&actiontype=import" );
		}

		public function createimportlog( $planid, $nfuid, $url_num, $tidate = "", $da2 = "", $darr3 = "", $da4 = "", $darr5 = "", $like = "" )
		{
				$tidate = $tidate ? $tidate : DAYS;
				$plancla = Z::getsingleton( "model_planclass" );
				$usercla = Z::getsingleton( "model_userclass" );
				$restr = $plancla->admingetplanone( $planid );
				if ( $restr['gradeprice'] == 1 )
				{
						$grade = 0;
						$gradeprice = "s".$grade."price";
						$restr['price'] = $restr[$gradeprice];
				}
				$clearing = $restr['clearing']."money";
				if ( $restr['plantype'] == "cps" )
				{
						if ( $da4 < 1 && $darr5 < 1 )
						{
								$da4 = $restr['price'];
								$darr5 = $restr['priceadv'];
								$rats = $darr3 * ( $da4 / 100 );
								$sitetype = $darr3 * ( $darr5 / 100 );
						}
						else
						{
								$rats = $darr3 * ( $da4 / 100 );
								$sitetype = $darr3 * ( $darr5 / 100 );
						}
				}
				else
				{
						$rats = $restr['price'] * $url_num;
						$sitetype = $restr['priceadv'] * $url_num;
				}
				$admingetusernamesumpay = $rats;
				$priceadv = $sitetype;
				$priceadvsv = $sitetype - $rats;
				$array = array(
						"uid" => $nfuid,
						"planid" => $planid,
						"num" => $url_num,
						"orders" => $da2,
						"ordersprices" => $darr3,
						"userproportion" => $da4,
						"advproportion" => $darr5,
						"userprice" => $restr['price'],
						"advprice" => $restr['priceadv'],
						"sumpay" => $admingetusernamesumpay,
						"sumadvpay" => $priceadv,
						"sumprofit" => $priceadvsv,
						"addtime" => DATETIMES,
						"day" => $tidate
				);
				if ( !defined( "IN_API" ) )
				{
						$query = $this->dbo->create( $array, "zyads_import" );
				}
				$this->dbo->query( "INSERT INTO zyads_planstats (plantype,num,deduction,day,sumpay,sumprofit,sumadvpay,planid,uid) VALUES('".$restr['plantype']."','".$url_num."','0','".$tidate."','".$admingetusernamesumpay."','".$priceadvsv."','".$priceadv."','".$restr['planid']."','".$restr['uid'].( "') ON DUPLICATE KEY UPDATE  num=num+".$url_num.( ",sumpay= sumpay+".$admingetusernamesumpay.",sumprofit= sumprofit+{$priceadvsv},sumadvpay=sumadvpay+{$priceadv} " ) ), TRUE );
				$this->dbo->query( "INSERT INTO zyads_stats (plantype,planid,num,deduction,day,uid,sumpay,sumprofit,sumadvpay) VALUES('".$restr['plantype']."','".$restr['planid']."','".$url_num."','0','".$tidate."','".$nfuid."','".$admingetusernamesumpay."','".$priceadvsv."','".$priceadv.( "') ON DUPLICATE KEY UPDATE num = num + ".$url_num.( ",sumpay= sumpay+".$admingetusernamesumpay.",sumprofit= sumprofit+{$priceadvsv},sumadvpay=sumadvpay+{$priceadv}" ) ), TRUE );
				if ( $restr['plantype'] == "cps" )
				{
						$array = array(
								"uid" => $nfuid,
								"planid" => $planid,
								"adsid" => 0,
								"zoneid" => 0,
								"ip" => $_SERVER['REMOTE_ADDR'],
								"referer" => "",
								"orders" => $da2,
								"`like`" => $like ? $like : "导入",
								"status" => 1,
								"day" => $tidate,
								"addtime" => $tidate,
								"deduction" => 0,
								"price" => $rats,
								"priceadv" => $sitetype,
								"confirmtime" => DATETIMES
						);
						$query = $this->dbo->create( $array, "zyads_orders" );
				}
				$sql = "UPDATE zyads_users  SET ".$clearing.( " = ".$clearing." + " ).$rats." WHERE uid = ".( integer )$nfuid." ";
				$query = $this->dbo->query( $sql, TRUE );
				$query = $this->dbo->query( "UPDATE zyads_users  SET money = money - ".$sitetype." WHERE uid = ".$restr['uid']." ", TRUE );
		}

		public function extvaliad( $xstring )
		{
				$ms = explode( ".", $xstring );
				$ms = strtolower( end( &$ms ) );
				return $ms;
		}

		public function readxlstodata( $file )
		{
				require_once( LIB_DIR."/PHPExcel/Classes/PHPExcel.php" );
				$PHPReader = new PHPExcel_Reader_Excel2007( );
				if ( !$PHPReader->canread( $file ) )
				{
						$PHPReader = new PHPExcel_Reader_Excel5( );
						if ( !$PHPReader->canread( $file ) )
						{
								echo "no Excel";
								return $data;
						}
				}
				else
				{
						$PHPExcel = $PHPReader->load( $file );
						$currentSheet = $PHPExcel->getsheet( 0 );
						$allColumn = $currentSheet->gethighestcolumn( );
						$allRow = $currentSheet->gethighestrow( );
						$currentRow = 2;
						for ( ;	$currentRow <= $allRow;	++$currentRow	)
						{
								$currentColumn = "A";
								for ( ;	$currentColumn <= $allColumn;	++$currentColumn	)
								{
										$address = $currentColumn.$currentRow;
										$str .= $currentSheet->getcell( $address )->getvalue( )."|";
								}
								$data[] = $str;
								unset( $str );
						}
				}
				return $data;
		}

		public function getimportsqlandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$planid = ( integer )$_REQUEST['planid'];
				$filesize = $this->daycondtion( );
				$condition = "";
				if ( $searchval != "" )
				{
						if ( $searchtype == "1" )
						{
								$condition .= " AND u.username ='".$searchval."'";
						}
						else if ( $searchtype == "2" )
						{
								$condition .= "  AND p.planid = '".$searchval."'";
						}
						else if ( $searchtype == "3" )
						{
								$condition .= "  AND o.orders = '".$searchval."'";
						}
				}
				$sql = "SELECT i.*,p.plantype,p.planname,p.datatime,u.username\r\n    \tFROM zyads_import AS i ,zyads_plan AS p, zyads_users AS u \r\n\t\tWHERE  i.planid=p.planid AND i.uid=u.uid ".$condition.( " ".$filesize." ORDER BY  importid  desc" );
				$ssql = "SELECT count(*) AS n\r\n\t\tFROM zyads_import AS i ,zyads_plan AS p, zyads_users AS u WHERE  i.planid=p.planid AND i.uid=u.uid ".$condition.( " ".$filesize );
				return $sql."|".$ssql;
		}

		public function getrowimportbyid( $id )
		{
				$sql = "SELECT * FROM zyads_import WHERE  importid=".( integer )$id;
				$array = $this->dbo->get_one( $sql );
				return $array;
		}

		public function fimport( )
		{
				$mode = $_REQUEST['choosetype'];
				$importid = $_REQUEST['importid'];
				if ( $mode == "revocation" )
				{
						$plancla = Z::getsingleton( "model_planclass" );
						if ( is_array( $importid ) )
						{
								foreach ( $importid as $id )
								{
										$content = $this->getrowimportbyid( $id );
										if ( !( $content['status'] == 1 ) )
										{
												$b = $this->dbo->query( "UPDATE zyads_import SET status=1  WHERE  importid=".( integer )$id."", TRUE );
												$restr = $plancla->admingetplanone( $content['planid'] );
												$clearing = $restr['clearing']."money";
												$url_num = $content['num'];
												$admingetusernamesumpay = $content['sumpay'];
												$priceadv = $content['sumadvpay'];
												$priceadvsv = $content['sumprofit'];
												$query = $this->dbo->query( "UPDATE zyads_users  SET ".$clearing.( " = ".$clearing." - " ).$admingetusernamesumpay." WHERE uid = ".$content['uid']." ", TRUE );
												$query = $this->dbo->query( "UPDATE zyads_users  SET money = money + ".$priceadv." WHERE uid = ".$restr['uid']." ", TRUE );
												$query = $this->dbo->query( "UPDATE zyads_planstats  SET num=num-".$url_num.( ",sumpay=sumpay-".$admingetusernamesumpay.( ",\r\n\t\t\t\t\t\t\t\t\tsumprofit=sumprofit-".$priceadvsv.",sumadvpay=sumadvpay-{$priceadv} WHERE day = '" ) ).$content['day']."' \r\n\t\t\t\t\t\t\t\t\tAND planid = '".$content['planid']."'  ", TRUE );
												$query = $this->dbo->query( "UPDATE zyads_stats  SET num=num - ".$url_num.( ",sumpay=sumpay-".$admingetusernamesumpay.",sumprofit= sumprofit-{$priceadvsv},\r\n\t\t\t\t\tsumadvpay=sumadvpay-{$priceadv} WHERE day = '" ).$content['day']."'  AND planid='".$content['planid']."' \r\n\t\t\t\t\tAND uid = '".$content['uid']."' AND adsid=0 AND zoneid=0", TRUE );
												if ( $restr['plantype'] == "cps" )
												{
														$query = $this->dbo->query( "Delete From  zyads_orders  WHERE orders='".$content['orders']."'\r\n\t\t\t\t\t\tAND day = '".$content['day']."'  AND planid='".$content['planid']."' AND uid = '".$content['uid']."'" );
												}
										}
								}
						}
				}
				if ( $mode == "del" && is_array( $importid ) )
				{
						foreach ( $importid as $id )
						{
								$query = $this->dbo->query( "Delete From  zyads_import Where importid=".( integer )$id );
						}
				}
		}

		public function daycondtion( )
		{
				$timerange = $_REQUEST['timerange'];
				if ( $timerange )
				{
						switch ( $timerange )
						{
						case "t" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ), date( "Y", TIMES ) );
								$filesize = " AND i.addtime >= ".date( "YmdHis", $time1 )." AND i.addtime < ".date( "YmdHis", $time2 );
								return $filesize;
						case "w" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
								$filesize = " AND i.addtime >= ".date( "YmdHis", $time1 );
								return $filesize;
						case "m" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$filesize = " AND i.addtime >= ".date( "YmdHis", $time1 );
								return $filesize;
						case "l" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ) - 1, 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$filesize = " AND i.addtime >= ".date( "YmdHis", $time1 )." AND i.addtime < ".date( "YmdHis", $time2 );
								return $filesize;
						case "a" :
								$filesize = "";
								return $filesize;
						}
						$value = @explode( "/", $timerange );
						$time1 = strtotime( $value[0] );
						$time2 = strtotime( $value[1] );
						if ( $time1 == $time2 )
						{
								$filesize = " AND DATE_FORMAT(i.addtime,'%Y-%m-%d') = '".DAYS."'";
								return $filesize;
						}
						$filesize = " AND i.addtime >= ".date( "YmdHis", $time1 )." AND i.addtime <= ".date( "YmdHis", $time2 );
						return $filesize;
				}
				$filesize = " AND DATE_FORMAT(i.addtime,'%Y-%m-%d') = '".DAYS."'";
				return $filesize;
		}

}

?>
