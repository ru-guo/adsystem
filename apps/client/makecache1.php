<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function makezone( $dbo, $zoneid )
{
		$sql = "SELECT z.zoneid,z.plantype,z.adstypeid,z.width,z.height,z.viewtype,z.viewadsid,z.alternatetype,z.alternateurl,z.uid,z.codestyle,z.cpmtime,s.sitetype,s.siteid,s.siteurl,s.pertainurl,s.status AS sitetatus,u.status AS userstatus,u.insite,u.recpm ,at.framework\r\n\t\t\tFROM zyads_zone AS z,zyads_site AS s,zyads_users AS u,zyads_adstype as at\r\n\t\t    WHERE  z.zoneid=".$zoneid." AND z.uid=u.uid AND z.siteid=s.siteid AND s.status=3 AND at.adstypeid = z.adstypeid ";
		$b = $dbo->get_one( $sql );
		if ( $b )
		{
				$strsql = "SELECT planid FROM zyads_audit WHERE siteid=".$b['siteid']." AND status=2";
				$rows = $dbo->get_all( $strsql );
				foreach ( ( array )$rows as $value )
				{
						$row[] = $value['planid'];
				}
		}
		$array = array(
				"zoneid" => $b['zoneid'],
				"siteid" => $b['siteid'],
				"uid" => $b['uid'],
				"plantype" => $b['plantype'],
				"sitetype" => $b['sitetype'],
				"siteurl" => $b['siteurl'].",".$b['pertainurl'],
				"adstypeid" => $b['adstypeid'],
				"framework" => $b['framework'],
				"width" => $b['width'],
				"height" => $b['height'],
				"viewtype" => $b['viewtype'],
				"viewadsid" => $b['viewadsid'],
				"alternatetype" => $b['alternatetype'],
				"alternateurl" => $b['alternateurl'],
				"codestyle" => $b['codestyle'],
				"auditplanid" => $row,
				"userstatus" => $b['userstatus'],
				"sitestatus" => $b['sitestatus'],
				"insite" => $b['insite'],
				"cpmtime" => $b['cpmtime'],
				"recpm" => $b['recpm']
		);
		setcache( $zoneid, $array, "z" );
		return $array;
}

function makeads( $dbo, $filename, $z )
{
		$xw = "";
		if ( $z['framework'] == "iframe" && $z['adstypeid'] != "13" )
		{
				$xw .= "AND a.width = ".$z['width']." AND a.height = ".$z['height']." ";
		}
		if ( $z['adstypeid'] == "13" )
		{
				$column = "a.adsid,a.headline,a.description,a.url,a.adstypeid,a.priority,a.dispurl";
		}
		else
		{
				$column = "a.adsid,a.imageurl,a.alt,a.url,a.adstypeid,a.priority,a.htmlcode,a.width,a.height";
		}
		$sql = "\r\n\t\tSELECT ".$column." ,p.checkplan,p.expire,p.planid,p.audit,p.clearing,p.plantype,p.uid,p.resuid,p.restrictions,p.budget \r\n\t    FROM zyads_ads AS a,zyads_plan AS p\r\n\t\tWHERE  p.status = 1 AND a.priority > 0  AND a.status = 3 \r\n\t\tAND p.plantype = '".$z['plantype']."' AND a.adstypeid= '".$z['adstypeid'].( "'\r\n\t\tAND a.planid=p.planid ".$xw." AND  (p.expire>" ).date( "Y-m-d", TIMES )." || p.expire=0000-00-00)";
		$query = $dbo->query( $sql );
		while ( $row = $dbo->fetch_array( $query ) )
		{
				if ( $row['priority'] )
				{
						if ( $z['framework'] != "iframe" )
						{
								$row['htmlcode'] = str_replace( "\r\n", "", $row['htmlcode'] );
								$row['htmlcode'] = str_replace( "\"", "'", $row['htmlcode'] );
						}
						$i1 += $row['priority'];
						$i2 += $row['adsid'];
						$i3[$row['adsid']] = $row;
				}
		}
		$array = array(
				$i3,
				$i1,
				$i2
		);
		setcache( $filename, $array, "a" );
		return $array;
}

function atpcache( $dbo )
{
		$sql = "SELECT adstypeid,htmltemplate FROM  zyads_adstype WHERE parentid>0 AND status=1";
		$rows = $dbo->get_all( $sql );
		$array = array( );
		foreach ( ( array )$rows as $m )
		{
				$m['htmltemplate'] = str_replace( "{jsserver}", $GLOBALS['C_ZYIIS']['jsurl'], $m['htmltemplate'] );
				$m['htmltemplate'] = str_replace( "{unionurl}", $GLOBALS['C_ZYIIS']['siteurl'], $m['htmltemplate'] );
				$m['htmltemplate'] = str_replace( "{codeserver}", $GLOBALS['C_ZYIIS']['codeurl'], $m['htmltemplate'] );
				$m['htmltemplate'] = str_replace( "{imgserver}", $GLOBALS['C_ZYIIS']['imgurl'], $m['htmltemplate'] );
				$m['htmltemplate'] = str_replace( "{jumpserver}", $GLOBALS['C_ZYIIS']['jumpurl'], $m['htmltemplate'] );
				$array[$m['adstypeid']] = $m;
		}
		setcache( "atp", $array, "v" );
		return $array;
}

function deladscache( $filename )
{
		delcache( $filename, "a" );
}

function delzoneidcache( $zoneid )
{
		delcache( $zoneid, "z" );
}

require_once( LIB_DIR."/cache/cache_".$GLOBALS['C_ZYIIS']['cache_type'].".php" );
?>
