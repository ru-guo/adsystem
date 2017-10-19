<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
if ( $type == "day" )
{
		echo "<chart>\r\n  <!--\r\n  <message>\r\n    <![CDATA[You can broadcast any message to chart from data XML file]]>\r\n  </message>\r\n  -->\r\n\t<series>\r\n\r\n\t\t<value xid=\"0\">0</value>\r\n\t\t<value xid=\"1\">1</value>\r\n\t\t<value xid=\"2\">2</value>\r\n\t\t<value xid=\"3\">3</value>\r\n\t\t<value xid=\"4\">4</value>\r\n\t\t<value xid=\"5\">5</value>\r\n\t\t<value xid=\"6\">6</value>\r\n\t\t<value xid=\"7\">7</value>\r\n\t\t\t<value xid=\"8\">8</value>\r\n\t\t\t<value xid=\"9\">9</value>\r\n\t\t\t<value xid=\"10\">10</value>\r\n\t\t\t<value xid=\"11\">11</value>\r\n\t\t\t<value xid=\"12\">12</value>\r\n\t\t\t<value xid=\"13\">13</value>\r\n\t\t\t<value xid=\"14\">14</value>\r\n\t\t\t<value xid=\"15\">15</value>\r\n\t\t\t<value xid=\"16\">16</value>\r\n\t\t\t<value xid=\"17\">17</value>\r\n\t\t\t<value xid=\"18\">18</value>\r\n\t\t\t<value xid=\"19\">19</value>\r\n\t\t\t<value xid=\"20\">20</value>\r\n\t\t\t<value xid=\"21\">21</value>\r\n\t\t\t<value xid=\"22\">22</value>\r\n\t\t\t<value xid=\"23\">23</value>\r\n\t</series>\r\n\t<graphs>\r\n\t\t  ";
		if ( $cpc )
		{
				echo "\t\t<graph gid=\"2\">\r\n\t\t\t";
				$i = 0;
				for ( ;	$i < 24;	++$i	)
				{
						echo "\t\t\t<value xid=\"";
						echo $i;
						echo "\">";
						$a = $trendmodel->search( $i, $cpc, "hour" );
						if ( $a !== FALSE )
						{
								echo $cpc[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
						unset( $a );
				}
				echo "\t\t</graph>\r\n\t \t";
		}
		if ( $cpm )
		{
				echo "\t\t<graph gid=\"3\">\r\n\t\t\t";
				$i = 0;
				for ( ;	$i < 24;	++$i	)
				{
						echo "\t\t\t<value xid=\"";
						echo $i;
						echo "\">";
						$a = $trendmodel->search( $i, $cpm, "hour" );
						if ( $a !== FALSE )
						{
								echo $cpm[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
						unset( $a );
				}
				echo "\t\t</graph>\r\n\t\t  ";
		}
		if ( $cpa )
		{
				echo "\t\t<graph gid=\"4\">\r\n\t\t\t";
				$i = 0;
				for ( ;	$i < 24;	++$i	)
				{
						echo "\t\t\t<value xid=\"";
						echo $i;
						echo "\">";
						$a = $trendmodel->search( $i, $cpa, "hour" );
						if ( $a !== FALSE )
						{
								echo $cpa[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
						unset( $a );
				}
				echo "\t\t</graph>\r\n\t\t\t\r\n\t\t  ";
		}
		if ( $cps )
		{
				echo "\t\t<graph gid=\"5\">\r\n\t\t\t";
				$i = 0;
				for ( ;	$i < 24;	++$i	)
				{
						echo "\t\t\t<value xid=\"";
						echo $i;
						echo "\">";
						$a = $trendmodel->search( $i, $cps, "hour" );
						if ( $a !== FALSE )
						{
								echo $cps[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
						unset( $a );
				}
				echo "\t\t</graph>\r\n\t\t  ";
		}
		if ( $cpv )
		{
				echo "\t\t<graph gid=\"1\">\r\n\t\t";
				$i = 0;
				for ( ;	$i < 24;	++$i	)
				{
						echo "\t\t\t<value xid=\"";
						echo $i;
						echo "\">";
						$a = $trendmodel->search( $i, $cpv, "hour" );
						if ( $a !== FALSE )
						{
								echo $cpv[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
						unset( $a );
				}
				echo "\t\t</graph>\r\n\t\t  ";
		}
		if ( !$cpc && !$cpm && !$cpa && !$cps && !$cpv )
		{
				echo "\t\t  \r\n\t\t<graph gid=\"\">\r\n\t\t";
				$i = 0;
				for ( ;	$i < 24;	++$i	)
				{
						echo "\t\t\t<value xid=\"";
						echo $i;
						echo "\">0</value>\r\n\t\t\t";
				}
				echo "\t\t</graph>\r\n\t\t  ";
		}
		echo "\t\t  \r\n\t\t  \r\n\t</graphs>\r\n</chart>\r\n";
}
echo "\r\n\r\n";
if ( $type == "line" )
{
		echo "<chart>\r\n  <!--\r\n  <message>\r\n    <![CDATA[You can broadcast any message to chart from data XML file]]>\r\n  </message>\r\n  -->\r\n    ";
		if ( $actiontype == "wplan" )
		{
				echo "\t<series>\r\n\t";
				$i = 0;
				for ( ;	$i < 6;	++$i	)
				{
						$days = date( "Y-m-d", $time_begin + 86400 * $i );
						echo "\t\t<value xid=\"";
						echo strtotime( $days );
						echo "\">";
						echo $days;
						echo "</value>\r\n\t ";
						unset( $a );
				}
				echo "\t</series>\r\n\t\r\n\t";
		}
		else
		{
				echo "\t<series>\r\n\t";
				foreach ( ( array )$dayData as $d )
				{
						echo "<value xid='".strtotime( $d['day'] )."'>".$d['day']."</value>";
				}
				echo "\t</series>\r\n\t";
		}
		echo "\t\r\n\t<graphs>\r\n\t \r\n\t ";
		if ( $cpm )
		{
				echo "\t   <graph gid=\"3\">\r\n\t\t\t";
				foreach ( ( array )$dayData as $d )
				{
						echo "\t\t\t<value xid=\"";
						echo strtotime( $d['day'] );
						echo "\">\r\n\t\t\t ";
						$a = $trendmodel->search( $d['day'], $cpm, "day" );
						if ( $a !== FALSE )
						{
								echo $cpm[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
				}
				echo "\t\t</graph>\r\n\t  ";
		}
		echo "\t  \r\n\t  ";
		if ( $cpc )
		{
				echo " \t\t\t<graph gid=\"2\">\r\n\t\t\t";
				foreach ( ( array )$dayData as $d )
				{
						echo "\t\t\t<value xid=\"";
						echo strtotime( $d['day'] );
						echo "\">\r\n\t\t\t ";
						$a = $trendmodel->search( $d['day'], $cpc, "day" );
						if ( $a !== FALSE )
						{
								echo $cpc[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
				}
				echo "\t\t\t</graph>\r\n\t\t";
		}
		echo "\t\t\r\n\t\t";
		if ( $cpa )
		{
				echo "\t\t\t<graph gid=\"4\">\r\n\t\t\t";
				foreach ( ( array )$dayData as $d )
				{
						echo "\t\t\t<value xid=\"";
						echo strtotime( $d['day'] );
						echo "\">\r\n\t\t\t ";
						$a = $trendmodel->search( $d['day'], $cpa, "day" );
						if ( $a !== FALSE )
						{
								echo $cpa[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
				}
				echo "\t\t\t</graph>\r\n\t\t";
		}
		echo "\t\t\r\n\t\t";
		if ( $cps )
		{
				echo "\t\t\t<graph gid=\"5\">\r\n\t\t\t";
				foreach ( ( array )$dayData as $d )
				{
						echo "\t\t\t<value xid=\"";
						echo strtotime( $d['day'] );
						echo "\">\r\n\t\t\t ";
						$a = $trendmodel->search( $d['day'], $cps, "day" );
						if ( $a !== FALSE )
						{
								echo $cps[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
				}
				echo "\t\t\t</graph>\r\n\t\t";
		}
		echo "\t\t\r\n\t\t";
		if ( $cpv )
		{
				echo "\t\t\t<graph gid=\"1\">\r\n\t\t\t";
				foreach ( ( array )$dayData as $d )
				{
						echo "\t\t\t<value xid=\"";
						echo strtotime( $d['day'] );
						echo "\">\r\n\t\t\t ";
						$a = $trendmodel->search( $d['day'], $cpv, "day" );
						if ( $a !== FALSE )
						{
								echo $cpv[$a]['num'];
						}
						else
						{
								echo 0;
						}
						echo "</value>\r\n\t\t\t";
				}
				echo "\t\t\t</graph>\r\n\t\t";
		}
		echo "\t</graphs>\r\n</chart>\r\n";
}
?>
