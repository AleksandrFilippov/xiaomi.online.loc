<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'portfolios';
    protected $fillable = ['id','name','filter','images','price'];
}