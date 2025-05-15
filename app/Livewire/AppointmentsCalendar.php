<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Omnia\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events(): Collection
  {
    return collect([
      [
        'id' => 1,
        'title' => 'Meeting Tim',
        'description' => 'Diskusi proyek',
        'date' => Carbon::today(),
      ],
      [
        'id' => 2,
        'title' => 'Review Proyek',
        'description' => 'Evaluasi mingguan',
        'date' => Carbon::tomorrow(),
      ],
    ]);
  }
}
