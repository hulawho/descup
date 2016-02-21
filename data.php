<?php
	//calculate w/d/l, gf/ga/gd

	$league1 = [];
	$league2 = [];
	$league3 = [];
	
	$league2['A'] = [];
	$league2['B'] = [];
	$league2['C'] = [];
	$league2['D'] = [];
	
	$fetch_teams = "SELECT `id`, `name`, `league`, `group` FROM `teams`";
	
	if(!$teams = $conn->query($fetch_teams)){
		die('There was an error running the query [' . $db->error . ']');
	}

	while($team = $teams->fetch_assoc()){
		
		$wins = $draws = $losses = $gp = $gf = $ga = $gd = $points = 0; 
		$data = [];

		//first batch
		$fetch_results1 = "SELECT `a_score`, `b_score` FROM `fixtures` WHERE `a_id` = " . $team['id'];
		
		if(!$results1 = $conn->query($fetch_results1)){
			die('There was an error running the query [' . $db->error . ']');
		}
	
		while($result1 = $results1->fetch_assoc()){
		
			
			if($result1['a_score'] === null && $result1['b_score'] === null){
				continue;
			}
			
			//calculate wdl
			$margin = $result1['a_score'] - $result1['b_score'];
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
			$gf += $result1['a_score'];
			$ga += $result1['b_score'];
		}
		
		$results1->free();
		
		//second batch
		$fetch_results2 = "SELECT `a_score`, `b_score` FROM `fixtures` WHERE `b_id` = " . $team['id'];
		
		if(!$results2 = $conn->query($fetch_results2)){
			die('There was an error running the query [' . $db->error . ']');
		}

		while($result2 = $results2->fetch_assoc()){
		
			if($result1['a_score'] === null && $result1['b_score'] === null){
				continue;
			}
			
			//calculate wdl
			$margin = $result2['b_score'] - $result2['a_score'];
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
			$gf += $result2['b_score'];
			$ga += $result2['a_score'];
		}
		
		//calculate gp
		$gp = $wins + $draws + $losses;
		
		//calculate gd
		$gd = $gf-$ga;
	
		//calculate points
		$points = $wins*3 + $draws;
		
		$results2->free();
				
		//collate data
		$data['name'] = $team['name'];
		$data['wins'] = $wins;
		$data['draws'] = $draws;
		$data['losses'] = $losses;
		$data['gp'] = $gp;
		$data['gf'] = $gf;
		$data['ga'] = $ga;
		$data['gd'] = $gd;
		$data['points'] = $points;
		
		//debugging
		//print_r($data);

		//push into relevant array
		if($team['league'] == 1){
			array_push($league1, $data);
		}
		else if ($team['league'] == 2){
			if($team['group'] == 'A'){
				array_push($league2['A'], $data);
			} else if ($team['group'] == 'B') {
				array_push($league2['B'], $data);
			} else if ($team['group'] == 'C') {
				array_push($league2['C'], $data);
			} else {
				array_push($league2['D'], $data);
			}
		}
		else {
			array_push($league3, $data);
		}
	}
	
	$teams->free();
	
	//sort the leagues by teams with most points, then highest gd, then most goals scored
	usort($league1, 'cmp');
	usort($league2['A'], 'cmp');
	usort($league2['B'], 'cmp');
	usort($league2['C'], 'cmp');
	usort($league2['D'], 'cmp');
	usort($league3, 'cmp');
	
	$league1 = array_reverse($league1);
	$league2['A'] = array_reverse($league2['A']);
	$league2['B'] = array_reverse($league2['B']);
	$league2['C'] = array_reverse($league2['C']);
	$league2['D'] = array_reverse($league2['D']);
	$league3 = array_reverse($league3);
?>
