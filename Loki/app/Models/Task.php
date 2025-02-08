<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed'
    ];

    public function addTask($record) {
        return DB::transaction(function() use ($record) {
            return self::create($record);
        });
    }

    public function updateTask($id, $record) {
        $updatedRecord = DB::transaction(function() use ($record, $id) {
            return $this->where('id', $id)->update([
                'title' => $record['title'],
                'description' => $record['description'],
                'is_completed' => $record['is_completed'] ?? false,
            ]);
        });
    }

    public function deleteTask($id) {
        return DB::transaction(function() use ($id) {
            return $this->where('id', $id)->delete();
        });
    }
}