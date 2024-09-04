@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')
            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-52">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-lg font-semibold"><i class="fa-solid fa-caret-right"></i>&nbsp;
                                Data Absensi</h3>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class=" overflow-hidden">
                                <table id="dataTable" class="min-w-full mt-3 rounded-xl divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase border">
                                                Nama
                                            </th>
                                            @foreach (range(1, 30) as $day)
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase border">
                                                    {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                                                </th>
                                            @endforeach

                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase border">
                                                Total Kehadiran
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y rounded-xl divide-gray-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 border">
                                            Nanang Supriatna
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                            <i class="fa-solid fa-check"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-base  font-bold text-gray-800 border">
                                            10
                                        </td>
                                        </t>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('admin.recruitment.modal') --}}

    <script>
        document.querySelectorAll('input[name="filter"]').forEach((filter) => {
            filter.addEventListener('change', function() {
                const selectedFilter = this.value;
                const url = new URL(window.location.href);
                url.searchParams.set('filter', selectedFilter);
                window.location.href = url.toString();
            });
        });
    </script>

    <script>
        document.querySelectorAll('[data-modal-target]').forEach(button => {
            button.addEventListener('click', function() {
                const filePath = this.getAttribute('data-file-path');
                const modal = document.getElementById(this.getAttribute('data-modal-target'));
                const iframe = modal.querySelector('#pdfFrame');

                iframe.src = filePath;
                modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById(this.getAttribute('data-modal-hide'));
                modal.classList.add('hidden');
            });
        });
    </script>
@endsection
