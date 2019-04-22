<?php

function objectName($id)
{
	$data = DB::table('objects')->find($id);
	return $data->title;
}