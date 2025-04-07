#!/bin/bash
models=("DGeneralNotificationRole")
modelsToDispaly=("notification-role")


for model in "${models[@]}"
do

lowerModel=$(echo "$model" | sed 's/^[A-Z]/\L&/')
lowerModelToDispaly=$(echo "$modelsToDispaly" | sed 's/^[A-Z]/\L&/')
# # Generate a model
php artisan make:model $model --migration --seed --resource --policy
php artisan model:filter $model

mkdir  "app/Services/${model}Services"

#Generate a Request
mkdir  "app/Http/Requests/${model}Requests"
php artisan make:request "${model}Requests/${model}StoreRequest"
php artisan make:request "${model}Requests/${model}UpdateRequest"


#Generate Resource
mkdir  "app/Http/Resources/${model}Resources"
php artisan make:resource ${model}Resources/${model}Resource
php artisan make:resource ${model}Resources/${model}Collection  --collection
php artisan model:filter ${model}


# # Create a service for the model in the appropriate directory
modelService="${model}Service"
touch "app/Services/${model}Services/${modelService}.php"
echo "<?php

namespace App\Services\\${model}Services;

use App\Models\\${model};

use Illuminate\Database\Eloquent\Collection;

class ${model}Service
{
    public function __construct(private ${model} \$${lowerModel})
    {
    }

    public function create(array \$data)
    {
        return \$this->${lowerModel}::create(\$data);
    }

    public function edit(array \$data, ${model} \$${lowerModel})
    {
      return  \$${lowerModel}->update(\$data);
    }

    public function delete(${model} \$${lowerModel}): void
    {
        \$${lowerModel}->delete();
    }

    public function getById(int \$id)
    {
        return \$this->${lowerModel}::find(\$id);
    }

    public function getAll(\$filters)
    {
        return collection(\$this->${lowerModel},\$filters);
    }

}">> "app/Services/${model}Services/${modelService}.php"


# Create Controller

touch "app/Http/Controllers/${model}Controller.php"
> "app/Http/Controllers/${model}Controller.php"


echo "<?php

namespace App\Http\Controllers;

use App\Models\\${model};
use App\Http\Requests\\${model}Requests\\${model}StoreRequest;
use App\Http\Requests\\${model}Requests\\${model}UpdateRequest;
use App\Http\Resources\\${model}Resources\\${model}Resource;
use App\Http\Resources\\${model}Resources\\${model}Collection;
use App\Services\\${model}Services\\${model}Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ${model}Controller extends Controller
{
    public const NOT_FOUND_MESSAGE = '${modelsToDispaly} non trouvé.';

    public function __construct(private ${model}Service \$${lowerModel}Service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request \$request)
    {
        \$this->authorize('viewAny', ${model}::class);
        \$${lowerModel}s = \$this->${lowerModel}Service->getAll(\$request->all());

        return response()->json(
            new ${model}Collection(\$${lowerModel}s)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(${model}StoreRequest \$request): JsonResponse
    {
        \$${lowerModel}= \$this->${lowerModel}Service
            ->create(\$request->validated());

        return response()->json(
            [
                'message' => __('responses.$modelsToDispaly.create'),
                'data' => new ${model}Resource(\$${lowerModel})
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(${model} \$${lowerModel}): JsonResponse
    {
        \$this->authorize('view', \$${lowerModel});
        return response()->json(new ${model}Resource (\$${lowerModel}));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(${model}UpdateRequest \$request, ${model} \$${lowerModel}): JsonResponse
    {

        \$this->${lowerModel}Service->edit(\$request->validated(), \$${lowerModel});
        return response()->json([
            'message' => __('responses.$modelsToDispaly.update'),
            'data' => new ${model}Resource (\$${lowerModel})
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(${model} \$${lowerModel}, Request \$request): JsonResponse
    {
        \$this->authorize('delete', \$${lowerModel});
        \$this->${lowerModel}Service->delete(\$${lowerModel});

        return response()->json([ 'message' => __('responses.$modelsToDispaly.update'), 202]);
    }
}" >> "app/Http/Controllers/${model}Controller.php"


#Create Filter Model

echo "<?php

namespace App\ModelFilters;
use Illuminate\Database\Eloquent\Builder;
use EloquentFilter\ModelFilter;


class ${model}Filter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     *
     */
    public function search(\$value)
    {
        \$query = \$this;
        \$fillableColumns = \$query->getModel()->getFillable();
        return \$query->where(function (Builder \$query) use (\$fillableColumns, \$value) {
            foreach (\$fillableColumns as \$column) {
                \$query->orWhere(\$column, 'LIKE', '%' . \$value . '%');
            }
        });
    }
}" > "app/ModelFilters/${model}Filter.php"


echo "<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ${model} extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected \$fillable = [
    ];

}" > "app/Models/${model}.php"


#  Add routes for CRUD operations in your routes file (e.g., web.php or api.php)

  echo    "############################### ${lowerModelToDispaly} ###############################" >> routes/web.php
  echo "Route::prefix('${lowerModelToDispaly}s')->group(function () {
            Route::get('/', [${model}Controller::class, 'index']);
             });
  " >> routes/web.php
  sed -i "2 a\\use App\\\\Http\\\\Controllers\\\\${model}Controller;
    " "routes/web.php"
  echo "CRUD operations generated for $model."


done

# composer dump-autoload

