<?php
/**
 * 数组转化成excel并下载
 * @param $arr
 * @param $excelName
 */
function array2excel($arr,$excelName){
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=".$excelName.".xls");
    echo   "姓名"."\t";
    echo   "手机"."\t";
    echo   "\n";
    foreach($arr as $v){
        foreach($v as $row){
            echo   $row['name']."\t";
            echo   $row['phone']."\t";
            echo   "\n";
        }
    }
}
/**
 * Description:从url获取html
 * @param $url
 * @param $referer
 * @return mixed
 * Created by ChenJian.
 */
function getHtml($url,$referer){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt ($curl,CURLOPT_REFERER,$referer);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; SeaPort/1.2; Windows NT 5.1; SV1; InfoPath.2)");  //模拟浏览器访问
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_TIMEOUT,60);   //只需要设置一个秒的数量就可以
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
    $values = curl_exec($curl);
    curl_close($curl);
    return $values;
}

/**
 * 字符串净化功能,去除所有debuff
 * @param $txt
 * @return mixed|string
 */
function showPureText($txt)
{
    $txt = trim(strip_tags($txt));
    $txt=str_replace('&nbsp;','',$txt);
    $txt=str_replace('&#34;','',$txt);
    $txt=preg_replace('/[\s]+/',' ',$txt);
    $txt=preg_replace('/[\n]/','',$txt);
    $txt=str_replace(array("　","\t","\n","\r"),array('','','',''),$txt);
    return $txt;
}

/**
 * Desc:根据规则，从html字符串中解析出数据，并存入db
 * @param $url
 * @param $reg
 * @param $html
 * by ChenJian.
 */
function parse_and_save($url,$reg,$html){
    //单元格正则抓取
    $unit_reg = $reg['unit_reg'];
    preg_match_all($unit_reg,$html,$units);
    //遍历单元格字符串获取每一个单元格中的数据
    if(!$units[0]){
        exit($url.'<br>抓取终止');
    }
    foreach($units[0] as $unit_str){
        //电话号码正则
        $phone_reg = $reg['phone_reg'];
        preg_match($phone_reg,$unit_str,$phone);
        //名称正则
        $name_reg = $reg['name_reg'];
        preg_match($name_reg,$unit_str,$name);
        $user = array();
        $user['name'] = showPureText($name[0]);
        $user['phone'] = showPureText($phone[0]);
        $user['from_url'] = $url;
        $user['create_time'] = time();
        $res = M('User')->where(array('phone'=>$user['phone'],'name'=>$user['name']))->find();
        if(!$res){
            $uid = M('User')->add($user);
            print_r('数据库中第--'.$uid.'--条数据已经插入完成</br>');
        }else{
            print_r('id--'.$res['id'].'--条数据已经存在</br>');
        }
    }
}

/**
 * Desc: 遍历分页时获取新的url
 * @param $url
 * @param $reg
 * @param $p
 * @return string
 * by ChenJian.
 */
function getNewUrl($url,$reg,$p){
    $page_key = $reg['page_key'];
    if ($reg['is_in_path'] == 1) {
        if ($p == 2) {
            //第二页的时候refere是第一页
            $newUrl = $url.$page_key.''.$p.'/';
        } else {
            //往后面的页数就是上一页的来源
            $newUrl = $url.$page_key.''.$p.'/';
        }
    }
    elseif($reg['is_in_path'] ==0){

    }else{

    }

    return $newUrl;
}

/**
 * Desc:遍历分页时获取新的referer
 * @param $url
 * @param $reg
 * @param $p
 * @return string
 * by ChenJian.
 */
function getNewReferer($url,$reg,$p){
    $page_key = $reg['page_key'];
    if ($reg['is_in_path'] == 1) {
        if ($p == 2) {
            //第二页的时候refere是第一页
            $referer = $url;
        } else {
            //往后面的页数就是上一页的来源
            $referer = $url.$page_key.''.($p-1).'/';
        }
    }
    elseif($reg['is_in_path'] ==0){

    }else{

    }

    return $referer;
}