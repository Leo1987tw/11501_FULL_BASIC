<?php

include_once "./db.php";

?>

<table class="all">
    <?php

    $bigs = $Category->all(["parent_id" => 0]);
    foreach ($bigs as $big):

    ?>
        <tr class="tt">
            <td><?= $big["name"]; ?></td>
            <td class="ct">
                <button onclick="editCategory('<?= $big['name']; ?>', <?= $big['id']; ?>)">修改</button>
                <button onclick="del('Types', <?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php

        if ($Category->count(["parent_id" => $big['id']]) > 0):
            $middles = $Category->all(["parent_id" => $big["id"]]);
            foreach ($middles as $middle):

        ?>
                <tr class="pp">
                    <td class="ct"><?= $middle["name"]; ?></td>
                    <td class="ct">
                        <button onclick="editCategory('<?= $middle['name']; ?>', <?= $middle['id']; ?>)">修改</button>
                        <button onclick="del('Category', <?= $middle['id']; ?>)">刪除</button>
                    </td>
                </tr>
    <?php

            endforeach;
        endif;
    endforeach;

    ?>
</table>

<script>
    function editCategory(category, id) {
        let newCategoryName = prompt("請輸入要修改的分類名稱", category);
        if (typeof(newCategoryName) == "string") {
            $.post("./api/api_save_category.php", {
                id, 
                name: newCategoryName
            }, () => {
                getCategoryList();
            })
        }
    }
</script>