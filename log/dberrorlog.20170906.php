
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2017-9-6 4:08am
Error:  Unknown column 's.deduction' in 'field list'
Errno:  1054
Script: /v7/do.php
SQL: SELECT * ,(s.deduction+s.num) AS num,(s.sumpay+s.sumprofit) AS sumpay,s.deduction*0 AS deduction,s.sumprofit*0 AS sumprofit FROM zyads_planstats WHERE 1  AND day >= 20170906000000 AND day <= 20170906000000     ORDER BY id DESC LIMIT 0,20
