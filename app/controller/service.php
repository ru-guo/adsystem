<?php

class Controller_Service
{

    public function controller_service( )
    {
        $action = $_REQUEST['action'];
        if ( !in_array( $action, array( "login", "postuserlogin" ) ) )
        {
            if ( empty( $_SESSION['serviceusername'] ) || empty( $_SESSION['servicepassword'] ) )
            {
                redirect( "/service/?action=login" );
            }
            $usercla = Z::getsingleton( "model_userclass" );
            $password = $usercla->userpassword( $_SESSION['serviceusername'], 3 );
            if ( $password != $_SESSION['servicepassword'] )
            {
                redirect( "/service/?action=login" );
            }
        }
    }

    public function actionindex( )
    {
        $newsmodel = Z::getsingleton( "model_newsclass" );
        $usermodel = Z::getsingleton( "model_userclass" );
        $sitemodel = Z::getsingleton( "model_siteclass" );
        $sitetypemodel = Z::getsingleton( "model_sitetypeclass" );
        $dayuser = $usermodel->getuserscontact( );
        $userstatus0num = $usermodel->getuidservicestatustype( );
        $sitestatus0num = $sitemodel->getuidservicestatustype( );
        $daysites = $sitemodel->getsiteuserservicedetail( );
        $news = $newsmodel->getallnews( "10" );
        $dayaddnum = count( $dayuser );
        require( TPL_DIR."/index.php" );
    }

    public function actionusers( )
    {
        $usermodel = Z::getsingleton( "model_userclass" );
        $actiontype = $_REQUEST['actiontype'];
        $searchtype = $_REQUEST['searchtype'];
        $searchval = $_REQUEST['searchval'];
        $statetype = $_REQUEST['statetype'];
        $sortingtype = $_REQUEST['sortingtype'];
        $sortingm = $_REQUEST['sortingm'];
        if ( $actiontype == "postchoose" )
        {
            $usermodel->clearuserdata( "service" );
            $redurl = $_SERVER['HTTP_REFERER'];
            $redurl .= strstr( $redurl, "?" ) ? "" : "?";
            $redurl .= strstr( $redurl, "statetype" ) ? "" : "&statetype=success";
            redirect( $redurl );
        }
        if ( $actiontype == "edit" )
        {
            $type = "editusru";
            $users = $usermodel->getuserserivce( );
            require( TPL_DIR."/ajaxcontent.php" );
            exit( );
        }
        if ( $actiontype == "postedit" )
        {
            $users = $usermodel->tocontact( );
            echo "<script>parent.doRemoveWin()</script>";
            exit( );
        }
        $usersql = $usermodel->moneyandnums( );
        z::loadclass( "pager" );

        $page = new Pager( );
        $url = "?action=users&actiontype=".$actiontype.( "&searchtype=".$searchtype."&searchval={$searchval}&sortingtype={$sortingtype}&sortingm={$sortingm}" );
        $page->url = $url;
        $users = $page->parse_sqls( $usersql, $usermodel->dbo );
        $viewpage = $page->navbar( );
        require( TPL_DIR."/users.php" );
    }

    public function actionsite( )
    {
        $sitemodel = Z::getsingleton( "model_siteclass" );
        $sitetypemodel = Z::getsingleton( "model_sitetypeclass" );
        $actiontype = $_REQUEST['actiontype'];
        $searchtype = h( $_REQUEST['searchtype'] );
        $searchval = h( trim( $_REQUEST['searchval'] ) );
        $statetype = $_REQUEST['statetype'];
        if ( $actiontype == "alexapr" )
        {
            $q = $sitemodel->sitealexa( );
            exit( $q );
        }
        if ( $actiontype == "edit" )
        {
            $sitetype = $sitetypemodel->tsitetypeparents( );
            $s = $sitemodel->getsiteusersiteiddetail( );
        }
        if ( $actiontype == "postupdatesite" )
        {
            $s = $sitemodel->updateadsitename( );
            redirect( "?action=site&statetype=success" );
        }
        if ( $actiontype == "postchoose" )
        {
            $sitemodel->sitelockstatus( "service" );
            $redurl = $_SERVER['HTTP_REFERER'];
            $redurl .= strstr( $redurl, "?" ) ? "" : "?";
            $redurl .= strstr( $redurl, "statetype" ) ? "" : "&statetype=success";
            redirect( $redurl );
        }
        if ( $actiontype == "updenyinfo" )
        {
            $q = $sitemodel->updatesitedenyinfo( "service" );
            $redurl = $_SERVER['HTTP_REFERER'];
            $redurl .= strstr( $redurl, "?" ) ? "" : "?";
            $redurl .= strstr( $redurl, "statetype" ) ? "" : "&statetype=success";
            redirect( $redurl );
        }
        $sitesql = $sitemodel->getsitedetailsqlandnum( );
        z::loadclass( "pager" );

        $page = new Pager( );
        $url = "?action=site&actiontype=".$actiontype.( "&searchtype=".$searchtype."&searchval={$searchval}" );
        $page->url = $url;
        $site = $page->parse_sqls( $sitesql, $sitemodel->dbo );
        $viewpage = $page->navbar( );
        require( TPL_DIR."/site.php" );
    }

