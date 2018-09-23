<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * @package App
 */
class Team extends Model
{

    /**
     * @var string
     */
    protected $morphClass = 'teams';

    /**
     * @var string
     */
    protected $table = 'teams';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(App\Player::class);
    }

}