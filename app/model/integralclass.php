<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_IntegralClass
{

		public $dbo = NULL;

		public function model_integralclass( )
		{
				$this->dbo = Z::getconn( );
				if ( $GLOBALS['C_ZYIIS']['integral_status'] == "0" )
				{
						lkc( "integral_status0" );
				}
		}

		public function _obfuscate_BTganl3HAlxb2pnMWgÿ( )
		{
				$_obfuscate_nyATWebJYEMclAÿÿ = ( integer )$_POST['integralid'];
				$_obfuscate_7wÿÿ = $this->_obfuscate_cgFxEG5tYT4VYmVzGHsÿ( $_obfuscate_nyATWebJYEMclAÿÿ );
				$_obfuscate_nFcawLr22A6W = Z::getsingleton( "model_userclass" );
				$_obfuscate_Dgÿÿ = $_obfuscate_nFcawLr22A6W->getuserinfo( );
				if ( $_obfuscate_Dgÿÿ['integral'] < $_obfuscate_7wÿÿ['integral'] )
				{
						return FALSE;
				}
				$_obfuscate_3y0Y = "UPDATE  zyads_users set integral=integral-".$_obfuscate_7wÿÿ['integral']." WHERE uid=".$_obfuscate_Dgÿÿ['uid'];
				$this->dbo->query( $_obfuscate_3y0Y );
				$_obfuscate_3y0Y = "UPDATE  zyads_integral set num=num+1 WHERE  id=".$_obfuscate_nyATWebJYEMclAÿÿ;
				$this->dbo->query( $_obfuscate_3y0Y );
				$_obfuscate_gkt = array(
						"integralid" => $_obfuscate_nyATWebJYEMclAÿÿ,
						"integral" => $_obfuscate_7wÿÿ['integral'],
						"contact" => $_POST['contact'],
						"tel" => $_POST['tel'],
						"address" => h( $_POST['address'] ),
						"uid" => $_SESSION['uid'],
						"addtime" => DATETIMES
				);
				$_obfuscate_Bwÿÿ = $this->dbo->create( $_obfuscate_gkt, "zyads_exchange" );
				return TRUE;
		}

		public function _obfuscate_cgFxEG5tYT4VYmVzGHsÿ( $_obfuscate_0W8ÿ )
		{
				$_obfuscate_3y0Y = "SELECT * FROM zyads_integral where id=".( integer )$_obfuscate_0W8ÿ;
				return $this->dbo->get_one( $_obfuscate_3y0Y );
		}

		public function _obfuscate_amsBW3Iba3A3AW05F3h5G3lhBGFtAwÿÿ( )
		{
				$_obfuscate_LeS8hwÿÿ = $_REQUEST['type'];
				$_obfuscate_TMRTBCP8wTkÿ = ( integer )$_REQUEST['integral'];
				$_obfuscate_6wvnKDGS = $_obfuscate_m7jGtfwjtQÿÿ = "";
				if ( _obfuscate_BB84ZzB6bXMtaQÿÿ( $_obfuscate_LeS8hwÿÿ ) )
				{
						$_obfuscate_m7jGtfwjtQÿÿ = " AND  type=".( integer )$_obfuscate_LeS8hwÿÿ;
				}
				if ( $_obfuscate_TMRTBCP8wTkÿ == 1 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral<500";
				}
				else if ( $_obfuscate_TMRTBCP8wTkÿ == 2 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral>=500 AND integral<2000";
				}
				else if ( $_obfuscate_TMRTBCP8wTkÿ == 3 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral>=2000 AND integral<5000";
				}
				else if ( $_obfuscate_TMRTBCP8wTkÿ == 4 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral>=5000 AND integral<10000";
				}
				else if ( $_obfuscate_TMRTBCP8wTkÿ == 5 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral>=10000 AND integral<50000";
				}
				else if ( $_obfuscate_TMRTBCP8wTkÿ == 6 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral>=50000 AND integral<100000";
				}
				else if ( $_obfuscate_TMRTBCP8wTkÿ == 7 )
				{
						$_obfuscate_6wvnKDGS = " AND  integral>100000";
				}
				$_obfuscate_3y0Y = "SELECT * FROM zyads_integral WHERE   status =1 ".$_obfuscate_m7jGtfwjtQÿÿ." {$_obfuscate_6wvnKDGS} ORDER BY top DESC,id DESC";
				$_obfuscate_1KeKvQu7qnwÿ = "SELECT count(*) AS n FROM zyads_integral  WHERE   status =1 ".$_obfuscate_m7jGtfwjtQÿÿ." {$_obfuscate_6wvnKDGS}";
				return $_obfuscate_3y0Y."|".$_obfuscate_1KeKvQu7qnwÿ;
		}

		public function _obfuscate_B3JxDQoTZXEvHGosZjtyMBJzWxYFHAÿÿ( )
		{
				$_obfuscate_LeS8hwÿÿ = ( integer )$_POST['type'];
				$_obfuscate_xuwk = ( integer )$_POST['top'];
				$_obfuscate_3gn_eQÿÿ = $_POST['name'];
				$_obfuscate_o5fQ1gÿÿ = $_POST['info'];
				$_obfuscate_TMRTBCP8wTkÿ = ( integer )$_POST['integral'];
				$_obfuscate_VvnB7aAScz0 = $this->_obfuscate_MhQHGnwlbCkÿ( );
				$_obfuscate_r8fcxVdC8sEÿ = $_obfuscate_VvnB7aAScz0;
				$_obfuscate_gkt = array(
						"type" => $_obfuscate_LeS8hwÿÿ,
						"name" => $_obfuscate_3gn_eQÿÿ,
						"info" => $_obfuscate_o5fQ1gÿÿ,
						"top" => $_obfuscate_xuwk,
						"integral" => $_obfuscate_TMRTBCP8wTkÿ,
						"imageurl" => $_obfuscate_r8fcxVdC8sEÿ,
						"addtime" => DATETIMES
				);
				$_obfuscate_ammigv8ÿ = $this->dbo->create( $_obfuscate_gkt, "zyads_integral" );
		}

		public function _obfuscate_MhQHGnwlbCkÿ( )
		{
				$path = "/a/j/"._obfuscate_YwJjMgÿÿ( "Y-m-d" )."/";
				$config['upload_path'] = WWW_DIR.$path;
				$config['allowed_types'] = "gif|jpg|png|swf|bmp";
				$config['max_size'] = "500";
				$config['file_name'] = _obfuscate_FDQcQÿÿ( ).random( 8 );
				require( LIB_DIR."/upload/upload.php" );
				$uploader =& new w9uk8ksjdl2kb( $config );
				$uploader->_obfuscate_BXV5KmJ_ejFA( "imageurl" );
				$up = $uploader->data( );
				return $path.$up['file_name'];
		}

		public function _obfuscate_aHB6ZQ1qNw8abDBycglnH2h4W38SYQÿÿ( )
		{
				$_obfuscate_irzEXUVvhmpM = $_REQUEST['searchval'];
				$_obfuscate_LeS8hwÿÿ = $_REQUEST['type'];
				$_obfuscate_6b8lIO4y = $_REQUEST['status'];
				$_obfuscate_0W8ÿ = ( integer )$_REQUEST['id'];
				$_obfuscate_6wvnKDGS = $_obfuscate_m7jGtfwjtQÿÿ = $_obfuscate_pGzg61bzbw4g = "";
				if ( $_obfuscate_irzEXUVvhmpM )
				{
						$_obfuscate_6wvnKDGS = "  AND  name like '%".$_obfuscate_irzEXUVvhmpM."%'";
				}
				if ( $_obfuscate_0W8ÿ )
				{
						$_obfuscate_6wvnKDGS = "  AND id=".$_obfuscate_0W8ÿ;
				}
				if ( _obfuscate_BB84ZzB6bXMtaQÿÿ( $_obfuscate_LeS8hwÿÿ ) )
				{
						$_obfuscate_m7jGtfwjtQÿÿ = " AND  type=".( integer )$_obfuscate_LeS8hwÿÿ;
				}
				if ( $_obfuscate_6b8lIO4y == "1" || $_obfuscate_6b8lIO4y == "0" )
				{
						$_obfuscate_pGzg61bzbw4g = " AND  status=".( integer )$_obfuscate_6b8lIO4y;
				}
				$_obfuscate_3y0Y = "SELECT * FROM zyads_integral where 1  ".$_obfuscate_6wvnKDGS."  {$_obfuscate_m7jGtfwjtQÿÿ} {$_obfuscate_pGzg61bzbw4g} ORDER BY id DESC";
				$_obfuscate_1KeKvQu7qnwÿ = "SELECT count(*) AS n FROM zyads_integral  where 1 ".$_obfuscate_6wvnKDGS." {$_obfuscate_m7jGtfwjtQÿÿ} {$_obfuscate_pGzg61bzbw4g}";
				return $_obfuscate_3y0Y."|".$_obfuscate_1KeKvQu7qnwÿ;
		}

		public function _obfuscate_Y3c2cUA0K2UBFh9uO2dnBm5wM3dhNyEÿ( )
		{
				$_obfuscate_q_UXk8Iÿ = $_REQUEST['id'];
				$_obfuscate_VXIKvUzCwZPDgAÿÿ = $_REQUEST['choosetype'];
				if ( _obfuscate_IgN4HCIGeQYÿ( $_obfuscate_q_UXk8Iÿ ) )
				{
						if ( $_obfuscate_VXIKvUzCwZPDgAÿÿ == "del" )
						{
								foreach ( $_obfuscate_q_UXk8Iÿ as $_obfuscate_0W8ÿ )
								{
										$_obfuscate_ammigv8ÿ = $this->dbo->query( "Delete From zyads_integral Where id = ".( integer )$_obfuscate_0W8ÿ );
								}
						}
						if ( $_obfuscate_VXIKvUzCwZPDgAÿÿ == "unlock" )
						{
								foreach ( $_obfuscate_q_UXk8Iÿ as $_obfuscate_0W8ÿ )
								{
										$_obfuscate_ammigv8ÿ = $this->dbo->query( "Update zyads_integral SET status=1 Where id = ".( integer )$_obfuscate_0W8ÿ );
								}
						}
						if ( $_obfuscate_VXIKvUzCwZPDgAÿÿ == "lock" )
						{
								foreach ( $_obfuscate_q_UXk8Iÿ as $_obfuscate_0W8ÿ )
								{
										$_obfuscate_ammigv8ÿ = $this->dbo->query( "Update zyads_integral SET status=0 Where id = ".( integer )$_obfuscate_0W8ÿ );
								}
						}
				}
		}

		public function _obfuscate_bjhnLgIlXxwUdhYKe2dqfmAybwÿÿ( )
		{
				$_obfuscate_0W8ÿ = $_GET['id'];
				$_obfuscate_3y0Y = "SELECT * FROM zyads_integral\n    \t\t\tWHERE   id=".( integer )$_obfuscate_0W8ÿ;
				return $this->dbo->get_one( $_obfuscate_3y0Y );
		}

		public function _obfuscate_bw41c3QfKDxtYVtfbj8k( )
		{
				$_obfuscate_0W8ÿ = ( integer )$_POST['id'];
				$_obfuscate_LeS8hwÿÿ = ( integer )$_POST['type'];
				$_obfuscate_3gn_eQÿÿ = $_POST['name'];
				$_obfuscate_xuwk = $_POST['top'];
				$_obfuscate_o5fQ1gÿÿ = $_POST['info'];
				$_obfuscate_6wvnKDGS = "";
				$_obfuscate_TMRTBCP8wTkÿ = ( integer )$_POST['integral'];
				if ( $_FILES['imageurl']['error'] != 4 )
				{
						$_obfuscate_VvnB7aAScz0 = $this->_obfuscate_MhQHGnwlbCkÿ( );
						$_obfuscate_r8fcxVdC8sEÿ = $_obfuscate_VvnB7aAScz0;
						$_obfuscate_6wvnKDGS = ",imageurl='".$_obfuscate_r8fcxVdC8sEÿ."'";
				}
				$_obfuscate_3y0Y = "UPDATE  zyads_integral Set\n\t\t\tname = '".$_obfuscate_3gn_eQÿÿ."',\n\t\t\tinfo = '{$_obfuscate_o5fQ1gÿÿ}',\n\t\t\ttop = '{$_obfuscate_xuwk}',\n\t\t\tintegral = '{$_obfuscate_TMRTBCP8wTkÿ}',\n\t\t    type = '{$_obfuscate_LeS8hwÿÿ}' \n\t\t    {$_obfuscate_6wvnKDGS}\n\t\t\tWHERE id={$_obfuscate_0W8ÿ}";
				$this->dbo->query( $_obfuscate_3y0Y );
		}

		public function _obfuscate_LCFqF292GCp1b2J8CWRlIyUjWwNwXxk1eAÿÿ( )
		{
				$_obfuscate_3y0Y = "SELECT * FROM zyads_exchange where uid=".$_SESSION['uid']." ORDER BY id DESC";
				$_obfuscate_1KeKvQu7qnwÿ = "SELECT count(*) AS n FROM zyads_exchange  where uid=".$_SESSION['uid']." ";
				return $_obfuscate_3y0Y."|".$_obfuscate_1KeKvQu7qnwÿ;
		}

		public function _obfuscate_dhZABnJ7c2MeBQ18ZzMhA3YeYRxtcAÿÿ( )
		{
				$_obfuscate_irzEXUVvhmpM = ( integer )$_REQUEST['searchval'];
				$_obfuscate_6b8lIO4y = $_REQUEST['status'];
				$_obfuscate_6wvnKDGS = $_obfuscate_m7jGtfwjtQÿÿ = $_obfuscate_pGzg61bzbw4g = "";
				if ( $_obfuscate_irzEXUVvhmpM )
				{
						$_obfuscate_6wvnKDGS = "  AND uid=".$_obfuscate_irzEXUVvhmpM;
				}
				if ( _obfuscate_BB84ZzB6bXMtaQÿÿ( $_obfuscate_LeS8hwÿÿ ) )
				{
						$_obfuscate_m7jGtfwjtQÿÿ = " AND  type=".( integer )$_obfuscate_LeS8hwÿÿ;
				}
				if ( $_obfuscate_6b8lIO4y == "1" || $_obfuscate_6b8lIO4y == "0" )
				{
						$_obfuscate_pGzg61bzbw4g = " AND  status=".( integer )$_obfuscate_6b8lIO4y;
				}
				$_obfuscate_3y0Y = "SELECT * FROM zyads_exchange where 1  ".$_obfuscate_6wvnKDGS."  {$_obfuscate_m7jGtfwjtQÿÿ} {$_obfuscate_pGzg61bzbw4g} ORDER BY id DESC";
				$_obfuscate_1KeKvQu7qnwÿ = "SELECT count(*) AS n FROM zyads_exchange  where 1 ".$_obfuscate_6wvnKDGS." {$_obfuscate_m7jGtfwjtQÿÿ} {$_obfuscate_pGzg61bzbw4g}";
				return $_obfuscate_3y0Y."|".$_obfuscate_1KeKvQu7qnwÿ;
		}

		public function _obfuscate_ayZyc3l2aioGMRMeOWt1ZW8hd3V4dWAÿ( )
		{
				$_obfuscate_q_UXk8Iÿ = $_REQUEST['id'];
				$_obfuscate_VXIKvUzCwZPDgAÿÿ = $_REQUEST['choosetype'];
				if ( _obfuscate_IgN4HCIGeQYÿ( $_obfuscate_q_UXk8Iÿ ) )
				{
						if ( $_obfuscate_VXIKvUzCwZPDgAÿÿ == "del" )
						{
								foreach ( $_obfuscate_q_UXk8Iÿ as $_obfuscate_0W8ÿ )
								{
										$_obfuscate_ammigv8ÿ = $this->dbo->query( "Delete From zyads_exchange Where id = ".( integer )$_obfuscate_0W8ÿ );
								}
						}
						if ( $_obfuscate_VXIKvUzCwZPDgAÿÿ == "delivery" )
						{
								foreach ( $_obfuscate_q_UXk8Iÿ as $_obfuscate_0W8ÿ )
								{
										$_obfuscate_ammigv8ÿ = $this->dbo->query( "Update zyads_exchange SET status=1 Where id = ".( integer )$_obfuscate_0W8ÿ );
								}
						}
				}
		}

}

?>