    public function actionstats( )
    {
        $statsmodel = Z::getsingleton( "model_statsclass" );
        $actiontype = $_REQUEST['actiontype'];
        $timerange = $_REQUEST['timerange'];
        $searchtype = h( $_REQUEST['searchtype'] );
        $searchval = h( trim( $_REQUEST['searchval'] ) );
        $statetype = $_REQUEST['statetype'];
        if ( 3 < strlen( $timerange ) )
        {
            $d = @explode( "/", $timerange );
            $time_begin = $d[0];
            $time_end = $d[1];
        }
        $statssql = $statsmodel->numviewsdayusers( );
        z::loadclass( "pager" );

        $page = new Pager( );
        $addurl = "&actiontype=".$actiontype.( "&timerange=".$timerange."&searchtype={$searchtype}&searchval={$searchval}" );
        $page->url = "?action=stats".$addurl;
        $page->totalCount = 30;
        $stats = $page->parse_sqls( $statssql, $statsmodel->dbo );
        $viewpage = $page->navbar( );
        require( TPL_DIR."/stats.php" );
    }

    public function actionpm( )
    {
        $actiontype = $_GET['actiontype'];
        $statetype = $_REQUEST['statetype'];
        $pmmodel = Z::getsingleton( "model_pmclass" );
        if ( $actiontype == "postcreatepm" )
        {
            $q = $pmmodel->createmessagemsgtype( $_SESSION['serviceusername'] );
            redirect( "?action=pm&statetype=success" );
        }
        else if ( $actiontype == "view" )
        {
            $m = $pmmodel->messageservicedrow( );
            if ( $m )
            {
                $re = $pmmodel->tmessageparentrow( $m['msgid'] );
            }
            $msgid = ( integer )$_GET['msgid'];
            $type = $_GET['type'];
            $u = $pmmodel->messageisviewisadmin( );
        }
        else
        {
            if ( $actiontype == "postrepm" )
            {
                $m = $pmmodel->messageservicedrow( );
                $q = $pmmodel->tmessageisadmin( $_SESSION['serviceusername'], $m['touser'] );
                $msgid = ( integer )$_POST['msgid'];
                $type = $_POST['type'];
                redirect( "?action=pm&actiontype=view&type=".$type."&msgid=".$msgid."&statetype=success" );
            }
            else
            {
                if ( $actiontype == "outbox" )
                {
                    $sql = $pmmodel->messagesendsqlandnums( );
                }
                else
                {
                    $sql = $pmmodel->messageservicesqlandnums( );
                }
                z::loadclass( "pager" );

                $page = new Pager( );
                $url = "?action=pm&actiontype=".$actiontype;
                $page->url = $url;
                $m = $page->parse_sqls( $sql, $pmmodel->dbo );
                $viewpage = $page->navbar( );
            }
        }
        require( TPL_DIR."/pm.php" );
    }

    public function actionuserinfo( )
    {
        $usercla = Z::getsingleton( "model_userclass" );
        $username = isset( $_GET['username'] ) ? $_GET['username'] : "";
        $username = trim( strtolower( $username ) );
        $getuidtousernamenum = $usercla->getuidtousernamenum( $username );
        if ( $getuidtousernamenum )
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }

    public function actionuserlogin( )
    {
        $usercla = Z::getsingleton( "model_userclass" );
        $parsesqr = $usercla->getuserserivce( );
        $qqusersinfo = $usercla->qqusersinfo( $parsesqr );
        redirect( "".$GLOBALS['C_ZYIIS']['authorized_url']."/affiliate/" );
    }

    public function actionlogin( )
    {
        require( TPL_DIR."/login.php" );
    }

    public function actionpostuserlogin( )
    {
        $usercla = Z::getsingleton( "model_userclass" );
        $usercla->checkadsuers( 3 );
    }

}
