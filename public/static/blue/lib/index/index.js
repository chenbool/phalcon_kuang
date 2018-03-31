socket.on('connect', function(){
    console.log('socket链接成功！');
});

socket.on('ajaxpro', function(msg){
    console.log(msg);
});