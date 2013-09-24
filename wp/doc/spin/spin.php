<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "www.yahoo.com.tw");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>基本layout</title>
	<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<script>
$(function()
{
    $('*')
        .on('click', function(e)
        {
            e.preventDefault() ;
        }) ;
    
    $(document)
        .on('click', '*', function(e)
        {
            e.preventDefault() ;
            e.stopPropagation() ;
            
            var _mySpinId = $(this).data('spinId') ;
            
            if (!_mySpinId) 
            {
                ++spinId ;
                $(this).data('spinId', spinId) ;
                spinAry[spinId] = $(this) ;
            }
            else
            {
                $(this).data('spinId', null) ;
                delete spinAry[_mySpinId] ;
            }
            return false ;
        }) ;
    var spinId = 0 ;
    var spinAry = {} ;
    
    var f1 = function()
    {
        for (var k in spinAry)
        {
            var _newDeg = (spinAry[k].data('deg') || 0) + 1 ;

            spinAry[k]
                .css(
                {
                      'background-color': _randomHex()
                    , transform: 'rotate('+ _newDeg +'deg)'
                })
                .data('deg', _newDeg)
        }
    } 
    
    var setivl1 = setInterval(f1, 20) ;
    
    function _randomHex()
    {
        var _tmpStr = '#' ;
        var _ary = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'] ;
        for (var i=1; i<=6; i++)
        {
            _tmpStr += (_ary[Math.floor( Math.random()*16 )]) ;
        }
        return _tmpStr ;
    }
    
    $('body').load('http://www.pchome.com.tw', function(data)
    {
        console.log(data) ;
    })
    
    
}) ;
</script>