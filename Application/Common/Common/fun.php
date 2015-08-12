<?php
/**
 * ����ת����excel������
 * @param $arr
 * @param $excelName
 */
function array2excel($arr,$excelName){
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=".$excelName.".xls");
    echo   "����"."\t";
    echo   "�ֻ�"."\t";
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
 * Description:��url��ȡhtml
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
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; SeaPort/1.2; Windows NT 5.1; SV1; InfoPath.2)");  //ģ�����������
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_TIMEOUT,60);   //ֻ��Ҫ����һ����������Ϳ���
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
    $values = curl_exec($curl);
    curl_close($curl);
    return $values;
}

/**
 * �ַ�����������,ȥ������debuff
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
    $txt=str_replace(array("��","\t","\n","\r"),array('','','',''),$txt);
    return $txt;
}
/**
 * Description:���ݹ��򣬴�html�ַ����н��������ݣ�������db
 * @param $html
 * @return array
 * Created by ChenJian.
 */
function parse($url,$reg,$html){
    //��Ԫ������ץȡ
    $unit_reg = $reg['unit_reg'];
    preg_match_all($unit_reg,$html,$units);
    //������Ԫ���ַ�����ȡÿһ����Ԫ���е�����
    foreach($units[0] as $unit_str){
        //�绰��������
        $phone_reg = $reg['phone_reg'];
        preg_match($phone_reg,$unit_str,$phone);
        //��������
        $name_reg = $reg['name_reg'];
        preg_match($name_reg,$unit_str,$name);
        $user = array();
        $user['name'] = showPureText($name[0]);
        $user['phone'] = showPureText($phone[0]);
        $user['from_url'] = $url;
        $user['create_time'] = time();
        $count = M('User')->where(array('phone'=>$user['phone']))->count();
        if(!$count){
            $res = M('User')->add($user);
            print_r('���ݿ��е�--'.$res.'--�������Ѿ��������</br>');
        }
    }
}