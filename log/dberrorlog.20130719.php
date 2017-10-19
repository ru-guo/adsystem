
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2013-7-19 2:12pm
Error:  Unknown column 'u.recpm' in 'field list'
Errno:  1054
Script: /affiliate/i.php
SQL: SELECT z.zoneid,z.plantype,z.adstypeid,z.width,z.height,z.viewtype,z.viewadsid,z.alternatetype,z.alternateurl,z.uid,z.codestyle,z.cpmtime,s.sitetype,s.siteid,s.siteurl,s.pertainurl,s.status AS sitetatus,u.status AS userstatus,u.insite,u.recpm ,at.framework
			FROM zyads_zone AS z,zyads_site AS s,zyads_users AS u,zyads_adstype as at
		    WHERE  z.zoneid=18 AND z.uid=u.uid AND z.siteid=s.siteid AND s.status=3 AND at.adstypeid = z.adstypeid  limit 0,1
