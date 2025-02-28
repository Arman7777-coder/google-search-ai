<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Repository\LessonRepeatRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class LessonRepeatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lesson-repeat-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function handle(
        LessonRepeatRepositoryInterface $lessonRepeatRepository,
    ): bool
    {
        $allRepeats = $lessonRepeatRepository->findWhere(['status' => 'active']);
        foreach ($allRepeats as $repeat) {
            if($repeat->lesson) {
                if (Carbon::now() > $repeat->lesson->scheduled_time && $repeat->lesson->status !== 'pending') {
                    $date = Carbon::parse($repeat->lesson->scheduled_time)->next($repeat->weekDay);
                    $newTask = $repeat->lesson->replicate();
                    $newTask->scheduled_time = $date;
                    $newTask->status = 'pending';
                    $newTask->notes = null;
                    $newTask->save();
                    foreach ($repeat->lesson->students as $student) {
                        $newTask->students()->attach($student);
                    }
                    //Change Repeat LessonId
                    $repeat->lesson_id = $newTask->id;
                    $repeat->save();
                }
            }
        }
        return true;
    }
}
