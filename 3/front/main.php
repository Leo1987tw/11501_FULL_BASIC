<div id="mm">
  <div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
      <div id="abgne-block-20111227">
        <ul class="lists">
        </ul>
        <ul class="controls">
        </ul>
      </div>
    </div>
  </div>
  <div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
      <!-- <table>
        <tbody>
          <tr> </tr>
        </tbody>
      </table> -->
      <div class="movies" style="display: flex; flex-wrap: wrap;">
        <?php

        $today = date("Y-m-d");
        $ondate = date("Y-m-d", strtotime("-2 days"));
        // echo $today . "-" . $ondate;
        $total = $Movie->count(" WHERE `ondate` between '$ondate' AND '$today' && `sh`='1'");
        $division = 4;
        $pages = ceil($total / $division);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $division;
        $rows = $Movie->all(['sh' => '1'], " && `ondate` between '$ondate' AND '$today' ORDER BY `rank` LIMIT $start, $division");
        foreach($rows as $row):

        ?>
        <div class="movie" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; width: 48%; border: 1px solid white; border-radius: 5px;">
          <div onclick="location.href='?do=booking&id=<?= $row['id']?>'" style="cursor: pointer;">
            <img src="./upload/<?= $row['poster']?>" alt="" style="width: 60px;">
          </div>
          <div style="width: 48%; padding: 3px; font-size: 16px;">
            <?= $row['name'];?><br>
            分級：<img src="./icon/03C0<?= $row['grade'];?>.png" alt="" style="width: 20px;"><br>
            上映日期：<?= $row['ondate'];?>
          </div>
          <div>
            <button onclick="location.href='?do=intro&id=<?= $row['id']?>'">劇情簡介</button>
            <button onclick="location.href='?do=booking&id=<?= $row['id']?>'">線上訂票</button>
          </div>
        </div>
        <?php
        
        
        endforeach;
        
        ?>
      </div>
      <div class="ct">
        <?php
        if($now - 1){
          $prev = $i - 1;
          echo "<a href='./index.php?p=$prev'> < </a>";
        }
        for($i = 1; $i <= $pages; $i++){
          $size = ($now == $i) ? "20px" : "16px";
          echo "<a href='./index.php?p=$i' style='font-size: $size'>$i</a>";
        }
        if($now + 1 <= $pages){
          $next = $i + 1;
          echo "<a href='./index.php?p=$next'> > </a>";
        }
        ?>
      </div>
    </div>
  </div>
</div>