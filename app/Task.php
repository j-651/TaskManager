<?php

namespace TaskManager;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dates = ['created_at', 'updated_at', 'due_at'];
}
