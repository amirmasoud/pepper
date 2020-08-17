<?php

namespace Pepper\Helpers;

class ResourceAggregateCreator extends ResourceCreator
{
    protected $path;
    protected $stub;

    /**
     * Create a new resource query creator instance.
     *
     * @param  string  $customStubPath
     * @return void
     */
    public function __construct()
    {
        Parent::__construct();

        $this->path = app_path('GraphQL/Types/Pepper');
        $this->stub = '/aggregate.stub';
    }

    public function create($class, $name, $description, $model)
    {
        $this->resetResourceClass($class, $this->path);

        $stub = $this->getStub();

        $this->files->ensureDirectoryExists($this->path);

        $stub = $this->populateStub('class', $class, $stub);
        $stub = $this->populateStub('model', $model, $stub);
        $stub = $this->populateStub('name', $name, $stub);
        $stub = $this->populateStub('description', $description, $stub);

        $this->files->replace(
            $class = $this->getPath($class, $this->path),
            $stub
        );

        $this->updateConfig($name);

        return $class;
    }

    protected function updateConfig($name)
    {
        $name = strval($name . 'AggregateType');
        if ($this->configKeyExists('graphql.types.' . $name)) {
            $pattern = '/[^\/]{2,}\s*["\']types["\']\s*=>\s*\[\s*/';
            $class = strval('App\GraphQL\Types\Pepper\\' . $name . '::class');
            $update = preg_replace($pattern, "$0 '$name' => $class,\n        ", file_get_contents($this->config));
            file_put_contents($this->config, $update);
        }
    }
}