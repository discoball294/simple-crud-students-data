<script src="Chart.min.js" language="JavaScript"></script>
<?php
require_once "dbConnect.php";
$query="SELECT
  COUNT(CASE WHEN jk = 'Laki-laki' THEN nim END) AS males,
  COUNT(CASE WHEN jk = 'Perempuan' THEN nim END) AS females,
  COUNT(*) AS Total
FROM students";
$data=$db->query($query);
$row=$data->fetch_assoc();

$laki = $row['males'];
$perempuan = $row['females'];

?>
<canvas id="canvas"></canvas>
<script>
    var pieData = [
        {
            value: <?php echo $laki; ?>,
            color: "#F38630",
            label: "Laki-laki"
        },
        {
            value: <?php echo $perempuan; ?>,
            color: "#E0E4CC",
            label: "Perempuan"
        }

    ];

    var ctx = document.getElementById("canvas").getContext("2d");
    ctx.canvas.width = 350;
    ctx.canvas.height = 350;
    var myDoughnut = new Chart(ctx).Pie(pieData);
</script>

