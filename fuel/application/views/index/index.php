<div class="content">
    今日参观总人数:<i class="count"></i>
</div>
<script>
    function getToday() {
    $.ajax({
        url: "/index/today" ,
        type: "GET",
        dataType: "json",
        success: function(data) {
            var count=0;
            for(var i in data){
                //i即属性名字ok,close
                count++;
            }
            $('.count').html(count);
        }
    });
}
getToday();
</script>