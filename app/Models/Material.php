<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Material
 *
 * @property integer $id
 * @property integer $parent_id
 * @property boolean $material_type
 * @property string $title
 * @property string $media_id
 * @property string $pic_url
 * @property boolean $is_show_pic
 * @property boolean $replay_type
 * @property string $summary
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereMaterialType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereMediaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material wherePicUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereIsShowPic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereReplayType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Material whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Material extends Model
{
    //
}
