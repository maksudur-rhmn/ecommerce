<?php 
function categories()
{
  return \App\Models\Category::orderBy('name', 'asc')->get();
}