 
<?php 

function fileSuffix($filename){

    return strtolower(trim(substr(strrchr($filename, '.'), 1)));

}
$GLOBALS['n']=0;
function getfiles($path){ 
	
	foreach(scandir($path) as $afile)
	{
		if($afile=='.'||$afile=='..') continue; 
		if(is_dir($path.'/'.$afile)) 
			{ 
			getfiles($path.'/'.$afile); 
			} else { 
		    //echo $path.'/'.$afile.'<br />';
		    if (fileSuffix($path.'/'.$afile)=='php'){
		    	$GLOBALS['n']++;
		    }
		    } 
	} 
	
} 
getfiles(__DIR__);
echo $GLOBALS['n'];