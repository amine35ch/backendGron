<?php

namespace App\Services\DProjectEventServices;

use App\Enums\PTypeEventEnum\PTypeEventEnum;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Models\DProject;
use App\Models\DProjectEvent;
use App\Models\DProjectVisit;

class DProjectEventService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        $dProject = DProject::find($data['d_project_id']);
        $type = $data['type'];
        $data['d_company_id'] = $data['d_company_id']
        ?? $dProject->installer?->company?->id;
        $data['end_date'] = $data['end_date'] ?? $data['start_date'];
        if ($type == PTypeEventEnum::REAL_TRV->value) {
            $event = $dProject->events->where('type', $type)->first();
            if ($event) {
                $event->update($data);
            }
        } else {
            if ($type == PTypeEventEnum::VISIT->value) {
                $this->createVisite($data, $dProject);
            }

            return DProjectEvent::create($data);
        }
    }

    public function createVisite($data, $dProject)
    {
        DProjectVisit::create([
            'name' => $data['entitled'],
            'type' => PTypeVisitEnum::VISIT_INSTALLER->value,
            'visit_date' => $data['start_date'],
            'd_project_id' => $dProject->id,
            'd_company_id' => $data['d_company_id'] ?? null,
            'user_id' => $data['user_id'] ?? null,
        ]);
    }

    public function edit(array $data, DProjectEvent $dProjectEvent)
    {
        $data['d_company_id'] = $data['d_company_id']
        ?? $dProjectEvent->project->installer?->company?->id;

        return $dProjectEvent->update($data);
    }

    public function delete(DProjectEvent $dProjectEvent): void
    {
        $dProjectEvent->delete();
    }

    public function getById(int $id)
    {
        return DProjectEvent::find($id);
    }

    public function getAll($filters)
    {
        return collection(new DProjectEvent, $filters);
    }
}
