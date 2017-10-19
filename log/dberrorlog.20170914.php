
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-9-14 5:50am
Error:  Unknown column 'hour' in 'field list'
Errno:  1054
Script: /v7/do.php
SQL: SELECT  count(*) AS  num ,hour FROM zyads_adsip14
    	WHERE day='2017-09-14' AND plantype='cpc'  AND uid=1023 group by hour

<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-9-14 5:52am
Error:  Table 'zygg.zyads_area' doesn't exist
Errno:  1146
Script: /v7/dos.php
SQL: SELECT  sum(num) As num ,province FROM zyads_area WHERE 1  AND day >= 20170908000000   group by province ORDER BY num DESC

<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-9-14 5:52am
Error:  Unknown column 'day' in 'where clause'
Errno:  1054
Script: /integral/do.php
SQL: SELECT * FROM zyads_adsip14  WHERE day='2017-09-14'      ORDER BY id DESC LIMIT 0,20

<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-9-14 5:56am
Error:  Table 'zygg.zyads_area' doesn't exist
Errno:  1146
Script: /v7/dos.php
SQL: SELECT  sum(num) As num ,province FROM zyads_area WHERE 1  AND day >= 20170908000000   group by province ORDER BY num DESC
