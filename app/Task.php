<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    public $table = 'tasks';

    protected $fillable = [
        'description',
        'title',
    ];

    public function isCompleted() {
        return $this->completed_at !== null;
    }
}