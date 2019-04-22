<?php

function memberName($id)
{
	$data = DB::table('members')->find($id);
	return $data->name;
}

function countVote($obejct_id,$election_id)
{
	$data = HPro\Election\Enities\Vote::where('object_id',$obejct_id)->where('election_id',$election_id)->get();
	return count($data);
}

function vote($voter_id,$election_id){
	$data = HPro\Election\Enities\Vote::where('voter_id',$voter_id)->where('election_id',$election_id)->get();
	foreach ($data as $key => $val) {
		echo objectName($val->object_id).'<a href="javascript:void(0)" alt="'.route('get.delete.vote',$val->id).'" id="del-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>'.'<br>';
	}
}
