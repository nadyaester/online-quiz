<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;

class Classroom extends Model
{
  use HasFactory;
  protected $fillable = ['id', 'name'];
  private $limit = 15;
  private $order = 'DESC';

  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function storeClass($data)
  {
    return Classroom::create($data);
  }

  public function allClass()
  {
    return Classroom::orderBy('created_at', $this->order)->paginate($this->limit);
  }

  public function getClassById($id)
  {
    return Classroom::find($id);
  }

  public function updateClass($data, $id)
  {
    return Classroom::find($id)->update($data);
  }

  public function deleteClass($id)
  {
    return Classroom::find($id)->delete();
  }
}
