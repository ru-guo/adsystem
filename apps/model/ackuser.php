<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ee9wvmo20wue
{

		public function _obfuscate_ZyseCGRnNmktN11qWx4ÿ( $_obfuscate_YbfVGewvqPYÿ )
		{
				if ( $_obfuscate_YbfVGewvqPYÿ == "" )
				{
						return FALSE;
				}
				$_obfuscate_3y0Y = "Select uid From zyads_users Where username='".$_obfuscate_YbfVGewvqPYÿ."' AND (type=1 OR type=2)";
				return 0 < $this->dbo->get_num( $_obfuscate_3y0Y );
		}

		public function _obfuscate_PmYneSJ0CG4JZR4rMhhjeQÿÿ( $_obfuscate_7Ri3 )
		{
				$_obfuscate_3y0Y = "Select uid From zyads_users Where uid=".( integer )$_obfuscate_7Ri3;
				return 0 < $this->dbo->get_num( $_obfuscate_3y0Y );
		}

		public function _obfuscate_IHZqfm88dmN3dnMYb3sR( $_obfuscate_ae6UFRQÿ )
		{
				$_obfuscate_3y0Y = "Select uid From zyads_users Where email='".$_obfuscate_ae6UFRQÿ."'";
				return 0 < $this->dbo->get_num( $_obfuscate_3y0Y );
		}

		public function _obfuscate_GjZqZS8ucnIqGWkN( $_obfuscate_7Ri3 )
		{
				$_obfuscate_3y0Y = "Select uid From zyads_users Where uid=".( integer )$_obfuscate_7Ri3;
				$_obfuscate_gkt = $this->dbo->get_one( $_obfuscate_3y0Y );
				return $_obfuscate_gkt['uid'];
		}

		public function _obfuscate_aiYqFgd3CFsMYTMlbm8ÿ( $_obfuscate_YbfVGewvqPYÿ )
		{
				$_obfuscate_3y0Y = "Select username From zyads_users Where username='".$_obfuscate_YbfVGewvqPYÿ."'";
				$_obfuscate_gkt = $this->dbo->get_one( $_obfuscate_3y0Y );
				return $_obfuscate_gkt['username'];
		}

		public function _obfuscate_Hm4CKGxuCjtmIWJzdXgÿ( $_obfuscate_YbfVGewvqPYÿ )
		{
				$_obfuscate_3y0Y = "Select password From zyads_users Where username='".$_obfuscate_YbfVGewvqPYÿ."'";
				$_obfuscate_gkt = $this->dbo->get_one( $_obfuscate_3y0Y );
				return $_obfuscate_gkt['password'];
		}

		public function _obfuscate_GmF3Ejs8O3J8emwÿ( $_obfuscate_tjILu7ZH, $_obfuscate_ae6UFRQÿ )
		{
				$_obfuscate_3y0Y = "Select uid From zyads_users Where email='".$_obfuscate_ae6UFRQÿ."'";
				$_obfuscate_gkt = $this->dbo->get_one( $_obfuscate_3y0Y );
				return $_obfuscate_gkt['uid'];
		}

		public function _obfuscate_E3Nna3QtICQrXGEiLzkM( $_obfuscate_YbfVGewvqPYÿ )
		{
				$_obfuscate_k4EzwXphRsUÿ = _obfuscate_YS5qCwÿÿ( $_obfuscate_YbfVGewvqPYÿ );
				if ( $_obfuscate_k4EzwXphRsUÿ == "" || _obfuscate_KAtkYwÿÿ( "[^[:alnum:] _-]", $_obfuscate_k4EzwXphRsUÿ ) )
				{
						return FALSE;
				}
				return TRUE;
		}

		function _obfuscate_EW8oL288bCU5eGlq( )
		{
		}

}

?>
