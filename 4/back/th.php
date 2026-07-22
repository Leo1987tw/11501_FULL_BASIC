<h2 class="ct">商品分類</h2>

<!-- div.ct>input:text+button -->
<div class="ct">
    <label for="big">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="addBig()">新增</button>
</div>

<!-- div.ct>select+input:text+button -->
<div class="ct">
    <label for="big-select">新增中分類</label>
    <select name="big-select" id="big-select"></select>
    <input type="text" name="middle" id="middle">
    <button onclick="addMiddle()">新增</button>
</div>

<div class="type-list">

</div>

<script>
    getBigs();

    getTypeList()

    function addBig(){
        let big = $("#big").val();
        $.post("./api/api_save_type.php", {
            "name": big, 
            "parent": 0
        }, () => {
            $("#big").val("");
            getBigs();
            getTypeList();
        })
    }

    function getBigs(){
        $.get("./api/api_get_bigs.php", (bigs) => {
            $("#big-select").html(bigs);
        })
    }

    function addMiddle(){
        let middle = $("#middle").val();
        let parent = $("#big-select").val();
        $.post("./api/api_save_type.php", {
            "name": middle, 
            "parent": parent
        }, () => {
            $("#middle").val("");
            getTypeList();
        })
    }

    // function addType(type){
    //     let name = "";
    //     let parent = 0;
    //     switch(type){
    //         case "big":
    //             name = $("#big").val();
    //             break;
    //         case "middle":
    //             name = $("#middle").val();
    //             parent = $("#big-select").val();
    //             break;
    //     }
    //     $.post("./api/api_save_type.php", {
    //         name, 
    //         parent
    //     }, () => {
    //         $("#middle, #big").val("");
    //         getBigs();
    //         getTypeList();
    //     })
    // }

    function getTypeList(){
        $.get("./api/api_get_type_list.php", (list) => {
            $(".type-list").html(list);
        })
    }
</script>

<h2 class="ct">商品管理</h2>

<div class="ct">
    <button onclick="location.href = '?do=add_item'">新增商品</button>
</div>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    
    $items = $Items->all(["sh" => 1]);

    foreach($items as $item):
    
    ?>
    <tr class="pp ct">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <button style="padding: 5px;">修改</button>
            <button style="padding: 5px;">刪除</button>
            <button style="padding: 5px;">上架</button>
            <button style="padding: 5px;">下嫁</button>
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>