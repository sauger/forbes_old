<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_log.php');

// Some (random) data
$ydata = array(1,7,8);#,12,5,5,9,13,5,7,10,13,12,13,20,25);
$datax = array("9:30","10:00","10:30");
// Size of the overall graph
$width=300;
$height=280;

// Create the graph and set a scale.
// These two calls are always required
$graph = new Graph($width,$height);
$graph->SetScale('textint');
$graph->SetMarginColor('white');

// Setup margin and titles
$graph->SetMargin(40,10,10,0);
//$graph->SetMargin(40,20,20,40);
/*
$graph->title->Set('Calls per operator');
$graph->subtitle->Set('(March 12, 2008)');
$graph->xaxis->title->Set('Operator');
$graph->yaxis->title->Set('# of calls');
*/
$graph->yaxis->title->SetFont( FF_FONT1 , FS_BOLD );
$graph->xaxis->title->SetFont( FF_FONT1 , FS_BOLD );
$graph->xaxis->SetTickLabels($datax);

$graph->yaxis->SetColor('red');

// Create the linear plot
$lineplot=new LinePlot($ydata);
$lineplot->SetColor( 'blue' );
$lineplot->SetWeight( 2 );   // Two pixel wide
$lineplot->mark->SetType(MARK_UTRIANGLE);
$lineplot->mark->SetColor('blue');
$lineplot->mark->SetFillColor('red');

$lineplot->value->Show();

// Add the plot to the graph
$graph->Add($lineplot);

// Display the graph
$graph->Stroke();
#$graph->Stroke('../../upload/img.png');
?>
