	<div class='row-fluid'>
		<div class='container'>
			<div class='col-xs-12 col-md-6 post'>
				<div class='row'>
					<div class='panel panel-nb'>
						<div class='col-xs-12 col-md-6 panel-first'>
							<div class='panel panel-default'>
								<div class='panel-heading'>
									<h3>Today's games</h3>
								</div>
			
								<div class='panel-body'>
									<p>Arsenal vs. Barcelona</p>
								</div>
							</div>
						</div>
						<div class='col-xs-12 col-md-6 panel-last'>
							<div class='panel panel-default'>
								<div class='panel-heading'>
									<h3>Upcoming Games</h3>
								</div>
			
								<div class='panel-body'>
									<p>Leicester City vs. Manchester United</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-xs-12 col-md-12 padding-top'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<h3>Recent results</h3>
							</div>

							<div class='panel-body'>
								<p>Arsenal vs. Leicester City: 2 - 1</p>
								<p>Tottenham Hotspur vs. Westbromwich Albion: 4 - 2</p>
							</div>
						</div>
					</div>
					<div class='col-xs-12 col-md-12 padding-top'>
						<div class='panel'>
							<h4>Player Rankings</h4>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Player</th><th>Team</th><th>Goals</th><th>Assists</th>
									</tr> 
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th><td>Mesut Özil</td><td>Arsenal</td><td>17</td><td>5</td> 
									</tr> 
									<tr>
										<th scope="row">2</th><td>Santi Cazorla</td><td>Arsenal</td><td>15</td><td>7</td>
									</tr>
									<tr>
										<th scope="row">3</th><td>Francis Coquelin</td><td>Arsenal</td><td>13</td><td>7</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		
			<div class='col-xs-12 col-md-6 post post-next'>
				<div class='row'>
					<div class='col-xs-12 col-md-12'>
						<div class='panel'>
							<h4>Premier League</h4>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Team</th><th>GP</th><th>W</th><th>D</th><th>L</th><th>GD</th><th>PTS</th>
									</tr> 
								</thead>
								<tbody>
									<?php 
									
									$league1_counter = 0;
									foreach($league1 as $team) { 
										$league1_counter += 1;
									?>
									
									<tr>
										<th scope="row"><?=$league1_counter?></th><td><?=$team['name']?></td><td><?=$team['gp']?></td><td><?=$team['wins']?></td><td><?=$team['draws']?></td><td><?=$team['losses']?></td><td><?=$team['gd']?></td><td><?=$team['points']?></td> 
									</tr> 
									
									<?php
									
									}
									
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class='col-xs-12 col-md-12 padding-top'>
						<div class='panel'>
							<h4>Super League</h4>
							<h5>Group A</h5>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Team</th><th>GP</th><th>W</th><th>D</th><th>L</th><th>GD</th><th>PTS</th>
									</tr> 
								</thead>
								<tbody>
									<?php 
									
									$league2A_counter = 0;
									foreach($league2['A'] as $team) { 
										$league2A_counter += 1;
									?>
									
									<tr>
										<th scope="row"><?=$league2A_counter?></th><td><?=$team['name']?></td><td><?=$team['gp']?></td><td><?=$team['wins']?></td><td><?=$team['draws']?></td><td><?=$team['losses']?></td><td><?=$team['gd']?></td><td><?=$team['points']?></td> 
									</tr> 
									
									<?php
									
									}
									
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class='col-xs-12 col-md-12'>
						<div class='panel'>
							<h5>Group B</h5>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Team</th><th>GP</th><th>W</th><th>D</th><th>L</th><th>GD</th><th>PTS</th>
									</tr> 
								</thead>
								<tbody>
									<?php 
									
									$league2B_counter = 0;
									foreach($league2['B'] as $team) { 
										$league2B_counter += 1;
									?>
									
									<tr>
										<th scope="row"><?=$league2B_counter?></th><td><?=$team['name']?></td><td><?=$team['gp']?></td><td><?=$team['wins']?></td><td><?=$team['draws']?></td><td><?=$team['losses']?></td><td><?=$team['gd']?></td><td><?=$team['points']?></td> 
									</tr> 
									
									<?php
									
									}
									
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class='col-xs-12 col-md-12'>
						<div class='panel'>
							<h5>Group C</h5>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Team</th><th>GP</th><th>W</th><th>D</th><th>L</th><th>GD</th><th>PTS</th>
									</tr> 
								</thead>
								<tbody>
									<?php 
									
									$league2C_counter = 0;
									foreach($league2['C'] as $team) { 
										$league2C_counter += 1;
									?>
									
									<tr>
										<th scope="row"><?=$league2C_counter?></th><td><?=$team['name']?></td><td><?=$team['gp']?></td><td><?=$team['wins']?></td><td><?=$team['draws']?></td><td><?=$team['losses']?></td><td><?=$team['gd']?></td><td><?=$team['points']?></td> 
									</tr> 
									
									<?php
									
									}
									
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class='col-xs-12 col-md-12'>
						<div class='panel'>
							<h5>Group D</h5>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Team</th><th>GP</th><th>W</th><th>D</th><th>L</th><th>GD</th><th>PTS</th>
									</tr> 
								</thead>
								<tbody>
									<?php 
									
									$league2D_counter = 0;
									foreach($league2['D'] as $team) { 
										$league2D_counter += 1;
									?>
									
									<tr>
										<th scope="row"><?=$league2D_counter?></th><td><?=$team['name']?></td><td><?=$team['gp']?></td><td><?=$team['wins']?></td><td><?=$team['draws']?></td><td><?=$team['losses']?></td><td><?=$team['gd']?></td><td><?=$team['points']?></td> 
									</tr> 
									
									<?php
									
									}
									
									?>
								</tbody>
							</table>
						</div>
					</div>	
					<div class='col-xs-12 col-md-12 padding-top'>
						<div class='panel'>
							<h4>Women's Fiesta</h4>
							<table class="table">
								<thead>
									<tr>
										<th>#</th><th>Team</th><th>GP</th><th>W</th><th>D</th><th>L</th><th>GD</th><th>PTS</th>
									</tr> 
								</thead>
								<tbody>
									<?php 
									
									$league3_counter = 0;
									foreach($league3 as $team) { 
										$league3_counter += 1;
									?>
									
									<tr>
										<th scope="row"><?=$league3_counter?></th><td><?=$team['name']?></td><td><?=$team['gp']?></td><td><?=$team['wins']?></td><td><?=$team['draws']?></td><td><?=$team['losses']?></td><td><?=$team['gd']?></td><td><?=$team['points']?></td> 
									</tr> 
									
									<?php
									
									}
									
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</body>