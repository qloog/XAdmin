<?php

namespace App\Services;

/**
 * 分类
 *
 * Class CategoryService
 * @package App\Services
 */
class CategoryService
{

    /**
     * 组合一维数组
     *
     * @param array  $cate
     * @param string $html
     * @param int    $pid
     * @param int    $level
     * @return array
     */
    public static function unlimitedForLevel($cate, $html = '--', $pid = 0, $level = 0)
    {
        $arr = array();
        foreach ($cate as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level + 1;
                $v['html'] = str_repeat($html, $level);
                $arr[] = $v;
                $arr = array_merge($arr, self::unlimitedForLevel($cate, $html, $v['id'], $level + 1));
            }
        }

        return $arr;
    }

    /**
     * 组合多维数组
     *
     * @param        $cate
     * @param string $name
     * @param int    $pid
     * @return array
     */
    public static function unlimitedForLayer($cate, $name = 'child', $pid = 0)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[] = $v;
            }
        }

        return $arr;
    }

    /**
     * 根据一个子分类id获取所有的父级分类
     * eg:  首页>衣服>女装>外套
     *
     * @param array $cate 分类数组
     * @param int   $id   当前分类id
     * @return array
     */
    public static function getParents(array $cate, $id)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($cate, $v['pid']), $arr);
            }
        }

        return $arr;
    }

    /**
     * 根据父级分类id获得所有子分类id
     *
     * @param     $cate
     * @param int $pid
     * @return array
     */
    public static function getChilds($cate, $pid = 0)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr, self::getChilds($cate, $v['id']));
            }
        }

        return $arr;
    }
}

