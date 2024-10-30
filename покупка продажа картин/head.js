$(document).ready(function(){
$('.close-info').click(function (event){
$closeID = $(this).attr('id');
console.log($closeID);
if ($closeID == 'cl1') {
        $('.hello').detach();
    
}
else if ($closeID == 'cl2'){
    $('.market-info').detach();
}

});
});