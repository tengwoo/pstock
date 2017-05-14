<?php

namespace app\extensions;


use yii\helpers\Html;

class J
{
    /**
     * 货币数字格式化方法
     * @param $number
     * @param string|bool $money_unit 货币单位开启
     * @return string
     */
    public static function money($number, $money_unit = '&yen;')
    {
        $return = $number;

        if (!is_numeric($number))
            $return = 0;

        if ($money_unit !== false) {
            $return = number_format(abs($return), 2, '.', ',');
            $return = ($number < 0 ? '- ' : '') . "{$money_unit} {$return}";
        } else {
            $return = number_format($return, 2, '.', ',');
        }

        return $return;

    }

    /*
     * 中文标题切割方法
     * @param string $word
     * @param int $count
     * @return string
     */
    public static function str_cut($str, $len, $subfix = FALSE)
    {
        if ($len <= 0) {
            return;
        }
        $res = "";
        $offset = 0;
        $chars = 0;
        $length = strlen($str);
        while ($chars < $len && $offset < $length) {

            $hign = decbin(ord(substr($str, $offset, 1)));
            if (strlen($hign) < 8) {
                $count = 1;
            } elseif (substr($hign, 0, 3) == "110") {
                $count = 2;
            } elseif (substr($hign, 0, 4) == "1110") {
                $count = 3;
            } elseif (substr($hign, 0, 5) == "11110") {
                $count = 4;
            } elseif (substr($hign, 0, 6) == "111110") {
                $count = 5;
            } elseif (substr($hign, 0, 7) == "1111110") {
                $count = 6;
            }

            $res .= substr($str, $offset, $count);
            $offset += $count;
            $chars += 1;
        }

        ($subfix && strlen($res) < strlen($str)) && $res .= '…';

        return $res;
    }

    /**
     * 时间戳输出函数，
     * @param $timestamp
     * @param int $type 0|1|2
     * @return bool|string
     */
    public static function datetime($timestamp, $type = 0, $date_divider = '/', $time_divider = ':')
    {
        $template = array(
            0 => "Y{$date_divider}m{$date_divider}d H{$time_divider}i{$time_divider}s",
            "Y{$date_divider}m{$date_divider}d",
            "H{$time_divider}i{$time_divider}s",
        );

        return $timestamp ? date($template[$type], $timestamp) : '从未';
    }

    /**
     * 多条查询结果，返回一维数组
     * @param $obj_array
     * @return array
     */
    public static function asArray($obj_array, $column = 'id', $id_as_key = false)
    {
        $return = array();

        if (!empty($obj_array)) {
            foreach ($obj_array as $i => $v) {
                if ($id_as_key)
                    $return[$v->id] = $v->$column;
                else
                    $return[] = $v->$column;
            }
        }

        return $return;
    }

    /**
     * 多条查询结果，返回字段价值
     * @param $obj_array
     * @param $column
     * @return int
     */
    public static function sum($obj_array, $column)
    {
        $return = 0;

        if (!empty($obj_array)) {
            foreach ($obj_array as $i => $v) {
                $return += $v->$column;
            }
        }

        return $return;
    }

    /**
     * 百分号数字格式化方法
     * @param $number
     * @param string $percent_unit
     * @return int|string
     */
    public static function percent($number, $percent_unit = ' %')
    {
        $return = $number;

        if (!is_numeric($number))
            $return = 0;

        if ($percent_unit !== false) {
            $return = number_format(abs($return), 2, '.', false);
            $return = ($number < 0 ? '- ' : '') . " {$return} {$percent_unit}";
        } else {
            $return = number_format($return, 2, '.', ',');
        }

        return $return;
    }

    public static function asStatus($status, $label_status = array(
        0 => '<img src="/images/status-no.png" height="20" class="status-img"/>',
        1 => '<img src="/images/status-yes.png" height="20" class="status-img"/>'), $tag = 'span')
    {
        if (!isset($label_status[$status]))
            return false;

        return Html::tag($tag, $label_status[$status], array('class' => ($status ? 'text-green' : 'text-red')));
    }

    public static function UALayout(){
        return stripos(\Yii::$app->request->getUserAgent(), 'mobile') === false ? 'mobile' : 'main';
    }
}