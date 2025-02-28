<?php

declare(strict_types=1);

namespace App\Console\Commands\CustomMakers;


use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends \Illuminate\Foundation\Console\ModelMakeCommand
{


    public function handle()
    {
        if ($this->option('repo')) {
            $this->createRepository();
        }

        if ($this->option('service')) {
            $this->createService();
        }

        parent::handle();
    }

    /**
     * Create a policy file for the model.
     *
     * @return void
     */
    protected function createService()
    {
        $service = Str::studly(class_basename($this->argument('name')));

        $this->call('make:service', [
            'name' => "{$service}Service",
        ]);
    }
    /**
     * Create a policy file for the model.
     *
     * @return void
     */
    protected function createRepository()
    {
        $service = Str::studly(class_basename($this->argument('name')));

        $this->call('make:repo', [
            'name' => "{$service}Repository",
        ]);
    }

    protected function getOptions(): array
    {
        return array_merge(parent::getOptions(), [
            ['repo', null, InputOption::VALUE_NONE, 'Create a new repository for the model'],
            ['service', null, InputOption::VALUE_NONE, 'Create a new service for the model'],
        ]);
    }

}
