
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2014-3-15 10:05am
Error:  Unknown column 'hour' in 'field list'
Errno:  1054
Script: /xiaoyangad/do.php
SQL: SELECT  count(*) AS  num ,hour FROM zyads_adsip15
    	WHERE day='2014-03-15' AND plantype='cpc'  AND planid=15 group by hour
