<?PHP if(!defined('IN_ZYADS')) exit(); 
header('Content-Type:text/html;charset=GB2312');
$type = h($_GET['type']); 
$typeval = h($_GET['typeval']); 
$h = array (
	'createplan' => array (
			'price' => '最高每次点击或是弹窗费用就是用户每次点击或是弹出您的广告时您愿意支付的最高费用。您可以随时更改最高每次点击费用。',
			'cpsprice' => '一件商品的价格提成，以百分比计算',
			'audit' => '站长投放广告是否需要您审核通过后方可投放',
			'budget' => '每日预算控制您的费用。总体而言，在达到每日预算限额时，您的广告就会在当天停止展示',
			'expiredate'=> '结束日期控制此广告计划下的所有广告结束的时间，默认系统将一直为您投放该广告计划直至消费账户余额不足为止。',
			'serverip'=> '数据实时返回时的一个安全认证措施。',
			'aclcity'=> '定向具体的莫个城市，只在选中的城市投放或是除外投放。',
			'aclwebtype'=> '只在合适自己的网站类型中投放或是拒绝非相同类型的网站。',
			'acltimetype'=> '在指定的时间投放，系统将会为您在规定的时间显示广告。',
			'aclweekdaytype'=> '在指定的一周星期几显示广告。',
            'aclpttype'=> '在指定的平台显示广告。',
	),
	'createads' => array (
			'urluid' => '{uid}可获取网站主数字ID的一个标签如:<br><br>http://www.xx.com/?id={uid}',
			'adinfo' => '此描述的内容仅供您使用；客户不会看到该描述。 ',
			'adalt' => '用来对网页上的图片进行描述,光标在图片上时显示的提示语。 ',
			'adtypehtml' => '综合类型广告包括对联、飘浮、HTML自定义等广告综合类型',
			'url' => '您的广告链接到的网址。当用户通过您的广告点击访问您的网站时，将被带到您的目标网址。',
			'description' => '好的描述，能给您带来的更好的广告效果。请注意三大原则，即吸引力、简洁性和准确性',
			'dispurl'=> '在您的广告中显示，便于用户识别您的网站的网址。显示网址最长不得超过 200 个字符。它不必与广告链接到的网址完全相同，但应是作为网站一部分的实际网址。',
			'newadshelp' =>'广告被修改后，需要管理重新审核方能生效。',		
	),
	'stats' => array(
			'clicks' =>'点击数主要是记录注册 销售 展示类计划广告的点击数量，并非点击类计划广告的点击数量',
			'do2clicks' =>'判断IP流量,到达广告页是否有鼠标点击的动作。需要在广告页放检查代码',
			'ctrs' =>'浏览量根结算数的一个比例值',
			'nums' =>'已结算支付的IP次数',
	),
);
echo $h[$type][$typeval];