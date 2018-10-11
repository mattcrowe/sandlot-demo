<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 * @package App
 */
class Note extends Model
{

    /**
     * @var string
     */
    protected $morphClass = 'notes';

    /**
     * @var string
     */
    protected $table = 'notes';

    /**
     * @var array
     */
    protected $guarded = ['id'];

}