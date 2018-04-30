<?php

include_once($_SERVER["DOCUMENT_ROOT"] . '/MainaTest/pollSample/dbConnector.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/MainaTest/pollSample/functions.php');

$query = mysqli_query($conn, "SELECT DISTINCT `text` FROM `Details`");

$totalvotes = returnCountNoCondition('Details');
$piedata = "";
while($thisresult = mysqli_fetch_array($query))
{
    $parray = array('text' => $thisresult['text']);
    $this_votes = returnExists('Details', $parray);

    $percent_votes = ceil(($this_votes/$totalvotes) * 100);

    echo "Code: ".$thisresult['text'].", Votes: ".$this_votes.", Percent: ".$percent_votes."%";

    echo "<br>";
    
    $piedata .= '{ label: "'.$thisresult['text'].'",y: '.$percent_votes.', legendText: "'.$thisresult['text'].'"  },';

    
}

?>

<div id="chartContainer" style="width: 100%; height: 300px"></div> 


<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> 

<script type="text/javascript"> 
window.onload = function() { 
    $("#chartContainer").CanvasJSChart({ 
        title: { 
            text: "Poll Data",
            fontSize: 24
        }, 
        axisY: { 
            title: "Products in %" 
        }, 
        legend :{ 
            verticalAlign: "center", 
            horizontalAlign: "right" 
        }, 
        data: [ 
        { 
            type: "pie", 
            showInLegend: true, 
            toolTipContent: "{label} <br/> {y} %", 
            indexLabel: "{y} %", 
            dataPoints: [ 
                <?php echo $piedata; ?>
            ] 
        } 
        ] 
    }); 
} 
</script> 

