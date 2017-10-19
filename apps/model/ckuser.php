<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_Ckuser
{

		public function getuidtousernamenum( $username )
		{
				if ( $username == "" )
				{
						return FALSE;
				}
				$sql = "Select uid From zyads_users Where username='".$username."' AND (type=1 OR type=2)";

				return 0 < $this->dbo->get_num( $sql );
		}

		public function getuidtouidnum( $nfuid )
		{
				$sql = "Select uid From zyads_users Where uid=".( integer )$nfuid;
				return 0 < $this->dbo->get_num( $sql );
		}

		public function getuidtoemailnum( $email )
		{
				$sql = "Select uid From zyads_users Where email='".$email."'";
				return 0 < $this->dbo->get_num( $sql );
		}

		public function getuidtouid( $nfuid )
		{
				$sql = "Select uid From zyads_users Where uid=".( integer )$nfuid;
				$array = $this->dbo->get_one( $sql );
				return $array['uid'];
		}

		public function getusername( $username )
		{
				$sql = "Select username From zyads_users Where username='".$username."'";
				$array = $this->dbo->get_one( $sql );
				return $array['username'];
		}

		public function getpasswordtousername( $username )
		{
				$sql = "Select password From zyads_users Where username='".$username."'";
				$array = $this->dbo->get_one( $sql );
				return $array['password'];
		}

		public function getuidtoemail( $email )
		{
				$sql = "Select uid From zyads_users Where email='".$email."'";
				$array = $this->dbo->get_one( $sql );
				return $array['uid'];
		}

		public function eregusername( $username )
		{
				$username = trim( $username );
				if ( $username == "" || ereg( "[^[:alnum:] _-]", $username ) )
				{
						return FALSE;
				}
				return TRUE;
		}

		public function __destruct( )
		{
		}

}

?>
