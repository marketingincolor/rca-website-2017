<?php

// Get Operations Team Query
$args = array(
	'role' => 'board_of_directors',
	'fields' => 'ID'
);

$operations_team_query = new WP_User_Query( $args );
$operations_team = $operations_team_query->get_results();

// If we have operations team loop through staff members.
if ( !empty($operations_team)) {

	//loop through operations team and count
	$last = count($operations_team);
	$count = 0;
	$end = '';
	foreach($operations_team as $team_member) {

		// Add classes depending on count
		if ( $count == 0 ){
			$additionalClass = 'large-offset-3';
		}
		if ( $count == ($last - 1)) {
			$end = 'end';
		}

		echo '<div class="small-12 ' . $additionalClass .' large-2 columns ' . $end .'">';
		$member_info = get_userdata($team_member[0]);
		$profile_picture = get_field('profile_picture', $member_info);
		if( !empty($profile_picture)) : 
			echo '<div class="profile-picture"><img src="' . $profile_picture['url'] . '" alt="Profile Picture" /></div>'; 
		endif;
		echo '<div class="staff-name">' . $member_info->first_name . ' ' . $member_info->last_name . '</div>';
		echo '</div>';
		$additionalClass = '';
		$count++;
	}

}
else { echo 'No Team Members Found'; }

?>