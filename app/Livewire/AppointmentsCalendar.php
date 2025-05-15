<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class AppointmentsCalendar extends Component
{
    public $month;
    public $year;
    public $events = [];

    public function mount()
    {
        $now = now();
        $this->month = $now->month;
        $this->year = $now->year;

        // Ambil event dari database (ganti sesuai model Anda)
        $this->events = \App\Models\Event::whereMonth('event_date', $this->month)
            ->whereYear('event_date', $this->year)
            ->get()
            ->groupBy(function($event) {
                return \Carbon\Carbon::parse($event->event_date)->toDateString();
            });
    }

    public function updatedMonth()
    {
        $this->updateEvents();
    }

    public function updatedYear()
    {
        $this->updateEvents();
    }

    public function goToPreviousMonth()
    {
        $date = Carbon::create($this->year, $this->month, 1)->subMonth();
        $this->month = $date->month;
        $this->year = $date->year;
        $this->updateEvents();
    }

    public function goToNextMonth()
    {
        $date = Carbon::create($this->year, $this->month, 1)->addMonth();
        $this->month = $date->month;
        $this->year = $date->year;
        $this->updateEvents();
    }

    public function updateEvents()
    {
        $this->events = \App\Models\Event::whereMonth('event_date', $this->month)
            ->whereYear('event_date', $this->year)
            ->get()
            ->groupBy(function($event) {
                return \Carbon\Carbon::parse($event->event_date)->toDateString();
            });
    }

    public function getCalendarProperty()
    {
        $startOfMonth = Carbon::create($this->year, $this->month, 1)->startOfWeek(Carbon::MONDAY);
        $endOfMonth = Carbon::create($this->year, $this->month, 1)->endOfMonth()->endOfWeek(Carbon::SUNDAY);

        $days = [];
        $today = now()->toDateString();

        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            $days[] = [
                'date' => $date->copy(),
                'isWeekend' => $date->isSaturday() || $date->isSunday(),
                'isToday' => $date->toDateString() === $today,
                'isCurrentMonth' => $date->month == $this->month,
            ];
        }

        return $days;
    }

    public function render()
    {
        return view('livewire.appointments-calendar', [
            'calendar' => $this->calendar,
            'events' => $this->events,
        ]);
    }
}
