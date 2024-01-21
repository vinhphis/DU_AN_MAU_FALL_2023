<!-- <div class="row2"> -->

<div class="row2 font_title">
  <h1>Biểu đồ</h1>
</div>

<div class="row2 form_content ">
  <div id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
  </div>

  <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      // Set Data
      const data = google.visualization.arrayToDataTable([
        ['Danh Mục', 'Số lượng sản phẩm'],
        <?php
        $tongdm = count($thongke);
        $i = 1;

        foreach ($thongke as $tk) {
          extract($tk);
          if ($i == $tongdm) $dauphay = "";
          else $dauphay = ",";
          echo "['" . $tk['name'] . "', " . $tk['countsp'] . "]".$dauphay;
          $i += 1;
        }
        ?>
      ]);
      // Set Options
      const options = {
        title: 'Thống Kê Danh Mục Sản Phẩm',
        is3D: true
      };

      // Draw
      const chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);

    }
  </script>

</div>
<!-- </div> -->