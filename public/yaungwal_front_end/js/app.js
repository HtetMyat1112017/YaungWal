
$(".btn-plus").on("click",function(){
    let btn = $(this);
    let parent = btn.parent();
    let box = parent.find($(".quantity-box"));
    let v = box.val();
    let c = box.val(Number(v)+1)

})

$(".btn-minus").on("click",function(){
    let btn = $(this);
    let parent = btn.parent();
    let box = parent.find($(".quantity-box"));
    let v = box.val();
    box.val(Number(v)-1)
})

