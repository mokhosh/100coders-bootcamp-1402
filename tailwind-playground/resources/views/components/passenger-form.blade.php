<form class="p-8" action="">
    <h3 class="text-xl font-semibold">بزرگسال</h3>
    <div class="mt-4 flex flex-col md:flex-row gap-4 items-stretch">
        <x-text-input name="name" label="نام"/>
        <x-text-input name="surname" label="نام‌خانوادگی"/>
        <x-select-input name="gender" label="جنسیت" class="px-3"/>

        <div class="flex">
            <x-select-input name="day" label="۱۵" class="flex-1 rounded-l-none px-3"/>
            <x-select-input name="month" label="مهر" class="flex-1 rounded-none border-x-0 px-3"/>
            <x-text-input name="year" label="سال" class="flex-1 rounded-r-none"/>
        </div>
    </div>
</form>
