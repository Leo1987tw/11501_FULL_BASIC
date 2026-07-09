<div id="mm">
  <div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <style>
      .controls {
	      display: flex;
	      justify-content: space-between;
	      align-items: center;
        width: 420px;
        height: 120px;
        margin: 5px auto;
      }

      .left-btn, .right-btn {
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
      }

      .left-btn {
        border-right: 30px solid white;
        border-left: 0px solid white;
      }

      .right-btn {
        border-right: 0px solid white;
        border-left: 30px solid white;
      }

      .lists {
        width: 210px;
        height: 240px;
        margin: auto;
      }

      .btns {
        display: flex;
        position: relative;
        width: 280px;
        height: 120px;
        font-size: 12px;
        overflow: hidden;
      }

      .btn {
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 70px;
        height: 120px;
        padding: 5px;
        flex-shrink: 0;
      }

      .btn img{
        width: 100%;
      }
    </style>
    <div class="rb tab" style="width:95%;">
      <div id="abgne-block-20111227">
        <ul class="lists" style="margin: auto;">
          <?php
          
          $posters = $Poster->all(["sh" => 1], " ORDER BY `rank`");
          foreach($posters as $key => $value):
          
          ?>
          <li class="poster" data-ani="<?= $value['ani'];?>" style="display: none; margin: 30px auto;">
            <img src="./upload/<?= $value['img'];?>" alt="">
            <div style="text-align: center;"><?= $value['name'];?></div>
          </li>
          <?php
          
          endforeach;
          
          ?>
        </ul>
        <ul class="controls">
          <li class="left-btn"></li>
          <li class="btns">
            <?php
            
            $posters = $Poster->all(["sh" => 1], " ORDER BY `rank`");
            foreach($posters as $key => $value):
            
            ?>
            <div class="btn">
              <img src="./upload/<?= $value['img'];?>" alt="">
            </div>
            <?php
            
            endforeach;
            
            ?>
          </li>
          <li class="right-btn"></li>
        </ul>
      </div>
      <script>
        $(".poster").eq(0).show();
        // let now = 0;
        let autoSlide = setInterval(slider
        //   () => {
        //   $(".poster").eq(now).hide();
        //   now++;
        //   if(now >= $(".poster").length){
        //     now = 0;
        //   }
        //   $(".poster").eq(now).show();
        // }
        , 3000);

        function slider(){
          let now = $(".poster:visible");
          let next;
          if($(now).index() + 1 < $(".poster").length){
            next = $(".poster").eq($(now).index() + 1);
          }else {
            next = $(".poster").eq(0);
          }
          let ani = $(now).data("ani");
          // console.log(ani);
          switch(ani){
            case 1:
              $(now).fadeOut(1000, () => {
                $(next).fadeIn(1000);
              });
              break;
            case 2:
              $(now).slideUp(1000, () => {
                $(next).slideDown(1000);
              });
              break
            case 3:
              $(now).hide(1000, () => {
                $(next).show(1000);
              });
            break;
          }
        }

        let p = 0;
        let total = $(".poster").length;
        $(".left-btn, .right-btn").on("click", function(){
          let direction = $(this).attr("class").split("-")[0];
          console.log(direction);
          switch(direction){
            case "left":
              if(p > 0){
                p--
              }
              break;
            case "right":
              if(p + 1 < total - 3){
                p++;
              }
              break;
          }
          $(".btn").animate({right: p*70});
        })
      </script>
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
          $prev = $now - 1;
          echo "<a href='./index.php?p=$prev'> < </a>";
        }
        for($i = 1; $i <= $pages; $i++){
          $size = ($now == $i) ? "20px" : "16px";
          echo "<a href='./index.php?p=$i' style='font-size: $size'>$i</a>";
        }
        if($now + 1 <= $pages){
          $next = $now + 1;
          echo "<a href='./index.php?p=$next'> > </a>";
        }
        ?>
      </div>
    </div>
  </div>
</div>