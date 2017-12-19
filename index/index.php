<?php
    include "../public/header.php";
?>
<div class="theme">
    <?php
        $sqlT = "select * from shows where eid=1";
       $resultT =  $db->query($sqlT);
       $resultT->setFetchMode(PDO::FETCH_ASSOC);
       while($rowT = $resultT->fetch()){
         ?>
           <div class="imgs"><a href="content.php?sid=<?php echo $rowT['sid']?>"><?php echo $rowT['stitle']?></a></div>
    <?php
       }
    ?>

</div>
</body>
<style>
    .theme{
        width: 1200px;
        height: 500px;
        border: 1px solid #cccccc;
        margin: 10px auto;
        position: relative;
    }
    .imgs{
        width: 100%;
        height:100%;
        text-align: center;
        line-height: 500px;
        font-size: 50px;
        background: #2aabd2;
        position: absolute;
        top:0;
        left:0;
    }
    .imgs>a{
        color: #fff;
    }
    .imgs:first-child{
        z-index: 2;
    }
</style>
<script>
    $(function () {
        let num = 0;
        let imgs = $(".imgs");
        setInterval(function () {
            num++;
            if(num == imgs.length){
                num = 0;
            }
            imgs.fadeOut().css({"z-index":1})
            imgs.eq(num).fadeIn(function () {
                $(this).css({"z-index":2});
            })
        },3000)
    })
</script>
</html>