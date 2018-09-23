<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 * @package App
 */
class Player extends Model
{

    /**
     * @var string
     */
    protected $morphClass = 'players';

    /**
     * @var string
     */
    protected $table = 'players';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(App\Team::class);
    }

}