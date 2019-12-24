$(document).ready(function(){
    $('.searchName').keydown(function(){
        $(this).change(function(){
        let a = document.createElement('span');
        a.innerHTML = $(this).val();
        $(this).val(a.textContent);
        })
    })
});

function decode(string){
    var res = string;
    res = res.replace("&quot;", '"');
    res = res.replace("&#39;", "'");
    res = res.replace("&#33;", "!");
    res = res.replace("&#36;", "$");
    res = res.replace("&#37;", "%");
    res = res.replace("&#61;", "=");
    return res;
}
