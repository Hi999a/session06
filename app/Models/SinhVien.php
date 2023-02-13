<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $fillable = ['ho_ten','hinh_anh','que_quan','gio_tinh','lop_hoc_id'];

    /**
     * Get the user that owns the SinhVien
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class);
    }

    public function scopeSearch($query)
    {
        # code...
        $query->where('ho_ten','like','%'.request()->keyword.'%');
        return $query;
    }
}
