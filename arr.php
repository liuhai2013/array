<?php
/**
 * Created by PhpStorm.
 * User: feiyi
 * Date: 18/3/17
 * Time: 下午3:11
 */
/*******第一题************／
$items = array(
    array('http://www.abc.com/a/', 100, 120),
    array('http://www.abc.com/b/index.php', 50, 80),
    array('http://www.abc.com/a/index.html', 90, 100),
    array('http://www.abc.com/a/?id=12345', 200, 33),
    array('http://www.abc.com/c/index.html', 10, 20),
    array('http://www.abc.com/abc/', 10, 30)
);

function arr1($items) {
    $newArr = [];
    foreach ($items as $item) {
        $key = substr($item[0], 0, strrpos($item[0], '/')+1);
        if (isset($newArr[$key])) {
            $newArr[$key][1] = $newArr[$key][1]+$item[1];
            $newArr[$key][2] = $newArr[$key][2]+$item[2];
        } else {
            $newArr[$key] = $item;
        }
    }

    return array_values($newArr);
}


//print_r(arr1($items));
/*****************第二题*************************/
$arr2 = [1, 2, 4, 5, 6, 8];
function king($arr2, $m) {
    $i = 0;
    while (current($arr2)) {
        if (count($arr2) == 1) {
            return current($arr2);
        }
        $i++;
        if ($i == 2) {
            $k = array_search(current($arr2), $arr2);
            unset($arr2[$k]);
            $i = 0;
        }
        next($arr2);
    }
}
/****************第三题 ************************/
$commits= 'A,B,B,A,C,C,D,A,B,C,D,C,C,C,D,A,B,C,D,A';
$answers= 'A,A,B,A,D,C,D,A,A,C,C,D,C,D,A,B,C,D,C,D';
function score($commits, $answers) {
    $diff = array_diff_assoc(explode(',', $commits), explode(',', $answers));
    return count($diff)*5;
}

/**************第四题****************/
function logs() {
    $content = file_get_contents('php://input');
    $arr = explode("\n", $content);
    $sql = 'select * from user where name = '.$arr[1];
    $data = mysql_query($sql);
    file_put_contents('log.txt', var_export($data));
}

/************第八题***************/
$str = 'hello world';
function str($str) {
    $strArr = str_split($str);
    while(count($strArr) > 0) {
        $newStrArr[] = array_pop($strArr);
    }
    $newStr = implode('', $newStrArr);
    return $newStr;
}

/******************第五题****************/
/**
 * 实现 ArrayAccess 接口使对象可以像数组一样被访问
 */
class Configuration implements ArrayAccess
{
    static private $config=null;
    private $configarray = array(
        'firstName' => 'kai',
        'secondName' => 'xinxin',
        'age' => 24
    );

    private function __construct(){}
    public static function instance()
    {
        if (self::$config == null)
        {
            self::$config = new Configuration();
        }
        return self::$config;
    }

    /**
     * [字段是否存在]
     * @param  [string] $index [字段名]
     * @return [boolean]        [字段是否存在]
     */
    function offsetExists($index)
    {
        return isset($this->configarray[$index]);
    }
    /**
     * [获取字段]
     * @param  [string] $index [字段名]
     * @return [string]        [字段值]
     */
    function offsetGet($index) {
        return $this->configarray[$index];
    }
    /**
     * [设置字段]
     * @param  [string] $index    [字段名]
     * @param  [string] $newvalue [字段值]
     */
    function offsetSet($index, $newvalue) {
        $this->configarray[$index] = $newvalue;
    }
    /**
     * [删除字段]
     * @param  [string] $index [字段名]
     */
    function offsetUnset($index) {
        unset($this->configarray[$index]);
    }
}

$config = Configuration::instance();
$config["firstName"];
/************************第7⃣️题***************/
/**
 * Created by PhpStorm.
 * User: feiyi
 * Date: 18/3/17
 * Time: 下午4:57
 */
class Connection {
    public function __sleep()
    {
        return 'serialize';
    }

    public function __wakeup()
    {
        return 'unserialize';
    }
}
$obj = new Connection();
serialize($obj);
unserialize($obj;
