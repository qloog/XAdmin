<?php

namespace App\Repositories\Backend\Event;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Event;

class EventRepository extends BaseRepository
{

    public function model()
    {
        return "App\\Models\\Event";
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



}