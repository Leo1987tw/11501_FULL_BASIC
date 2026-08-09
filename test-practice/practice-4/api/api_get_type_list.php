<?php

include_once "./db.php";

?>

<table class="all">
    <?php

    $bigs = $Type->all(["parent" => 0]);
    foreach ($bigs as $big):

    ?>
        <tr class="tt">
            <td><?= $big["name"]; ?></td>
            <td class="ct">
                <button onclick="editType('<?= $big['name']; ?>', <?= $big['id']; ?>)">修改</button>
                <button onclick="del('Types', <?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php

        if ($Type->count(["parent" => $big['id']]) > 0):
            $middles = $Type->all(["parent" => $big["id"]]);
            foreach ($middles as $middle):

        ?>
                <tr class="pp">
                    <td class="ct"><?= $middle["name"]; ?></td>
                    <td class="ct">
                        <button onclick="editType('<?= $middle['name']; ?>', <?= $middle['id']; ?>)">修改</button>
                        <button onclick="del('Types', <?= $middle['id']; ?>)">刪除</button>
                    </td>
                </tr>
    <?php

            endforeach;
        endif;
    endforeach;

    ?>
</table>

<script>
    function editType(type, id) {
        let newType = prompt("請輸入要修改的分類名稱", type);
        if (typeof(newType) == "string") {
            $.post("./api/api_save_type.php", {
                name: newType,
                id
            }, () => {
                getTypeList();
            })
        }
    }
</script>