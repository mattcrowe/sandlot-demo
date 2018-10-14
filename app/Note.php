<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 * @package App
 */
class Note extends Model
{
    use SoftDeletes;

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