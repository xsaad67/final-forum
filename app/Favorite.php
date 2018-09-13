<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
	use RecordsActivity;

    protected $guarded = [];

    /**
     * Favorite morphs to models in favorited_type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function favorited()
    {
    	// requires favorited_type and favorited_id fields on $this->table
    	return $this->morphTo();
    }
}
