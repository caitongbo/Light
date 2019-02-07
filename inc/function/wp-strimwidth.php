<?php
/**
 * the4_strimwidth( ) 函数
 * 功能：字符串截取，并去除字符串中的html和php标签
 * @Param string $str			要截取的原始字符串
 * @Param int $len				截取的长度
 * @Param string $suffix		字符串结尾的标识
 * @Return string					处理后的字符串
 */
function the4_strimwidth( $str, $len, $start = 0, $suffix = '……' ) {
    $str = str_replace(array(' ', '　','&nbsp;', '\r\n'), '', strip_tags( $str ));
    if ( $len>mb_strlen( $str ) ) {
        return mb_substr( $str, $start, $len );
    }
    return mb_substr($str, $start, $len) . $suffix;
}
