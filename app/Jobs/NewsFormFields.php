<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\News;
use Illuminate\Contracts\Bus\SelfHandling;

class NewsFormFields extends Job implements SelfHandling
{
    /**
     * The id (if any) of the Post row
     *
     * @var integer
     */
    protected $id;

    /**
     * List of fields and default value for each field
     *
     * @var array
     */
    protected $fieldList = [
        'title' => '',
        'category_id' => 0,
        'meta_keyword' => '',
        'meta_description' => '',
        'page_image' => '',
        'summary'   => '',
        'content' => '',
        'views' => 0,
        'user_id' => 0,
        'status'  => 0
    ];

    /**
     * Create a new job instance.
     *
     * @param integer $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return array of fieldnames => values
     */
    public function handle()
    {
        $fields = $this->fieldList;

        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id, $fields);
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }
        $fields['allStatus'] = array(
            '1' => '已发布',
            '2' => '草稿',
            '3' => '已删除'
        );

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
        $news = News::findOrNew($id);

        $fieldNames = array_keys(array_except($fields, ['tags']));

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $news->{$field};
        }

        $fields['tags'] = $news->tags()->lists('tag')->all();

        return $fields;
    }
}
