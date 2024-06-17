<x-app-layout>
    <x-content-layout title='Reports' subtitle="User reports" button='Go back' link="reports.index">
        <div class="flex gap-5 justify-between">
            <div class="border rounded-lg p-5  w-1/4 space-y-5">
                <div class="flex justify-between gap-5 text-gray-500 font-bold">
                    <div>Total sales</div>
                    <div>All-time</div>
                </div>
                <div class="text-4xl font-bold text-black">234</div>
            </div>

            <div class="border rounded-lg p-5  w-1/4 space-y-5">
                <div class="flex justify-between gap-5 text-gray-500 font-bold">
                    <div>Total sales</div>
                    <div>2023-2024</div>
                </div>
                <div class="text-4xl font-bold text-black">134</div>
            </div>

            <div class="border rounded-lg p-5  w-1/4 space-y-5">
                <div class="flex justify-between gap-5 text-gray-500 font-bold">
                    <div>Total sales</div>
                    <div>May-2024</div>
                </div>
                <div class="text-4xl font-bold text-black">34</div>
            </div>

            <div class="border rounded-lg p-5  w-1/4 space-y-5">
                <div class="flex justify-between gap-5 text-gray-500 font-bold">
                    <div>Total Revinue</div>
                    <div>All time</div>
                </div>
                <div class="text-4xl font-bold text-black">$3454</div>
            </div>

        </div>
        <div class="mt-10">
            <livewire:reports.user-details />
        </div>
        <div class="mt-10">
            <livewire:reports.active-users />
        </div>
        <div class="mt-10">
            <livewire:reports.in-active-users />
        </div>
    </x-content-layout>
</x-app-layout>
