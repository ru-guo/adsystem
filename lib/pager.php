<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Pager
{

		public $totalCount = 20;
		public $sqlCount = 0;
		public $pageSize = 0;
		public $startLimit = NULL;
		public $dbo = NULL;
		public $url = NULL;

		public function pager( )
		{
				$page = max( 1, intval( $_GET['page'] ) );
				$this->pageSize = $page;
		}

		public function parse_sqls( $sql, $dbo )
		{
				if ( is_null( $sql ) )
				{
						throw new ZException( "Page Sql Is_null" );
				}
				if ( !is_object( $dbo ) )
				{
						throw new ZException( gettype( $dbo )." Not Is_object Name \$dbo" );
				}
				$sql = @explode( "|", $sql );
				if ( !is_array( $sql ) )
				{
						throw new ZException( "Page Sql Is_Array" );
				}
				$sql1 = $sql[0];
				$sql2 = $sql[1];
				$this->startLimit = ( $this->pageSize - 1 ) * $this->totalCount;
				$strsql = $sql1." LIMIT ".$this->startLimit.",".$this->totalCount;
				$rows = $dbo->get_all( $strsql );
				$query = $dbo->query( $sql2 );
				$array = $dbo->fetch_array( $query );
				$this->sqlCount = $array['n'];
				return $rows;
		}

		public function navbar( )
		{
				$count = $this->sqlCount;
				$totalcount = $this->totalCount;
				$pagesize = $this->pageSize;
				$v = $this->url;
				$navbar = "";
				$v .= strstr( $v, "?" ) ? "&" : "?";
				if ( $totalcount < $count )
				{
						$pager = 10;
						$size = 2;
						$pages = @ceil( $count / $totalcount );
						$aliaspages = $pages;
						if ( $aliaspages < $pager )
						{
								$crrentpage = 1;
								$max = $aliaspages;
						}
						else
						{
								$crrentpage = $pagesize - $size;
								$max = $crrentpage + $pager - 1;
								if ( $crrentpage < 1 )
								{
										$max = $pagesize + 1 - $crrentpage;
										$crrentpage = 1;
										if ( $max - $crrentpage < $pager )
										{
												$max = $pager;
										}
								}
								else if ( $aliaspages < $max )
								{
										$crrentpage = $aliaspages - $pager + 1;
										$max = $aliaspages;
								}
						}
						$navbar = ( 1 < $pagesize - $size && $pager < $aliaspages ? "<a class=\"p_z_redirect\" href=\"".$v."page=1\">第一页</a>" : "" ).( 1 < $pagesize ? "<a class=\"p_z_redirect\" href=\"".$v."page=".( $pagesize - 1 )."\">上一页</a>" : "" );
						$navbar .= "&nbsp;&nbsp;";
						$j = $crrentpage;
						for ( ;	$j <= $max;	++$j	)
						{
								$navbar .= $j == $pagesize ? "<span class=\"p_z_curpage\">".$j."</span>" : "<a href=\"".$v."page=".$j."\" class=\"p_z_num\">".$j."</a>";
								$navbar .= "&nbsp;&nbsp;";
						}
						$navbar .= ( $pagesize < $aliaspages ? "<a class=\"p_z_redirect\" href=\"".$v."page=".( $pagesize + 1 )."\">下一页</a>" : "" ).( $max < $aliaspages ? "<a class=\"p_z_redirect\" href=\"".$v."page=".$aliaspages."\">尾页</a>" : "" ).( $pager < $aliaspages ? "<a class=\"p_z_pages\" style=\"padding: 0px\"><input class=\"p_z_input\" type=\"text\" name=\"custompage\" onKeyDown=\"if(event.keyCode==13) {window.location='".$v."page='+this.value; return false;}\"></a>" : "" );
						$navbar = $navbar ? "<div class=\"p_z_bar\"><span class=\"p_z_total\">&nbsp;共&nbsp;<font color=#000000>".$count."</font>&nbsp;条/&nbsp;<font color=#000000>".$pages."</font>页</span><span class=\"p_z_pages\">&nbsp;当前显示第&nbsp;<font color=#000000>".$pagesize."</font>&nbsp;页&nbsp;</span>".$navbar."</div>" : "";
				}
				return $navbar;
		}

}

?>
