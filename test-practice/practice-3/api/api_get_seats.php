<?php

include_once "./db.php";

$orders = $Order->all($_GET);

// dd($orders);

$seats = [];
foreach($orders as $order){
    $tmp = unserialize($order["seats"]);
    $seats = array_merge($seats, $tmp);
}

// dd($seats);

?>

<div class="seats">
    <?php
    
    for($i = 0; $i < 20; $i++):
        $is_booked = in_array($i, $seats) ? "booked" : "none";
    
    ?>
    <div class="seat <?= $is_booked;?>">
        <?= floor($i / 5) + 1;?>排<?= $i % 5 + 1;?>號
        <?php
        
        if(!in_array($i, $seats)):
        
        ?>
        <input type="checkbox" name="seat" class="check" value="<?= $i;?>">
        <?php
        
        endif;

        ?>
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
    <button onclick="checkout()">訂購</button>
</div>

<script>
    let seats = new Array();

    $(".check").on("click", function(){
        let seat = $(this).val();
        let status = $(this).prop("checked");
        if(status == true){
            if(seats.length > 3){
                $(this).prop("checked", false);
                alert("最多只能訂四張票");
                return;
            }
            seats.push(seat);
            $(this).parent().removeClass("none");
            $(this).parent().addClass("booked");
            $(".seats-tickets").text(seats.length);
        }else {
            index = seats.indexOf(seat);
            seats.splice(index, 1);
            $(this).parent().removeClass("booked");
            $(this).parent().addClass("none");
            $(".seats-tickets").text(seats.length);
        }
    });

    // function checkout(){
    //     let data = {
    //         "movie_id": $("#title").val(), 
    //         "on_date": $("#date").val(),
    //         "session": $("#session").val(), 
    //         "quantity": seats.length, 
    //         "seats": seats
    //     }

    //     $.post("./api/api_checkout.php", data, (response) => {
    //         console.log(response);
    //     })
    // }

    function checkout(){
        if(seats.length == 0){
            alert("請勾選一個座位");
            return;
        }
        let data = {
            "movie_id": $("#title option:selected").val(), 
            "on_date": $("#date").val(),
            "session": $("#session").val(), 
            "quantity": seats.length, 
            "seats": seats
        }

        $.post("./api/api_checkout.php", data, (response) => {
            // console.log(response);
            $("#seats").html(response);
        })
    }
</script>