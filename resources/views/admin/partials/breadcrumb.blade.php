<div class="flex flex-wrap px-5 py-3 text-gray-700 border max-w-full border-gray-200 rounded-lg bg-white shadow-sm" aria-label="Breadcrumb">
  <ol class="flex flex-wrap items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
      <span class="font-medium text-sm"><i class="fa fa-home mr-1"></i></span>
      <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
        Admin
      </a>
    </li>
    <li class="inline-flex items-center">
      <span class="font-medium text-sm"><i class="fa-solid fa-chevron-right mx-2"></i></span>
      <a href="" class="text-sm font-medium text-gray-700 hover:text-blue-600">
        {{ $breadcrumbTitle }}
      </span>
      </a>
    </li>
  </ol>
</div>
