{{-- Tambah Data --}}
<div id="add_modal" tabindex="2" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded-lg shadow p-5">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Data
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add_modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="">
                <form class="space-y-4" action="{{ route('admin.employees.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name<span class="text-red-600 text-base">*</span>
                        </label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                            placeholder="Masukan Nama" required />
                    </div>

                    <div>
                        <label for="division" class="block text-sm font-medium text-gray-700">
                            Divisi
                        </label>
                        <select id="division" name="division"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-sm">
                            <option value="">-</option>
                            <option value="Backend Developer">Backend Developer</option>
                            <option value="Frontend Developer">Frontend Developer</option>
                            <option value="UI/UX Developer">UI/UX Developer</option>
                            <option value="Mobile Developer">Mobile Developer</option>
                            <option value="Fullstack Developer">Fullstack Developer</option>
                            <option value="DevOps Developer">DevOps Developer</option>
                        </select>
                        <x-input-error :messages="$errors->get('division')" class="my-1" />
                    </div>
                    
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">
                            Role
                        </label>
                        <select id="role" name="role"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-sm">
                            <option value="">-</option>
                            <option value="Employee">Employee</option>
                            <option value="Staff">Staff</option>
                            <option value="Internship">Internship</option>
                            <option value="Lead">Lead</option>
                            <option value="Project Manager">Project Manager</option>
                            <option value="Human Resource Development">Human Resource Development</option>
                            <option value="Finance">Finance</option>
                            <option value="Direktur">Direktur</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="my-1" />
                    </div>
                    
                    <div>
                        <label for="fingerprint_id" class="block mb-2 text-sm font-medium text-gray-900">ID Fingerprint</label>
                        <input type="number" name="fingerprint_id" id="fingerprint_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                            placeholder="Masukan Id Fingerprint" required />
                    </div>
                    
                    <button type="submit"
                        class="w-full text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                        Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Data --}}
@foreach ($employees as $employee)
    <div id="edit_modal_{{ $employee->id }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow p-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit_modal_{{ $employee->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="">
                    <form class="space-y-4" action="{{ route('admin.employees.update', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name_{{ $employee->name }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" name="name" id="name_{{ $employee->name }}"
                                value="{{ $employee->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                required />
                        </div>

                        <div>
                            <label for="division" class="block text-sm font-medium text-gray-700">
                                Divisi</label>
                            <select id="division" name="division"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-sm">
                                <option value="" {{ is_null($employee->division) ? 'selected' : '' }}> - </option>
                                <option value="Backend Developer"
                                    {{ $employee->division == 'Backend Developer' ? 'selected' : '' }}>Backend
                                    Developer</option>
                                <option value="Frontend Developer"
                                    {{ $employee->division == 'Frontend Developer' ? 'selected' : '' }}>Frontend
                                    Developer</option>
                                <option value="UI/UX Developer"
                                    {{ $employee->division == 'UI/UX Developer' ? 'selected' : '' }}>UI/UX Developer
                                </option>
                                <option value="Mobile Developer"
                                    {{ $employee->division == 'Mobile Developer' ? 'selected' : '' }}>Mobile Developer
                                </option>
                                <option value="Fullstack Developer"
                                    {{ $employee->division == 'Fullstack Developer' ? 'selected' : '' }}>Fullstack
                                    Developer</option>
                                <option value="DevOps Developer"
                                    {{ $employee->division == 'DevOps Developer' ? 'selected' : '' }}>DevOps Developer
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('division')" class="my-1" />
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">
                                Role</label>
                            <select id="role" name="role"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-sm">
                                <!-- Tidak ada opsi default, opsi kosong diizinkan -->
                                <option value="" {{ is_null($employee->role) ? 'selected' : '' }}> - </option>
                                <option value="Employee" {{ $employee->role == 'Employee' ? 'selected' : '' }}>
                                    Employee
                                </option>
                                <option value="Staff" {{ $employee->role == 'Staff' ? 'selected' : '' }}>Staff
                                </option>
                                <option value="Internship" {{ $employee->role == 'Internship' ? 'selected' : '' }}>
                                    Internship</option>
                                <option value="Lead" {{ $employee->role == 'Lead' ? 'selected' : '' }}>Lead</option>
                                <option value="Project Manager"
                                    {{ $employee->role == 'Project Manager' ? 'selected' : '' }}>Project Manager
                                </option>
                                <option value="Human Resource Development"
                                    {{ $employee->role == 'Human Resource Development' ? 'selected' : '' }}>Human
                                    Resource Development</option>
                                <option value="Finance" {{ $employee->role == 'Finance' ? 'selected' : '' }}>Finance
                                </option>
                                <option value="Direktur" {{ $employee->role == 'Direktur' ? 'selected' : '' }}>
                                    Direktur</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="my-1" />
                        </div>

                        <div>
                            <label for="fingerprint_{{ $employee->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">ID Fingerprint</label>
                            <input type="number" name="fingerprint_id" id="fingerprint_{{ $employee->id }}"
                                value="{{ $employee->fingerprint_id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                required maxlength="9" />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Hapus Data --}}
@foreach ($employees as $employee)
    <div id="delete_modal_{{ $employee->id }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white p-4 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="delete_modal_{{ $employee->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="">
                    <p class="text-sm text-red-500 ">Apakah Anda yakin ingin menghapus data ini?</p>
                    <form class="mt-4" action="{{ route('admin.employees.destroy', $employee->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="mb-3">
                            <label for="name_{{ $employee->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" name="name" id="name_{{ $employee->id }}"
                                value="{{ $employee->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="name_{{ $employee->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="name" id="name_{{ $employee->id }}"
                                value="{{ $employee->division }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="name_{{ $employee->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <input type="text" name="name" id="name_{{ $employee->id }}"
                                value="{{ $employee->role }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="name_{{ $employee->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">ID Fingerprint</label>
                            <input type="text" name="name" id="name_{{ $employee->id }}"
                                value="{{ $employee->fingerprint_id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
