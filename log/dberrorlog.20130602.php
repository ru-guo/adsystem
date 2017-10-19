
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2013-6-2 5:13am
Error:  Unknown column 'hour' in 'field list'
Errno:  1054
Script: /v7/do.php
SQL: SELECT  count(*) AS  num ,hour FROM zyads_adsip2
    	WHERE day='2013-06-02' AND plantype='cpc'  AND siteid=2 group by hour
