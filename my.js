$(document).ready(function(){



$( "#sl" ).change(

function (){
console.log("hhihi");
if ($('#sl option:selected').text()=='giá tăng') {ch();}
if ($('#sl option:selected').text()=='giá giảm') {ch2();}
//if ($('#sl option:selected').text()=='luợt xem'){ch3();}
}

);
})




function ch(){
var $list=$('.sort');
$list.find('.sanpham').sort(function (a,b) {
return +a.getAttribute('gia')-+b.getAttribute('gia');
}).appendTo($list);
$list.find('.pagination').appendTo($list);}

function ch2(){
var $list=$('.sort');
$list.find('.sanpham').sort(function (a,b) {
return +b.getAttribute('gia')-+a.getAttribute('gia');
}).appendTo($list);
$list.find('.pagination').appendTo($list);}


function ch3(){
var $list=$('.sort');
$list.find('.sanpham').sort(function (a,b) {
return +b.getAttribute('luotxem')-+a.getAttribute('luotxem');
}).appendTo($list);}