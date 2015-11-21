 
<?php
  use yii\helpers\Html;

  $this->title = "Mkit App :: Dashboard";
?>

 <!-- Page -->
<div class="page">
<div class="page-content">
  <h2>Mkit Servers</h2>


  <div class="panel">
  	<div class="panel-body container-fluid">

  		<div class="row row-lg">
  			<div class="col-md-12">

		  		<!--Servers table -->
				<div class="example table-responsive">
					<table class="table table-bordered">
						<thead>
						  <tr>
						    <th>Server</th>
						    <th>Cpu</th>
						    <th>Memory</th>
						    <th>Disk</th>
						    <th>Date</th>
						    <th class="text-nowrap">Action</th>
						  </tr>
						</thead>
						<tbody>
							<?php
								foreach($servers as $server): 					
									$cpu    = isset($server->metrics->cpu) ? $server->metrics->cpu : 0 ;
									$memory = isset($server->metrics->memory) ? $server->metrics->memory : 0 ;
									$disk   = isset($server->metrics->disk) ? $server->metrics->disk : 0 ;
									$date   = isset($server->metrics->date) ? $server->metrics->date : "";
									$description = $server->description;
									$host = $server->host;
									$cpuColor    = ($cpu >=0 && $cpu <= 50) ? "primary" : ( ($cpu > 50 && $cpu <= 75) ?  "warning" : "danger" );  
									$memoryColor = ($memory >=0 && $memory <= 50) ? "primary" : ( ($memory > 50 && $memory <= 75) ?  "warning" : "danger" );
									$diskColor   = ($disk >=0 && $disk <= 50) ? "primary" : ( ($disk > 50 && $disk <= 75) ?  "warning" : "danger" );
							?>

							<tr>
							    <td>
							    	<div class="tooltip-primary" data-original-title="<?php echo $description . " / " . $host ; ?>" 
							      	   data-placement="top" data-toggle="tooltip" data-trigger="click"> 
							    		<?php echo $server->name; ?>
							    	</div>
							    </td>
							    <td>
							      <div class="progress progress-xs margin-vertical-10 tooltip-primary" 
							      	   data-original-title="<?php echo $cpu; ?>%" 
							      	   data-placement="top" data-toggle="tooltip">
							        <div style="width: <?php echo $cpu; ?>%" class="progress-bar progress-bar-<?php echo $cpuColor; ?>"></div>
							      </div>
							    </td>
							    <td>
							      <div class="progress progress-xs margin-vertical-10 tooltip-primary" 
							      	   data-original-title="<?php echo $memory; ?>%" 
							      	   data-placement="top" data-toggle="tooltip">
							        <div style="width: <?php echo $memory; ?>%" class="progress-bar progress-bar-<?php echo $memoryColor; ?>"></div>
							      </div>
							    </td>
							    <td>
							      <div class="progress progress-xs margin-vertical-10 tooltip-primary" 
							      	   data-original-title="<?php echo $disk; ?>%" 
							      	   data-placement="top" data-toggle="tooltip">
							        <div style="width: <?php echo $disk; ?>%" class="progress-bar progress-bar-<?php echo $diskColor; ?>"></div>
							      </div>
							    </td>
							    <td><?php echo $date; ?></td>
							    <td class="text-nowrap">
							      <button data-original-title="More info" data-toggle="tooltip" 
							      		  class="btn btn-sm btn-icon btn-flat btn-default" type="button">
							        <i aria-hidden="true" class="icon wb-wrench"></i>
							      </button>
							      <button data-original-title="Delete Server" data-toggle="tooltip" 
							      		  class="btn btn-sm btn-icon btn-flat btn-default" type="button">
							        <i aria-hidden="true" class="icon wb-close"></i>
							      </button>
							    </td>
						  	</tr>

							<?php
								endforeach;
							?>
						 	
						</tbody>
					</table>
				</div>
				<!-- End Servers table -->

			</div>
		</div>

  	</div>
  </div>

  <p>
  	<?php //print_r($servers); ?>
  	<?php //echo $user->username; ?>
  </p>
</div>
</div>
<!-- End Page -->
