<?php

namespace App\Jobs;

use App\Jobs\Job;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Queue\InteractsWithQueue;
use Conner\Tagging\Model\Tag as Tag;
use App\Aforism;


class AforismFormFields extends Job
{
    // use InteractsWithQueue, SerializesModels;

    /**
    * The id (if any) of the Aforism row
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
        'content' => '',
        'răspuns' => '',
        'tags' => '',
        ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
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

        return array_merge( $fields, ['allTags' => Tag::lists('name','name')->all()]);
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
        $aforism = Aforism::findOrFail($id);
        $fieldNames = array_keys($fields);

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $aforism->{$field};
        }

        $fields['tags']=implode($aforism->tagNames());
        $fields['content'] = strip_tags($fields['content']);

        return $fields;
    }
}
