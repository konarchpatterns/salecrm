<div class="flex justify-between pb-6 gap-5">
    <div class="border rounded-lg p-2  w-1/4 space-y-5">
        <div class="flex justify-between text-gray-500 font-bold">
            <div>Call Time</div>
            <div>{{ $year }}</div>
        </div>
        <div class="text-2xl font-bold text-black">{{ $totalYear }}</div>
    </div>
    <div class="border rounded-lg p-2  w-1/4 space-y-5">
        <div class="flex justify-between text-gray-500 font-bold">
            <div>Call Time</div>
            <div>{{ $month }}</div>
        </div>
        <div class="text-2xl font-bold text-black">{{ $timeMonth }}</div>
    </div>
    <div class="border rounded-lg p-2  w-1/4 space-y-5">
        <div class="flex justify-between text-gray-500 font-bold">
            <div>Call Time</div>
            <div>This week</div>
        </div>
        <div class="text-2xl font-bold text-black">{{ $timeWeek }}</div>
    </div>
    <div class="border rounded-lg p-2  w-1/4 space-y-5">
        <div class="flex justify-between text-gray-500 font-bold">
            <div>Call Time</div>
            <div>Today</div>
        </div>
        <div class="text-2xl font-bold text-black">{{ $todayTime }}</div>
    </div>
</div>
