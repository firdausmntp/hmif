<div class="w-full max-w-3x1 mx-auto bg-white rounded-xl shadow p-6">
    <div class="flex items-center justify-between mb-4">
        <button wire:click="goToPreviousMonth" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>
        <div class="font-bold text-lg">
            {{ \Carbon\Carbon::create($year, $month, 1)->translatedFormat('F Y') }}
        </div>
        <button wire:click="goToNextMonth" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>
    <div class="grid grid-cols-7 gap-1 text-center font-semibold mb-2">
        <div>Sen</div>
        <div>Sel</div>
        <div>Rab</div>
        <div>Kam</div>
        <div>Jum</div>
        <div class="text-red-500">Sab</div>
        <div class="text-red-500">Min</div>
    </div>
    <div class="grid grid-cols-7 gap-1 text-center">
        @foreach ($calendar as $day)
            <div class="@if($day['isWeekend']) text-red-500 @endif py-2 rounded 
                @if($day['isToday']) bg-blue-100 font-bold @endif
                @if($day['isCurrentMonth']) bg-white @else text-gray-400 bg-gray-50 @endif
                border border-gray-200 min-h-[70px] relative">
                <div>{{ $day['date']->day }}</div>
                @if(isset($events[$day['date']->toDateString()]))
                    @foreach($events[$day['date']->toDateString()] as $event)
                        <div class="mt-1 text-xs bg-blue-200 text-blue-800 rounded px-1 truncate" title="{{ $event->title }}">
                            {{ \Illuminate\Support\Str::limit($event->title, 10) }}
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
