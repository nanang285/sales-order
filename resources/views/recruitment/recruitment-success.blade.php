@include('partials.start')
@include('admin.partials.toast')
<div id="about" class="h-full min-h-screen bg-fixed bg-black bg-cover bg-no-repeat p-4 md:py-16"
style="background-image: url('{{ asset('images/bg-about.webp') }}');">
<section class="mx-auto max-w-[800px] lg:px-6">
        <div class="container mx-auto px-0 md:px-10">
            <div class="py-5 px-6 lg:p-8 md:max-w-none lg:flex flex-col rounded ring-1 bg-white ring-gray-200 shadow-lg">
                <div class="flex mb-5 flex-wrap justify-center sm:justify-start">
                    <div class="left-0 mr-1">
                        <img src="{{ asset('images/zenmultimedia.png') }}" alt="Logo" class="w-full h-12 lg:h-14">
                    </div>
                    <div class="sm:ml-auto mt-1 text-center">
                        <h1 class="text-base lg:text-lg font-bold text-blue-700">FORMULIR LAMARAN KERJA</h1>
                        <p class="text-xs lg:font-semibold text-blue-700">PT ZEN MULTIMEDIA INDONESIA</p>
                    </div>
                </div>
                <hr>
                <div class=" w-full">
                    <h2 class="text-gray-700 font-semibold text-base text-center mt-5">
                        Data Berhasil Terkirim, Mohon untuk menunggu hasil selanjutnya.
                    </h2>
                    <p class="mt-5 mx-1 text-sm text-center font-semibold text-gray-600">
                        <a href="{{ route('checkrecruitment') }}"
                            class="text-blue-600">
                            Cek Status Lamaran disini.
                        </a>
                    </p>
                    <p class="mt-5 mx-1 text-base text-center font-semibold text-gray-600">
                        <a href="{{ route('recruitment') }}"
                            class="text-red-600">
                            Kembali ke halaman sebelumnya
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@include('partials.end')

<script>
    $(document).ready(function() {
        $('#nik').on('input', function () {
            if ($(this).val().length > 16) {
                $(this).val($(this).val().slice(0, 16));
            }
        });
    });
</script>
