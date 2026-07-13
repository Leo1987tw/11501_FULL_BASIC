<div class="seats">
    <?php
    
    for($i = 0; $i < 20; $i++):
    
    ?>
    <div class="seat none">
        <?= floor($i / 5) + 1;?>排<?= $i % 5;?>號
        <input type="checkbox" name="number" class="check" value="<?= $i;?>">
    </div>
    <?php
    
    endfor;
    
    ?>
</div>
<div class="ct">
    <div>
        選擇的電影是：<span class="seats-movie"></span>
    </div>
    <div>
        你選擇的時刻是：<span class="seats-date"></span>&nbsp;&nbsp;<span class="seats-session"></span>
    </div>
    <div>
        您已經勾選<span class="seats-tickets"></span>張票，最多可以購買四張票
    </div>
</div>
<div class="ct">
    <button onclick="backForm()">上一步</button>
    <button>訂購</button>
</div>

<script>
    let seats = new Array();

    $(".check").on("click", function(){
        let number = $(this).val();
        let status = $(this).prop("checked");
        if(status == true){
            if(seats.length > 3){
                $(this).prop("checked", false);
                alert("最多只能訂四張票");
                return;
            }
            seats.push(number);
            $(".seats-tickets").text(seats.length);
        }else {
            index = seats.indexOf(number);
            seats.splice(index, 1);
            $(".seats-tickets").text(seats.length);
        }
    });
</script>