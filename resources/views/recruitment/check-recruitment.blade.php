@include('partials.start')
<div id="preloader" class="fixed inset-0 bg-gray-800 bg-opacity-80 flex items-center justify-center z-50">
    <div class="absolute animate-spin rounded-full h-28 w-28 border-t-4 border-b-4 border-blue-500"></div>
    <img src="{{ asset('favicon.ico') }}" class="rounded-full h-20 w-20">
</div>
<div id="about" class="h-full min-h-screen bg-fixed bg-cover bg-no-repeat p-4 md:py-16"
    style="background-image: url('{{ asset('dist/images/homepages/zmi-bg-hero.webp') }}');">
    <section class="mx-auto max-w-[1100px] lg:px-6">
        <div class="container px-0">
            <div class="py-5 px-6 md:max-w-none lg:flex flex-col rounded-xl ring-1 bg-white ring-gray-200 shadow-lg">
                <div class="flex mb-5 flex-wrap justify-center sm:justify-start">
                    <div class="left-0 mr-1">
                        <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}" alt="Logo" class="w-full h-12 lg:h-14">
                    </div>
                    <div class="sm:ml-auto mt-1 text-center">
                        <h1 class="text-base lg:text-lg font-bold text-blue-700">CEK HASIL LAMARAN KERJA</h1>
                        <p class="text-xs lg:font-semibold text-blue-700">PT ZEN MULTIMEDIA INDONESIA</p>
                    </div>
                </div>
                <hr>
                <div class="flex items-center justify-center mt-5">
                    <label for="checkemail" class="text-base md:max-w-md lg:max-w-full font-bold text-gray-600">
                        Silahkan Cek hasil Lamaran anda disini.
                    </label>
                </div>
                <div class="mt-5 w-full">
                    <form action="{{ route('recruitment.checkrecruitment') }}" method="POST"
                        class="flex items-center max-w-lg mx-auto">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="relative w-full">
                            <div
                                class="absolute inset-y-0 text-blue-600 start-0 flex items-center ps-3 pointer-events-none text-base">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <input name="email" type="email" id="checkemail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari Alamat Email Anda" required />
                        </div>
                        <button type="submit"
                            class="py-2.5 px-3 ms-2 text-xs font-medium text-white bg-blue-700 rounded-md border border-blue-700 hover:bg-blue-800">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
                <div class="mt-5 w-full">
                    @if (isset($recruitments) && count($recruitments) > 0)
                        <ul class="pace-y-4">
                            @foreach ($recruitments as $recruitment)
                                <div class="p-4">
                                    <div class="flex flex-col mx-3 items-center">
                                        <p class="font-normal text-base text-center">
                                            Hai Selamat Datang
                                            <span
                                                class="font-bold text-base text-blue-600">{{ $recruitment->name }}</span>,
                                            Kami telah menerima data lamaran anda dengan Email <span
                                                class="font-bold text-base text-blue-600">{{ $recruitment->email }}</span>.
                                            Kami harap Anda bersabar menunggu proses seleksi ini.
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="ms-6 text-gray-600 font-semibold text-lg mb-4">Proses Seleksi:</p>
                                        <ol class="flex flex-wrap justify-between items-center w-full relative mb-5">
                                            <li
                                                class="flex flex-col items-center sm:w-1/2 lg:w-1/4 relative {{ $recruitment->stage1 ? 'text-green-600' : ($recruitment->failed_stage === 'Check CV' ? 'text-red-600' : 'text-gray-400 animate-pulse') }}">
                                                <span
                                                    class="relative flex items-center justify-center w-10 h-10 {{ $recruitment->stage1 ? 'bg-blue-100' : ($recruitment->failed_stage === 'Check CV' ? 'bg-red-100' : 'bg-gray-100') }} rounded-full lg:h-12 lg:w-12 shrink-0">
                                                    <span
                                                        class="absolute left-0 flex items-center justify-center w-2 h-2 text-sm {{ $recruitment->stage1 ? 'opacity-100 text-green-600' : ($recruitment->failed_stage === 'Check CV' ? 'opacity-100 text-red-600' : 'opacity-0') }} transition-opacity duration-300">
                                                        <i
                                                            class="fa-solid {{ $recruitment->failed_stage === 'Administrasi' ? 'fa-circle-xmark' : 'fa-circle-check' }}"></i>
                                                    </span>
                                                    <i class="fa-regular fa-file-pdf"></i>
                                                </span>
                                                <p class="text-base font-semibold mt-2 text-center">Check CV</p>
                                            </li>
                                            <li
                                                class="flex flex-col items-center sm:w-1/2 lg:w-1/4 relative {{ $recruitment->stage2 ? 'text-green-600' : ($recruitment->failed_stage === 'Test Project' ? 'text-red-600' : 'text-gray-400 animate-pulse') }}">
                                                <span
                                                    class="relative flex items-center justify-center w-10 h-10 {{ $recruitment->stage2 ? 'bg-blue-100' : ($recruitment->failed_stage === 'Test Project' ? 'bg-red-100' : 'bg-gray-100') }} rounded-full lg:h-12 lg:w-12 shrink-0">
                                                    <span
                                                        class="absolute left-0 flex items-center justify-center w-2 h-2 text-sm {{ $recruitment->stage2 ? 'opacity-100 text-green-600' : ($recruitment->failed_stage === 'Test Project' ? 'opacity-100 text-red-600' : 'opacity-0') }} transition-opacity duration-300">
                                                        <i
                                                            class="fa-solid {{ $recruitment->failed_stage === 'Test Project' ? 'fa-circle-xmark' : 'fa-circle-check' }}"></i>
                                                    </span>
                                                    <i class="fa-solid fa-laptop-code"></i>
                                                </span>
                                                <p class="text-base font-semibold mt-2 text-center">Test Project</p>
                                            </li>
                                            <li
                                                class="flex flex-col items-center sm:w-1/2 lg:w-1/4 relative {{ $recruitment->stage3 ? 'text-green-600' : ($recruitment->failed_stage === 'Interview' ? 'text-red-600' : 'text-gray-400 animate-pulse') }}">
                                                <span
                                                    class="relative flex items-center justify-center w-10 h-10 {{ $recruitment->stage3 ? 'bg-blue-100' : ($recruitment->failed_stage === 'Interview' ? 'bg-red-100' : 'bg-gray-100') }} rounded-full lg:h-12 lg:w-12 shrink-0">
                                                    <span
                                                        class="absolute left-0 flex items-center justify-center w-2 h-2 text-sm {{ $recruitment->stage3 ? 'opacity-100 text-green-600' : ($recruitment->failed_stage === 'Interview' ? 'opacity-100 text-red-600' : 'opacity-0') }} transition-opacity duration-300">
                                                        <i
                                                            class="fa-solid {{ $recruitment->failed_stage === 'Interview' ? 'fa-circle-xmark' : 'fa-circle-check' }}"></i>
                                                    </span>
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </span>
                                                <p class="text-base font-semibold mt-2 text-center">Interview</p>
                                            </li>
                                            <li
                                                class="flex flex-col items-center sm:w-1/2 lg:w-1/4 relative {{ $recruitment->stage4 ? 'text-green-600' : ($recruitment->failed_stage === 'Offering' ? 'text-red-600' : 'text-gray-400 animate-pulse') }}">
                                                <span
                                                    class="relative flex items-center justify-center w-10 h-10 {{ $recruitment->stage4 ? 'bg-blue-100' : ($recruitment->failed_stage === 'Offering' ? 'bg-red-100' : 'bg-gray-100') }} rounded-full lg:h-12 lg:w-12 shrink-0">
                                                    <span
                                                        class="absolute left-0 flex items-center justify-center w-2 h-2 text-sm {{ $recruitment->stage4 ? 'opacity-100 text-green-600' : ($recruitment->failed_stage === 'Offering' ? 'opacity-100 text-red-600' : 'opacity-0') }} transition-opacity duration-300">
                                                        <i
                                                            class="fa-solid {{ $recruitment->failed_stage === 'Offering' ? 'fa-circle-xmark' : 'fa-circle-check' }}"></i>
                                                    </span>
                                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                                </span>
                                                <p class="text-base font-semibold mt-2 text-center">Offering</p>
                                            </li>
                                        </ol>
                                        <div class="flex justify-center h-auto">
                                            @if ($recruitment->failed_stage)
                                                <p class="text-red-700 text-base font-semibold text-center">
                                                    <i class="fa-solid fa-times-circle"></i> Mohon maaf Anda tidak lolos
                                                    dalam tahap {{ $recruitment->failed_stage }}
                                                </p>
                                            @else
                                                <p class="text-green-700 text-base font-semibold text-center">
                                                    {{ $recruitment->last_stage }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </ul>
                    @else
                        <div class="flex justify-center h-auto">
                            <p class="text-gray-500 text-lg">Tidak ada hasil dari email tersebut</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@include('partials.end')
