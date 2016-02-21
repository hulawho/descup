<?php
	//calculate w/d/l, gf/ga/gd

	$league1 = [];
	$league2 = [];
	$league3 = [];
	
	$fetch_teams = 'SELECT id, name, league FROM teams';
	
	if(!$teams = $conn->query($fetch_teams)){
		die('There was an error running the query [' . $db->error . ']');
	}

	while($team = $teams->fetch_assoc()){
		
		$wins = $draws = $losses = $gf = $ga = $gd = $points = 0; 
		$data = [];

		//first batch
		$fetch_results1 = 'SELECT a_score, b_score FROM fixtures WHERE a_id = ' . $team['id'];
		
		if(!$results1 = $conn->query($fetch_results1)){
			die('There was an error running the query [' . $db->error . ']');
		}
	
		while($result1 = $results1->fetch_assoc()){
		
			//calculate wdl
			$margin = $result1[’a_score’] - $result1[’b_score’];
			if($margin > 0) {
				$wins += 1;
			}
			if($margin === 0) {
				$draws +=1;
			}
			if($margin < 0) {
				$losses +=1;
			}

			//calculate gf/ga
			$gf += $result1[’a_score’];
			$ga += $result1[’b_score’];
		}
		
		$results1->free();
		
		//second batch
		$fetch_results2 = 'SELECT a_score, b_score FROM fixtures WHERE b_id = ' . $team['id'];
		
		if(!$results2 = $conn->query($fetch_results2)){
			die('There was an error running the query [' . $db->error . ']');
		}

		while($result2 = $results2->fetch_assoc()){
		
			//calculate wdl
			$margin = $result2[’b_score’] - $result2[’a_score’];
			if($margin > 0) {
				$wins += 1;
			}
			if($margin === 0) {
				$draws +=1;
			}
			if($margin < 0) {
				$losses +=1;
			}
	
			//calculate gf/ga
			$gf += $result2[’b_score’];
			$ga += $result2[’a_score’];
		
			//calculate gd
			$gd = $gf-$ga;
		
			//calculate points
			$points = $wins*3 + $draws;
		}
		
		$results2->free();
				
		//collate data
		$data['team'] = $team['name'];
		$data['wins'] = $wins;
		$data['draws'] = $draws;
		$data['losses'] = $losses;
		$data['gf'] = $gf;
		$data['ga'] = $ga;
		$data['gd'] = $gd;
		$data['points'] = $points;
	
		//push into relevant array
		if($team['league'] === 1){
			array_push($league1, $data);
		}
		else if ($team['league'] === 2){
			array_push($league2, $data);
		}
		else {
			array_push($league3, $data);
		}
	}
	
	$teams->free();
	
	//sort the leagues by teams with most points, then highest gd, then most goals scored 
	usort($league1, 'cmp');
	usort($league2, 'cmp');
	usort($league3, 'cmp');
	
	print_r($league1);

?>
