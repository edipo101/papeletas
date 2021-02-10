<?php

function active($path)
{
	return request()->is($path) ? "active":"";
}

function breadcrumbs($name, $id=null)
{
  if($id==null)
    return Breadcrumbs::render($name);
  else
    return Breadcrumbs::render($name,$id);
}

function dateformato($date)
{
  $lista = explode('-',$date);

  $newdate = $lista[2]."-".$lista[1]."-".$lista[0];
  return $newdate;
}