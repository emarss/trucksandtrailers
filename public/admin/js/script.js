$(document).ready(function(){
    $('.custom-file input').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    });
});