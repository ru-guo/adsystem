
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-11-1 2:15am
Error:  Table 'zygg.zyads_audit' doesn't exist
Errno:  1146
Script: /v7/do.php
SQL: SELECT s.sitetype,s.siteurl,s.sitename,s.alexapr,u.username,p.planname,a.*
		   		FROM  zyads_site As s,zyads_users As u,zyads_audit As a ,zyads_plan As p 
		   		WHERE   a.siteid=s.siteid AND s.uid=u.uid AND a.planid=p.planid    ORDER By a.auditid DESC LIMIT 0,20

<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-11-1 8:24am
Error:  Unknown column 'id' in 'order clause'
Errno:  1054
Script: /v7/do.php
SQL: SELECT *  FROM zyads_stats WHERE 1  AND day >= 20171101000000 AND day <= 20171101000000     ORDER BY id DESC LIMIT 0,20

<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-11-1 8:26am
Error:  You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DESC LIMIT 0,20' at line 1
Errno:  1064
Script: /v7/do.php
SQL: SELECT *  FROM zyads_stats WHERE 1  AND day >= 20171101000000 AND day <= 20171101000000     ORDER BY  DESC LIMIT 0,20
