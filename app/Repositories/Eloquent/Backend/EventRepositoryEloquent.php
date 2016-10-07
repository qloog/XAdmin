<?php

namespace App\Repositories\Eloquent\Backend;

use App\Exceptions\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\Backend\EventRepository;
use App\Models\Event;
use App\Models\User;

/**
 * Class EvnetRepositoryEloquent
 * @package namespace App\Repositories\Eloquent\Backend;
 */
class EventRepositoryEloquent extends BaseRepository implements EventRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Event::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getFields()
    {
        return [
            'title' => '',
            'event_image' => '',
            'begin_time'   => '',
            'end_time'   => '',
            'content' => '',
            'user_count' => 0,
            'user_id' => 0,
        ];
    }

    /**
     * Execute the job.
     *
     * @param int $id
     * @return array of fieldnames => values
     */
    public function getFormFields($id = 0)
    {
        $fields = $this->getFields();

        if ($id) {
            $fields = $this->fieldsFromModel($id, $fields);
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        return $fields;
    }

    /**
     * Return the field values from the model
     *
     * @param integer $id
     * @param array $fields
     * @return array
     */
    protected function fieldsFromModel($id, array $fields)
    {
        $data = Event::findOrNew($id);

        $fieldNames = array_keys($fields);

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $data->{$field};
        }

        return $fields;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = Event::find($id);

        $user->status = 0;

        return $user->save();
    }
}
