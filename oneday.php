<?php 
// content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');

// 抓取資料
require_once("connect.php");
$serachOne = <<<serachone
SELECT * FROM product;
serachone;
$resultOne = mysqli_query($link, $serachOne);

$datay=array(0=>0);

while($one = mysqli_fetch_assoc($resultOne)){
    $oneId = $one["id"];
    $sall = <<<sallserach
    SELECT SUM(demand) demand FROM product p
    JOIN orderDetail od ON od.productId = p.id
    JOIN memberOrder mo ON od.orderId = mo.id
    WHERE DATEDIFF(NOW(), orderTime) < 1 AND p.id = $oneId
    sallserach;
    $sallResult = mysqli_query($link, $sall);
    $sallIt = mysqli_fetch_assoc($sallResult);

    if($sallIt["demand"] == ""){
        $sallIt["demand"] = 0;
    }

    $datay[] = $sallIt["demand"];
}

// Some (random) data

 
// Create the graph. These two calls are always required
$graph = new Graph(1200,400);
$graph->SetScale('intlin');
 
// Add a drop shadow
$graph->SetShadow();
 
// Adjust the margin a bit to make more room for titles
$graph->SetMargin(40,30,20,40);
 
// Create a bar pot
$bplot = new BarPlot($datay);
 
// Adjust fill color
$bplot->SetFillColor('orange');
$graph->Add($bplot);
 
// Setup the titles
$graph->title->Set('One Day');
$graph->xaxis->title->Set('Product ID');
$graph->yaxis->title->Set('Demand');
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Display the graph
$graph->Stroke();
?>