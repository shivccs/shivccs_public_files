<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductManageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="product-manage-index">
    <div class='row'>
        <div class='col-sm-12'>
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-check-circle"></i> Device Power Logs</h3>
            </div>
	    <?php //var_dump($power_logs);exit; ?>
            <div class="box box-info">
                <div class='box-body box-no-padding'>
                    <div class='box-body box-no-padding'>  
                        <div class='table-responsive'>          
  			   <table class='table'>
    				<thead>
      					<tr>
        					<th>Sno</th>
        					<th>Device ID</th>
        					<th>Registered Date</th>
        					<th>Start Date Time</th>
						<th>End Date Time</th>
					</tr>
				</thead>
    				<tbody>
				<?php //print_r($power_logs); ?>
				<?php $sno=1; if(!empty($power_logs)) { foreach($power_logs as $key => $plogs)	{ ?>
      					<tr>
        					<td><?php echo $sno; ?></td>
        					<td><?php echo $plogs['device_id']; ?></td>
        					<td>
							<?php 
                                                        $edate=date_create($plogs['added_on']);
                                                        	echo date_format($edate,"d-m-Y");


                                                        //echo $plogs['min_datetime_val']; 
                                                	?>

						</td>
        					<td>
						<?php 
							
							$sdate=date_create($plogs['min_datetime_val']);
							echo date_format($sdate,"d-m-Y H:i A");


							//echo $plogs['min_datetime_val']; 
						?>
						</td>
						<td>
                                                <?php 
                                                        $edate=date_create($plogs['max_datetime_val']);
                                                        echo date_format($edate,"d-m-Y H:i A");


                                                        //echo $plogs['min_datetime_val']; 
                                                ?>
                                                </td>
        				</tr>
			        <?php $sno++;}} ?>
				</tbody>
  			</table>
  			</div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>     
