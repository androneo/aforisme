<?php

namespace App\Jobs;

use App\Jobs\Job;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Queue\InteractsWithQueue;
use App\Aforism;
use App\User;

class AforismIndexData extends Job
{
    // use InteractsWithQueue, SerializesModels;

    protected $slug;  //numele categoriei (etichetei) după care se face query-ul
    protected $user;    //numele userului ale cărui aforisme sunt prezentate
    protected $keyword;  // aforisme care conțin cuvântul keyword;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($slug,$user,$keyword)
    {
        $this->slug = $slug;
        $this->user = $user;
        $this->keyword = $keyword;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        if ($this->slug) {
            return $this->tagIndexData($this->slug);
        }

        if ($this->user) {
            return $this->userIndexData($this->user);
        }

        return $this->normalIndexData();
    }

    protected function normalIndexData()
    {
        $aforisms = Aforism::with('user','tagged','likeCounter')
            ->chrono()
            ->paginate(config('aforism.aforisms_per_page'));
        
        $aforisms->setPath('');

        return [
            'aforisms' => $aforisms,
        ];
    }

    protected function tagIndexData($slug)
    {
        $aforisms = Aforism::withAnyTag([$slug])
                            ->with('user','tagged','likeCounter')
                            ->chrono()
                            ->paginate(config('aforism.aforisms_per_page'));
        
        $aforisms->setPath('');
        
        return [
            'aforisms' => $aforisms,
        ];
    }

    protected function userIndexData($user)
    {
        $aforisms = User::whereName($user)
                        ->first()
                        ->aforisms()
                        // ->verified()
                        ->with('user','tagged','likeCounter')
                        ->chrono()
                        ->paginate(config('aforism.aforisms_per_page'));
        
        $aforisms->setPath('');

            return [
                'aforisms' => $aforisms,
                'user' => $user,
            ];
    }
}
