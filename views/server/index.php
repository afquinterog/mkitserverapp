 
<?php
  use yii\helpers\Html;
  use yii\helpers\Url;

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
									$cpu        = isset($server->metrics->cpu) ? $server->metrics->cpu : 0 ;
									$memory     = isset($server->metrics->memory) ? $server->metrics->memory : 0 ;
									$memoryReal = isset($server->metrics->memory_cache) ? $server->metrics->memory_cache : 0 ;
									$disk       = isset($server->metrics->disk) ? $server->metrics->disk : 0 ;
									$date       = isset($server->metrics->date) ? $server->metrics->date : "";
									$date2      = isset($server->metrics->date) ? $server->metrics->date2 : "";
									$description = $server->description;
									$connections = isset($server->metrics->connections) ? $server->metrics->connections : 0;
									$ip = isset($server->metrics->ip) ? $server->metrics->ip : 0;
									$host = $server->host;
									$cpuColor    = ($cpu >=0 && $cpu <= 50) ? "primary" : ( ($cpu > 50 && $cpu <= 75) ?  "warning" : "danger" );  
									$memoryColor = ($memory >=0 && $memory <= 50) ? "primary" : ( ($memory > 50 && $memory <= 75) ?  "warning" : "danger" );
									$memoryRealColor = ($memoryReal >=0 && $memoryReal <= 50) ? "primary" : ( ($memoryReal > 50 && $memoryReal <= 75) ?  "warning" : "danger" );
									$diskColor   = ($disk >=0 && $disk <= 50) ? "primary" : ( ($disk > 50 && $disk <= 75) ?  "warning" : "danger" );

									$connClass =  "badge badge-" . ( isset($server->connections) ? $server->connections : "info");
									$ipClass =  "badge badge-" . ( isset($server->ip) ? $server->ip : "info");
							?>

							<tr>
							    <td>
							    	<div class="tooltip-primary" data-original-title="<?php echo $description . " / " . $host ; ?>" 
							      	   data-placement="top" data-toggle="tooltip" data-trigger="click"> 
							    		<?php echo $server->name . 
							    		        " <span class='$ipClass' title='Ip'>" . $ip . "</span>" .
							    				" <span class='$connClass' title='Connections'>" . $connections . "</span>" 
							    		; ?>
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
							      	   data-original-title="Memory used: <?php echo $memoryReal; ?>%" 
							      	   data-placement="top" data-toggle="tooltip">
							        <div style="width: <?php echo $memoryReal; ?>%" class="progress-bar progress-bar-<?php echo $memoryRealColor; ?>"></div>
							      </div>

							      <div class="progress progress-xs margin-vertical-10 tooltip-primary" 
							      	   data-original-title="Memory used + buffer + cache: <?php echo $memory; ?>%" 
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
							    <td title="<?php echo $date; ?>"><?php echo $date2; ?></td>
							    <td class="text-nowrap">
							      <a data-original-title="More info" data-toggle="tooltip" 
							      		  class="btn btn-sm btn-icon btn-flat btn-default" type="button" href="<?php echo Url::to(['server/detail']); ?>">
							        <i aria-hidden="true" class="icon wb-wrench"></i>
							      </a>
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
