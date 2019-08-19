<?php
use HPro\Election\Enities\Voter;
use HPro\Election\Enities\Vote;


function dateFormat($key){
	return date("d-m-Y", strtotime($key)); 
}


function checkedObject($member_id,$election_id,$object_id){
    $voter = Voter::where('member_id',$member_id)->where('election_id',$election_id)->first();
	$vote = Vote::where('election_id',$election_id)
                        ->where('object_id',$object_id)
                        ->where('voter_id',$voter->id)
                        ->first();
    if(isset($vote)){
    	echo 'checked=""';
    }
}

function votedObject($member_id,$election_id){
    $voter = Voter::where('member_id',$member_id)->where('election_id',$election_id)->first();
	$vote = Vote::where('election_id',$election_id)
                        ->where('voter_id',$voter->id)
                        ->get();
    if(isset($vote)){
    	return $vote;
    }else{
    	return null;
    }
}

